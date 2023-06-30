<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Album;
use Illuminate\Http\Request;

class AlbumController extends BackendBaseController
{
    protected $base_route = 'backend.album.';
    protected $base_view = 'backend.album.';
    protected $module = 'Album';
    public function __construct()
    {
        $this->model= new Album();
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
        return view($this->__loadDataToView($this->base_view .'create'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'title'=>'required|unique:albums,title'
            ]);
            $record=$this->model::create($request->all());

            if($record)
            {
                request()->session()->flash('success',($this->__loadDataToView($this->module))." Created");
            }else{
                request()->session()->flash('error',($this->__loadDataToView($this->module))." Creation Failed ");

            }
        }
        catch(\Exception $exception){
            request()->session()->flash('error',"Error:".$exception->getMessage());

        }

        return redirect()->route($this->__loadDataToView($this->base_route.'index'));
    }


    /**
     * Display the specified resource.
     */

    public function edit($id)
    {
        $album['record'] = $this->model::find($id);
        return view($this->__loadDataToView($this->base_view .'edit'),compact('album'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $request->validate([
                'title'=>'required',

            ]);
            $data['record']=$this->model::find($id);
            if(!$data['record' ]){
                request()->session()->flash('error',"Error:Invalid Request");
                return redirect()->route($this->__loadDataToView($this->base_route.'index'));

            }
            $record=$data['record']->update($request->all());
            if($record)
            {
                request()->session()->flash('success',($this->__loadDataToView($this->module))."Updated");
            }else{
                request()->session()->flash('error',($this->__loadDataToView($this->module))."Updation Failed ");

            }
        }
        catch(\Exception $exception){
            request()->session()->flash('error',"Error:".$exception->getMessage());

        }

        return redirect()->route($this->__loadDataToView($this->base_route.'index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $album= $this->model::findOrFail($id);
        $album->delete();
        return redirect()->back()->with('success', 'Album deleted successfully');
    }




}
