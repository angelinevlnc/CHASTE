<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tenant;
use App\Models\Kamar;
use App\Models\H_Kamar;
use App\Models\D_Kamar;
use App\Models\Menu;
use App\Models\H_Menu;
use App\Models\D_Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Midtrans\Config;
use Midtrans\Snap;

class MidtransController extends Controller
{
    public function payment(Request $request)
    {
        if(Session::get('login_id')){
            Config::$serverKey = config('services.midtrans.server_key');
            Config::$clientKey = config('services.midtrans.client_key');
            Config::$isProduction = config('services.midtrans.is_production');
            Config::$isSanitized = config('services.midtrans.is_sanitized');
            Config::$is3ds = config('services.midtrans.is_3ds');
    
            $kamar = Kamar::where('kamar_id', $request->id)->first();
            Session::put('kamar_id', $request->id);
            Session::put('kamar_harga', $kamar->harga);
            
            $transactionDetails = [
                'order_id' => 'ORDER-' . time(),
                'gross_amount' => $kamar->harga
            ];
            
            $snapToken = Snap::getSnapToken(['transaction_details' => $transactionDetails]);
    
            return view('payment', ['snapToken' => $snapToken, 'kamar'=>$kamar]);
        }
        else{
            return redirect('/login');
        }
    }

    public function payment_success(Request $request)
    {
        //INSERT
        DB::table('h_kamar')->insert([
            'user_id' => 1,
            'penyewa_id' => Session::get('login_id'),
            'total' => Session::get('kamar_harga'),
            'created_at' => now(),
            'updated_at' => now(),
            'status' => 1
        ]);

        $h_kamar = H_Kamar::latest()->first();
        DB::table('d_kamar')->insert([
            'h_kamar_id' => $h_kamar->h_kamar_id,
            'kamar_id' => Session::get('kamar_id'),
            'harga' => Session::get('kamar_harga'),
            'status' => 1
        ]);

        Session::forget('kamar_id');
        Session::forget('kamar_harga');

        //GET
        $HKamar = H_Kamar::latest()->first();
        $DKamar = D_Kamar::where('h_kamar_id', $HKamar->h_kamar_id)->first();
        $Kamar = Kamar::where('kamar_id', $DKamar->kamar_id)->first();

        //UPDATE (apabila sewa pertama kali)
        if($Kamar->status==1){
            DB::table('kamar')->where('kamar_id', '=', $Kamar->kamar_id)->update([
                'penyewa_id' => Session::get('login_id'),
                'status' => 2 //DISEWA
            ]);
        }

        return view("userHistoryDetail", ['HKamar' => $HKamar, 'DKamar' => $DKamar, 'Kamar'=>$Kamar]);
    }

    public function payment_fail(Request $request)
    {
        //INSERT
        DB::table('h_kamar')->insert([
            'user_id' => 1,
            'penyewa_id' => Session::get('login_id'),
            'total' => Session::get('kamar_harga'),
            'created_at' => now(),
            'updated_at' => now(),
            'status' => 0
        ]);

        $h_kamar = H_Kamar::latest()->first();
        DB::table('d_kamar')->insert([
            'h_kamar_id' => $h_kamar->h_kamar_id,
            'kamar_id' =>  Session::get('kamar_id'),
            'harga' =>  Session::get('kamar_harga'),
            'status' => 0
        ]);

        Session::forget('kamar_id');
        Session::forget('kamar_harga');

        Session::flash('payment_failed', true);
        return redirect()->route('user');
    }
}