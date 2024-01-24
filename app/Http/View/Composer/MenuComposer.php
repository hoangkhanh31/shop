<?php

namespace App\Http\View\Composer;

use App\Repositories\UserRepository;
use Illuminate\View\View;
use App\Models\Menu;

class MenuComposer
{
    protected $users;

    public function __construct()
    {

    }

    public function compose(View $view)
    {
        $menus = Menu::select('id', 'name', 'parent_id')->where('active', 1)->orderByDesc('id')->get();
        $view->with('menus', $menus);   //Truyền giá trị của biến $menus qua view thông qua biến "menus" 
    }
}
