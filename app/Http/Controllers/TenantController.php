<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
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

    public function editTenant(Request $request){
        return redirect('/editTenant?tenant_id=' . ($request->id));
    }

    public function changeTenant(Request $request){
        $request->validate(
            [
                "photo" => "required",
                'name' => 'required',  
                'price' => 'required',
                'desc'=> 'required',  
            ],
            [
                "required" => "Fill the blank",
            ]
        );
        $namaFolderPhoto = ""; $namaFilePhoto = "";
        foreach ($request->file("photo") as $photo) {
            $namaFilePhoto  = $photo->getClientOriginalName();
            $namaFolderPhoto = "tenant/";

            $photo->storeAs($namaFolderPhoto,$namaFilePhoto, 'public');
        }

        $id = $request->id;
        DB::table('tenant')->where('tenant_id', '=', $id)->update([
            'nama' => $request->name,
            'harga' => $request->price,
            'foto' => $namaFolderPhoto.$namaFilePhoto,
            'deskripsi' => $request->desc,
        ]);
        return redirect('/tenant');
    }

    public function deleteTenant(Request $request){
        $Tenant = Tenant::where('tenant_id', $request->id)->first();
        DB::table('tenant')->where('tenant_id', '=', $Tenant->tenant_id)->update([
            'status' => 0 //DIHAPUS
        ]);

        return redirect('/tenant');
    }
}
