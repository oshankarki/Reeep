<?php

namespace App\View\Composers;

use App\Models\Backend\Menu;
use Illuminate\View\View;

class MenuComposer
{
    public function compose(View $view)
    {
        $menuItems = Menu::with('children')->whereNull("parent_id")->get();
        $view->with('menuItems', $menuItems);
    }

}
