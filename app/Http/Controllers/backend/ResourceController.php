<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Resource;
use Illuminate\Http\Request;

class ResourceController extends BackendBaseController
{
    protected $base_route = 'backend.resource.';
    protected $base_view = 'backend.resource.';
    protected $module = 'Resource';
    public function __construct()
    {
        $this->model= new Resource();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['records'] = $this->model::get();
        return view($this->__loadDataToView($this->base_view.'index'), compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view($this->__loadDataToView($this->base_view .'create'),);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'pdf' => 'required|mimes:pdf',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'description' => 'required',
                'title' => 'required',
                'slug' => 'required'
            ]);

            $newsData = $request->only(['description', 'title', 'slug']);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/images', $imageName);
                $newsData['image'] = $imageName;
            }

            if ($request->hasFile('pdf')) {
                $pdf = $request->file('pdf');
                $pdfName = time() . '.' . $pdf->getClientOriginalExtension();
                $pdf->storeAs('public/pdfs', $pdfName);
                $newsData['pdf'] = $pdfName;
            }

            $record = $this->model::create($newsData);

            if ($record) {
                request()->session()->flash('success', 'Knowledge and Resources created successfully');
            } else {
                request()->session()->flash('error', 'Knowledge and Resources creation failed');
            }
        } catch (\Exception $exception) {
            request()->session()->flash('error', 'Error: ' . $exception->getMessage());
        }

        return redirect()->route('backend.resource.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $record = $this->model::find($id);
        if(!$record){
            request()->session()->flash('error',"Error:Invalid Request");
            return redirect()->route($this->__loadDataToView($this->base_route.'index'));
        }
        return view($this->__loadDataToView($this->base_view.'show'),compact('record'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $area['record'] = $this->model::find($id);
        return view($this->__loadDataToView($this->base_view .'edit'),compact('area'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'description' => 'required',
                'title' => 'required',
                'slug' => 'required'
            ]);

            $record = $this->model::find($id);
            if (!$record) {
                request()->session()->flash('error', "Error: Invalid Request");
                return redirect()->route('backend.resource.index');
            }

            if ($request->hasFile('image')) {
                // Delete previous image
                $previousImagePath = public_path('images/' . $record->image);
                if (file_exists($previousImagePath)) {
                    unlink($previousImagePath);
                }

                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/images', $imageName);
                $record->image = $imageName;
            }
            // Check if a new PDF file is uploaded
            if ($request->hasFile('pdf')) {
                $previousPdfPath = public_path('pdfs/' . $record->image);
                if (file_exists($previousPdfPath)) {
                    unlink($previousPdfPath);
                }
                $pdf = $request->file('pdf');
                $pdfName = time() . '.' . $pdf->getClientOriginalExtension();
                $pdf->storeAs('public/pdfs', $pdfName);
                $record->pdf = $pdfName;
            }

            $record->description = $request->input('description');
            $record->title = $request->input('title');
            $record->slug = $request->input('slug');



            $record->save();

            request()->session()->flash('success', 'Resource updated successfully');
        } catch (\Exception $exception) {
            request()->session()->flash('error', 'Error: ' . $exception->getMessage());
        }

        return redirect()->route('backend.resource.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $about= $this->model::findOrFail($id);
        $about->delete();
        return redirect()->back()->with('success', 'Working Area deleted successfully');
    }
}
