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
            'status' => 0,
            'keterangan' => $request->desc
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

    public function changeExpense(Request $request){
        return redirect('/editExpense?h_bulan_id=' . ($request->id));
    }

    public function editExpense(Request $request){
        $request->validate(
            [
                'total' => 'required',
                'desc'=> 'required',
            ],
            [
                "required" => "Fill the blank",
            ]
        );
        $id = $request->id;
        DB::table('h_bulan')->where('h_bulan_id', '=', $id)->update([
            'total' => $request->total,
            'keterangan' => $request->desc,
        ]);
        return redirect('/pengeluaranOwner');
    }

    public function deleteExpense(Request $request){
        $Expense = H_Bulan::where('h_bulan_id', $request->id)->first();
        DB::table('h_bulan')->where('h_bulan_id', '=', $Expense->h_bulan_id)->update([
            'status' => 4 //DIHAPUS
        ]);

        return redirect('/pengeluaranOwner');
    }
}
