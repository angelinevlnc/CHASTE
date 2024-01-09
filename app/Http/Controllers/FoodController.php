<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Tenant;
use App\Models\Testimony;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

    //payment dari button purchase now
    public function foodPayment($id){

        $pnow = Session::get('pnow') ?? [];
        $menu = Menu::find($id);
        $total = $menu->harga;

        $collection = [];
        $collection[] = $menu;

        Session::put('pnow', $menu);

        // dd($pnow);
        // dd(Session::get('pnow')->harga);


        return view('food-payment', [
            'data' => $collection,
            'total' => $total,
            'tax' => $total * 0.1,
            'grandtotal' => $total + ($total * 0.1)
        ]);
    }

}
