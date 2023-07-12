<?php

namespace App\Http\Controllers\backend;

use App\Exports\ExportContacts;
use App\Http\Controllers\Controller;
use App\Http\Requests\backend\ContactRequest;
use App\Imports\ContactImport;
use App\Models\Backend\Contact;
use App\Models\Backend\Framework;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

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
    public function exportContacts()
    {
        $fileName = 'contact.csv';
        return Excel::download(new ExportContacts, $fileName);
    }
    public function upload(Request $request)
    {
        request()->validate([
            'contacts' => 'required|mimes:xlsx,xls|max:2048'
        ]);
        Excel::import(new ContactImport(), $request->file('contacts'));
        return back()->with('message', 'Contacts Imported Successfully');
    }


}

