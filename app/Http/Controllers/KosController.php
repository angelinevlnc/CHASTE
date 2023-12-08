<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Menu;
use App\Models\Tenant;
use App\Models\Testimony;
use Illuminate\Http\Request;

class KosController extends Controller
{
    //
    public function getKamarAC(){
        $listKamar = Kamar::where('status', 1)->where('penyewa_id', NULL)->where('AC', 'AC')->get();
        $title = "With AC";
        $deskripsi = "The room options include AC, providing a cool and more comfortable temperature.";

        return view('kos', ['listKamar' => $listKamar, 'title'=>$title, 'deskripsi'=>$deskripsi]);
    }

    public function getKamarNonAC(){
        $listKamar = Kamar::where('status', 1)->where('penyewa_id', NULL)->where('AC', 'Non-AC')->get();
        $title = "Without AC";
        $deskripsi = "The room options do not include AC, providing a cheaper price for your wallet.";

        return view('kos', ['listKamar' => $listKamar, 'title'=>$title, 'deskripsi'=>$deskripsi]);
    }

    public function getKamarDetail(Request $request){
        $kamar = Kamar::where('kamar_id', $request->id)->first();

        return view('kos-detail', ['kamar' => $kamar]);
    }
}
