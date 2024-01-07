<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TenantController extends Controller
{
    public function addTenant(Request $request){
        $namaFolderPhoto = ""; $namaFilePhoto = "";
        foreach ($request->file("photo") as $photo) {
            $namaFilePhoto  = $photo->getClientOriginalName();
            $namaFolderPhoto = "tenant/";

            $photo->storeAs($namaFolderPhoto,$namaFilePhoto, 'public');
        }

        DB::table('tenant')->insert([
            'user_id' => 1,
            'nama' => $request->name,
            'harga' => $request->price,
            'foto' => $namaFolderPhoto.$namaFilePhoto,
            'deskripsi' => $request->desc,
            'status' => 1
        ]);

        return redirect('/tenant');
    }
}
