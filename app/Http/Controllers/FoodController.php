<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Tenant;
use App\Models\Testimony;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    //
    public function getLanding(){
        $listTenant = Tenant::where('status', 1)->get();
        $listTestimony = Testimony::where('status', 1)->orderby('created_at', 'desc')->get();
        
        return view('landing', ['listTenant' => $listTenant, 'listTestimony' => $listTestimony]);
    }

    public function getFood(){
        $listTenant = Tenant::where('status', 1)->get();
        $listMenu = Menu::where('status', 1)->get();
        
        return view('food', ['listTenant' => $listTenant, 'listMenu' => $listMenu]);
    }
}
