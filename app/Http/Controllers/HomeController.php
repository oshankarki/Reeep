<?php

namespace App\Http\Controllers;

use App\Models\Backend\Album;
use App\Models\Backend\Area;
use App\Models\Backend\Banner;
use App\Models\Backend\Contact;
use App\Models\Backend\Framework;
use App\Models\Backend\News;
use App\Models\Backend\Partner;
use App\Models\Backend\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['banners']= Banner::count();
        $data['partners']= Partner::count();
        $data['news']= News::count();
        $data['albums']= Album::count();
        $data['contacts']= Contact::count();
        $data['resources']= Resource::count();
        $data['areas']= Area::count();
        $data['frameworks']= Framework::count();

        return view('home', compact('data'));
    }
    public  function profile()
    {
        return view(('admin.profile'));
    }
    public  function edit()
    {
        return view(('admin.edit'));
    }
    public function update(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully');
    }
    public function changePassword()
    {
        return view('admin.password');
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_new_password' => 'required|same:new_password',
        ]);

        $user = Auth::user();

        if (!password_verify($request->input('current_password'), $user->password)) {
            return redirect()->back()->withErrors( 'Invalid old password');
        }
        $user->password = bcrypt($request->input('new_password'));
        $user->save();
        return redirect()->route('admin.profile')->with('success', 'Password updated successfully');
    }
}
