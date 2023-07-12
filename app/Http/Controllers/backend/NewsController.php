<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\backend\NewsRequest;
use App\Models\Backend\News;
use Illuminate\Http\Request;

class NewsController extends BackendBaseController
{
    protected $base_route = 'backend.news.';
    protected $base_view = 'backend.news.';
    protected $module = 'News';
    public function __construct()
    {
        $this->middleware('permission:news-list|news-create|news-edit|news-delete', ['only' => ['index','store']]);
        $this->middleware('permission:news-create', ['only' => ['create','store']]);
        $this->middleware('permission:news-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:news-delete', ['only' => ['destroy']]);
        $this->model= new News();
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
    public function store(NewsRequest $request)
    {
        try {
            $request->validate([
                'category'=>'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'description' => 'required',
                'title' => 'required',
                'slug' => 'required'

            ]);

            $newsData = $request->only(['description','title','slug','image','category']);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/images', $imageName);
                $newsData['image'] = $imageName;
            }

            $record = $this->model::create($newsData);


            if ($record) {
                request()->session()->flash('success', 'News and Events created successfully');
            } else {
                request()->session()->flash('error', 'News And Events creation failed');
            }
        } catch (\Exception $exception) {
            request()->session()->flash('error', 'Error: ' . $exception->getMessage());
        }

        return redirect()->route('backend.news.index');
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
    public function update(NewsRequest $request, string $id)
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
                return redirect()->route('area.index');
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
            $record->title = $request->input('title');
            $record->description = $request->input('description');
            $record->slug = $request->input('slug');
            $record->save();

            request()->session()->flash('success', 'News updated successfully');
        } catch (\Exception $exception) {
            request()->session()->flash('error', 'Error: ' . $exception->getMessage());
        }

        return redirect()->route('backend.news.index');
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
