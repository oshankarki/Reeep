<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\About;
use App\Models\Backend\Framework;
use Illuminate\Http\Request;

class FrameworkController extends BackendBaseController
{
    protected $base_route = 'backend.framework.';
    protected $base_view = 'backend.framework.';
    protected $module = 'Framework';
    public function __construct()
    {
        $this->model= new Framework();
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
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'description' => 'required',
                'title' => 'required'
            ]);

            $frameworkData = $request->only(['description','title','image']);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/images', $imageName);
                $frameworkData['image'] = $imageName;
            }

            $record = $this->model::create($frameworkData);


            if ($record) {
                request()->session()->flash('success', 'Framework created successfully');
            } else {
                request()->session()->flash('error', 'Framework creation failed');
            }
        } catch (\Exception $exception) {
            request()->session()->flash('error', 'Error: ' . $exception->getMessage());
        }

        return redirect()->route('backend.framework.index');
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
        $framework['record'] = $this->model::find($id);
        return view($this->__loadDataToView($this->base_view .'edit'),compact('framework'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'description' => 'required'
            ]);

            $record = $this->model::find($id);
            if (!$record) {
                request()->session()->flash('error', "Error: Invalid Request");
                return redirect()->route('framework.index');
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

            $record->description = $request->input('description');
            $record->save();

            request()->session()->flash('success', 'About Us updated successfully');
        } catch (\Exception $exception) {
            request()->session()->flash('error', 'Error: ' . $exception->getMessage());
        }

        return redirect()->route('backend.framework.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $framework= $this->model::findOrFail($id);
        $framework->delete();
        return redirect()->back()->with('success', 'Framework deleted successfully');
    }
}
