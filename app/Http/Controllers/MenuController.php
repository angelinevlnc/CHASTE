<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function showMenus()
    {
        $menus = Menu::all();
        return view('hlmnTenant', compact('menus'));
    }
    public function insertmenu()
{
    $attributes = request()->validate([
        'nama' => 'required|max:255|min:2',
        'harga' => 'required',
        'kategori' => 'required|max:255',
        'deskripsi' => 'required',
        'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
    ]);

    $user = auth()->user();

    if ($user) {
        $attributes['user_id'] = 8;

        $attributes['tenant_id'] = 2;

        $attributes['status'] = 1;

        $fotoPath = $attributes['foto']->store('menu', 'public');
        $attributes['foto'] = $fotoPath;

        $menu = Menu::create($attributes);

        return redirect()->route('showtenant')->with('success', 'Menu added successfully');
    } else {
        return redirect()->route('login')->with('error', 'Authentication error');
    }
}

}
