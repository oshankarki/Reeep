<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Partner;
use Illuminate\Http\Request;

class PartnerController extends BackendBaseController
{
    protected $base_route = 'backend.partner.';
    protected $base_view = 'backend.partner.';
    protected $module = 'Partner';
    public function __construct()
    {
        $this->model= new Partner();
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
                'link' => 'required|url',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'title' => 'required',
                'slug' => 'required'
            ]);

            $partnerData = $request->only(['description', 'title', 'slug','link']);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/images', $imageName);
                $partnerData['image'] = $imageName;
            }

            $record = $this->model::create($partnerData);

            if ($record) {
                request()->session()->flash('success', 'Partner created successfully');
            } else {
                request()->session()->flash('error', 'Partner and Resources creation failed');
            }
        } catch (\Exception $exception) {
            request()->session()->flash('error', 'Error: ' . $exception->getMessage());
        }

        return redirect()->route('backend.partner.index');
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
                'link' => 'required|url',
                'title' => 'required',
                'slug' => 'required'
            ]);

            $record = $this->model::find($id);
            if (!$record) {
                request()->session()->flash('error', "Error: Invalid Request");
                return redirect()->route('backend.partner.index');
            }

            if($request->hasFile('image')) {
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
            $record->title = $request->input('title');
            $record->slug = $request->input('slug');
            $record->link = $request->input('link');
            $record->save();
            request()->session()->flash('success', 'Partner updated successfully');
        } catch (\Exception $exception) {
            request()->session()->flash('error', 'Error: ' . $exception->getMessage());
        }

        return redirect()->route('backend.partner.index');
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
