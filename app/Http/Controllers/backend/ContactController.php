<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\backend\ContactRequest;
use App\Models\Backend\Contact;
use App\Models\Backend\Framework;
use Illuminate\Http\Request;

class ContactController extends BackendBaseController
{
    protected $base_route = 'backend.contact.';
    protected $base_view = 'backend.contact.';
    protected $module = 'Contact';
    public function __construct()
    {
        $this->model= new Contact();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['records'] = $this->model::get();
        return view($this->__loadDataToView($this->base_view.'index'), compact('data'));
    }
    public function store(ContactRequest $request)
    {
        try {
            $record = $this->model::create($request->all());

            if ($record) {
                return redirect()->back()->with('success', "Thank you for contacting us!!");
            } else {
                return redirect()->back()->withErrors("Try Again");
            }
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors("Try Again");
        }
    }
}

