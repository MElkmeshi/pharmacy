<?php
namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    public function renderNavbar()
    {
        $menuItems = Menu::with('children')->whereNull('parent_id')->get();
        return view('layout.master', compact('menuItems'));
    }
 

}
