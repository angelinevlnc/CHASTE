<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function insertmenu(Request $request)
    {
        $attributes = $request->validate([
            'nama' => 'required|max:255|min:2',
            'harga' => 'required',
            'kategori' => 'required|max:255',
            'deskripsi' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        ]);

        $activeUser = Auth::user();

        if ($activeUser) {
            $attributes['user_id'] = $activeUser->user_id;

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

    public function showEditMenu($id)
    {
        $menu = Menu::find($id);

        return view('pages.editMenu', compact('menu'));
    }

    public function updateMenu(Request $request, $id)
    {
        $menu = Menu::find($id);

        if ($menu) {
            $attributes = $request->validate([
                'nama' => 'required|max:255|min:2',
                'harga' => 'required',
                'kategori' => 'required|max:255',
                'deskripsi' => 'required',
                'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $menu->nama = $attributes['nama'];
            $menu->harga = $attributes['harga'];
            $menu->kategori = $attributes['kategori'];
            $menu->deskripsi = $attributes['deskripsi'];

            if ($request->hasFile('foto')) {
                Storage::delete($menu->foto);
                $fotoPath = $request->file('foto')->store('menu', 'public');
                $menu->foto = $fotoPath;
            }

            $menu->save();

            return redirect()->route('showtenant')->with('success', 'Menu updated successfully');
        } else {
            return redirect()->route('showtenant')->with('error', 'Menu not found');
        }
    }

    public function deleteMenu($id)
    {
        $menu = Menu::find($id);

        if ($menu) {
            $menu->delete();

            return redirect()->route('showtenant')->with('success', 'Menu deleted successfully');
        } else {
            return redirect()->route('showtenant')->with('error', 'Menu not found');
        }
    }
}
