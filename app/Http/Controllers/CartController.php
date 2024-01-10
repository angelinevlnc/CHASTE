<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    function addFood($id){
        $cart = Session::get('cart') ?? [];
        $menu = Menu::find($id);

        // check cart sudah ada menu lama belum
        $menuSudahAda = false;
        foreach ($cart as $key => $value) {
            if ($value->menu_id == $menu->menu_id) {
                $value->qty += 1;
                $value->subtotal = $value->harga * $value->qty;
                $menuSudahAda = true;
            }
        }

        if (!$menuSudahAda) {
            $menu->qty += 1;
            $menu->subtotal = $menu->harga * $menu->qty;
            $cart[] = $menu;
        }

        Session::put('cart', $cart);
        return redirect('/cart');
    }

    public function cartView(){
        $cart = Session::get('cart') ?? [];
        $total = 0;
        foreach ($cart as $key => $value) {
            $total += $value->subtotal;
        }

        return view('cart', [
            'cart' => $cart,
            'total' => $total,
            'tax' => $total * 0.1,
            'grandtotal' => $total + ($total * 0.1)
        ]);
    }

    public function minusFood($id){
        $cart = Session::get('cart') ?? [];
        $menu = Menu::find($id);
        $cek = -1;

        foreach ($cart as $key => $value) {
            if ($value->menu_id == $menu->menu_id) {
                $value->qty -= 1;
                $value->subtotal = $value->harga * $value->qty;
                
                if($value->qty == 0){
                    $cek = $key;
                }
            }
        }

        //HAPUS jika qty = 0
        if($cek>-1){
            unset($cart[$cek]);
        }
        
        Session::put('cart', $cart);
        return redirect('/cart');
    }

    public function deleteFood($id){
        $cart = Session::get('cart') ?? [];
        $menu = Menu::find($id);
        $cek = null;

        // check cart sudah ada menu lama belum
        foreach ($cart as $key => $value) {
            if ($value->menu_id == $menu->menu_id) {
                $cek = $key;
            }
        }
        unset($cart[$cek]);

        Session::put('cart', $cart);
        return redirect('/cart');
    }

    //ini untuk ke payment dari cart
    public function paymentCart(){
        Session::forget('pnow');

        $cart = Session::get('cart') ?? [];
        $total = 0;
        foreach ($cart as $key => $value) {
            $total += $value->subtotal;
        }

        return view('food-payment', [
            'data' => Session::get('cart'),
            'total' => $total,
            'tax' => $total * 0.1,
            'grandtotal' => $total + ($total * 0.1)
        ]);

    }
}
