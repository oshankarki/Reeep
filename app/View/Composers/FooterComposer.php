<?php

namespace App\View\Composers;

use App\Models\Backend\Menu;
use App\Models\Backend\Partner;
use App\Models\Backend\Setting;
use Illuminate\View\View;

class FooterComposer
{
    public function compose(View $view)
    {
        $data['footerItems'] =Menu::where('type','2')->orderBy('order')->get();
        $data['setting'] = Setting::first();
        $data['partners'] = Partner::get();
        $view->with('data', $data);
    }


}
