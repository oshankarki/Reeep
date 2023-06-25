<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\About;
use App\Models\Backend\Framework;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function about()
    {
        $about = About::first();
        $frameworks = Framework::get();

        return view("frontend.about",compact('about','frameworks'));
    }
    public function framework($id)
    {
        $record= Framework::find($id);
        $framework = $record->get();

        return view("frontend.framework",compact('framework'));
    }

}
