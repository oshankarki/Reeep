<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\About;
use App\Models\Backend\Album;
use App\Models\Backend\Area;
use App\Models\Backend\Framework;
use App\Models\Backend\News;
use App\Models\Backend\Partner;
use App\Models\Backend\Resource;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home ()
    {
        $data['bannerFirst'] = \App\Models\Backend\Banner::first();
        $data['banners'] = \App\Models\Backend\Banner::get()->skip(1);
        $data['about'] = \App\Models\Backend\About::first();
        $data['areas'] = \App\Models\Backend\Area::take(3)->get();
        $data['moreAreas'] = \App\Models\Backend\Area::skip(3)->take(2)->get();
        $data['news'] = \App\Models\Backend\News::take(3)->get();
        $data['album'] = \App\Models\Backend\Album::take(3)->get();
        $data['resources'] = \App\Models\Backend\Resource::take(3)->get();
        $data['partners'] = \App\Models\Backend\Partner::get();
        return view('welcome2', compact('data'));
    }
    public function about()
    {
        $about = About::first();
        $frameworks = Framework::get();

        return view("frontend.about",compact('about','frameworks'));
    }
    public function framework($slug)
    {
        $framework = Framework::where('slug',$slug)->first();
        return view('frontend.framework',compact('framework'));

    }
    public function area_show($slug)
    {
        $area=Area::where('slug',$slug)->first();
        return view('frontend.area_show',compact('area'));
    }
    public function area()
    {
        $area=Area::get();
        return view('frontend.area',compact('area'));
    }
    public function newsShow($slug)
    {
        $newsLatest =News::latest()->take(3)->get();
        $news=News::where('slug',$slug)->first();
        return view('frontend.news_show',compact('news','newsLatest'));
    }
    public function news(Request $request)
    {
        $news =News::where('category','LIKE',"%".$request->category."%")->get();
        return view('frontend.news',compact('news'));
    }
    public function gallery()
    {
        $album = Album::get();
        return view('frontend.gallery',compact('album'));
    }
    public function resource()
    {
        $resource = Resource::get();
        return view('frontend.resource',compact('resource'));
    }
    public function resourceShow($slug)
    {
        $resource=Resource::where('slug',$slug)->first();
        return view('frontend.resource_show',compact('resource'));
    }
    public function partner()
    {
        $partners = Partner::get();
        return view('frontend.partner',compact('partners'));
    }

}
