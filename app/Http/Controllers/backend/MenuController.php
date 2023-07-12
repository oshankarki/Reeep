<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\backend\MenuRequest;
use App\Models\Backend\Menu;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class MenuController extends BackendBaseController
{
    protected $base_route = 'backend.menu.';
    protected $base_view = 'backend.menu.';
    protected $module = 'Menu';
    public function __construct()
    {
        $this->model= new Menu();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['records'] = $this->model::whereNull('parent_id')->orderBy('order')->get();
        return view($this->__loadDataToView($this->base_view.'index'), compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menuItems = Menu::with('children')->whereNull("parent_id")->get();
        return view($this->__loadDataToView($this->base_view .'create'),compact('menuItems'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuRequest $request)
    {
        try {
            $record = $this->model::create($request->all());

            if ($record) {
                request()->session()->flash('success', ($this->__loadDataToView($this->module))."Created");
            } else {
                request()->session()->flash('error', ($this->__loadDataToView($this->module))."Creation Failed ");
            }
        } catch (\Exception $exception) {
            request()->session()->flash('error', "Error: ".$exception->getMessage());
        }

        return redirect()->route($this->__loadDataToView($this->base_route.'index'));
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $records = $this->model::with('children')->find($id);
        if(!$records){
            request()->session()->flash('error',"Error:Invalid Request");
            return redirect()->route($this->__loadDataToView($this->base_route.'index'));
        }
        return view($this->__loadDataToView($this->base_view.'show'),compact('records'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $menu['record'] = $this->model::find($id);
        $menuItems = $this->model::with('children')->whereNull("parent_id")->get();
        return view($this->__loadDataToView($this->base_view .'edit'),compact('menu','menuItems'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MenuRequest $request, string $id)
    {
        try{
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
        $menu = $this->model::findOrFail($id);
        $this->deleteChildMenus($menu);
        $menu->delete();
        return redirect()->back()->with('success', 'Menu deleted successfully');
    }

    public function deleteChildMenus($menu)
    {
        foreach ($menu->children as $childMenu) {
            $this->deleteChildMenus($childMenu); // Recursively delete child menu items
            $childMenu->delete(); // Delete current child menu item
        }
    }
    public function status($id)
    {
        $menu= $this->model::find($id);
        $menu->status = !$menu->status;
        $menu->save();
        if($menu->status==1)
        {

            return redirect()->back()->with('success', "Status Condition: On");

        }
        else{
            return redirect()->back()->with('success', "Status Condition: Off");

        }
    }
    public function menu_order(Request $request)
    {
        $menu = $this->model::whereNull('parent_id')->where('type',1)->orderBy('order')->get();


        return view('backend.menu.reorder_menu', compact('menu'));

    }
    public function menu_order_change(Request $request)
    {
        $data = $request->input('order');
        foreach ($data as $index => $id) {
            Menu::where('id', $id)->update(['order' => $index]);
        }
        return  response()->json([

            'message' => 'Post Order changed successfully.',

            'alert-type' => 'success'

        ]);
        //return response()->json(['success' => $data]);
    }

}
