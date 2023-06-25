<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Banner;
use Illuminate\Http\Request;

class BannerController extends BackendBaseController
{
    protected $base_route = 'backend.banner.';
    protected $base_view = 'backend.banner.';
    protected $module = 'Banner';
    public function __construct()
    {
        $this->model= new Banner();
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
                'description' => 'required'
            ]);

            $bannerData = $request->only(['description']);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/images', $imageName);
                $bannerData['image'] = $imageName;
            }

            $record = Banner::create($bannerData);


            if ($record) {
                request()->session()->flash('success', 'Banner created successfully');
            } else {
                request()->session()->flash('error', 'Banner creation failed');
            }
        } catch (\Exception $exception) {
            request()->session()->flash('error', 'Error: ' . $exception->getMessage());
        }

        return redirect()->route('backend.banner.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $banner['record'] = $this->model::find($id);
        return view($this->__loadDataToView($this->base_view .'edit'),compact('banner'));
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
                return redirect()->route('banners.index');
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

            request()->session()->flash('success', 'Banner updated successfully');
        } catch (\Exception $exception) {
            request()->session()->flash('error', 'Error: ' . $exception->getMessage());
        }

        return redirect()->route('backend.banner.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner = $this->model::findOrFail($id);
        $banner->delete();
        return redirect()->back()->with('success', 'Banner deleted successfully');
    }
}
