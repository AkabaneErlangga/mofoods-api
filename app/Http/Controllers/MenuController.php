<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function getMenu(Request $request)
    {
        if ($request->id) {
            return Menu::find($request->id);
        }

        return Menu::all();
    }

    public function getCategoryMenu(Request $request)
    {
        return Menu::where('kategori_menu', $request->category)->get();
    }

    public function getMenuCategory(Request $request)
    {
        return Menu::select('kategori_menu')->groupBy('kategori_menu')->get();
    }
}
