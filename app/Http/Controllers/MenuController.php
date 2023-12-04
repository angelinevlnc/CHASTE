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
        'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // adjust file types and size as needed
    ]);

    // Retrieve the currently authenticated user
    $user = auth()->user();

    if ($user) {
        // Add the user_id to the attributes
        $attributes['user_id'] = $user->id;

        // Add the tenant_id (you might get it from the user relationship or another source)
        // Adjust this part based on your application's structure
        $attributes['tenant_id'] = $user->tenant_id;

        // Set the default status or adjust it based on your requirements
        $attributes['status'] = 1;

        // Handle file upload
        $fotoPath = $attributes['foto']->store('foodpics', 'public');
        $attributes['foto'] = $fotoPath;

        // Create the menu
        $menu = Menu::create($attributes);

        // Redirect or return a response
        return redirect()->route('showtenant')->with('success', 'Menu added successfully');
    } else {
        // Handle the case when no user is authenticated
        // You might want to redirect to a login page or handle this case as needed
        return redirect()->route('login')->with('error', 'Authentication error');
    }
}

}
