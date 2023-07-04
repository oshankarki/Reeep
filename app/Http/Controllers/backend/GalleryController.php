<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\backend\GalleryRequest;
use App\Models\Backend\Album;
use App\Models\Backend\Area;
use App\Models\Backend\Gallery;
use Illuminate\Http\Request;

class GalleryController extends BackendBaseController
{
    protected $base_route = 'backend.gallery.';
    protected $base_view = 'backend.gallery.';
    protected $module = 'Gallery';
    public function __construct()
    {
        $this->model= new Gallery();
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
        $data['album']= Album::pluck('title', 'id');
        return view($this->__loadDataToView($this->base_view .'create') ,compact('data'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(GalleryRequest $request)
    {

        try {
            $albumId = $request->input('album_id');
            $images = $request->file('image');
            $titles = $request->input('title');

            foreach ($images as $key => $image) {
                $title = $titles[$key];

                $galleyData = [
                    'album_id' => $albumId,
                    'title' => $title,
                ];

                if ($image) {
                    $imageName = time() . '_' . $key . '.' . $image->getClientOriginalExtension();
                    $image->storeAs('public/images', $imageName);
                    $galleyData['image'] = $imageName;
                }

                $record = $this->model::create($galleyData);

                if (!$record) {
                    throw new \Exception('Failed to create Galleries');
                }
            }

            request()->session()->flash('success', 'Gallery Images created successfully');
        } catch (\Exception $exception) {
            request()->session()->flash('error', 'Error: ' . $exception->getMessage());
        }

        return redirect()->route('backend.gallery.index');
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
        $data['album']= Album::pluck('title', 'id');
        $data['record'] = $this->model::find($id);
        return view($this->__loadDataToView($this->base_view .'edit'),compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GalleryRequest $request, string $id)
    {
        try {
            $record = $this->model::find($id);
            if (!$record) {
                request()->session()->flash('error', "Error: Invalid Request");
                return redirect()->route('backend.gallery.index');
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

            $record->save();

            request()->session()->flash('success', 'Gallery Image updated successfully');
        } catch (\Exception $exception) {
            request()->session()->flash('error', 'Error: ' . $exception->getMessage());
        }

        return redirect()->route('backend.gallery.index');
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
