<?php

namespace App\Http\Controllers;

use App\Models\H_Bulan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function addExpense(Request $request){
        DB::table('h_bulan')->insert([
            'user_id' => 1,
            'total' => $request->total,
            'status' => 0
            //expense status 0
        ]);

        $h_bulan = H_Bulan::latest()->first();
        DB::table('d_bulan')->insert([
            'h_bulan_id' => $h_bulan->h_bulan_id,
            'harga' => $request->total,
            'status' => 0,
            'keterangan' => $request->desc
        ]);

        return redirect('/pengeluaranOwner');
    }
}
