<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class forumCont extends Controller
{
    public function postPendaftar(Request $req){
        
        $nama = $req->inputNama;
        $nim = $req->inputNim;
        $prodi= $req->inputProdi;
        $kegiatan = $req->inputKegiatan;

        $sisa = DB::table('kegiatan')->where('nama', '=', $kegiatan)->value('sisa');
        
        $kuota = DB::table('kegiatan')->where('nama', '=', $kegiatan)->value('kuota');

        if($sisa == $kuota){
            return redirect()->back()->with('error', 'Pendaftaran Gagal! Kuota panitia sudah terpenuhi');
        }else{
            DB::table('kegiatan')->where('nama', '=', $kegiatan)->increment('sisa', 1);

            $kegiatan_id = DB::table('kegiatan')->where('nama', '=', $kegiatan)->value('id');
            
            DB::table('anggota')->insert(
                ['nim' => $nim, 'nama' => $nama, 'prodi' => $prodi, 'kegiatan_id'=> $kegiatan_id]
            );

            return redirect()->back()->with('success', 'Pendaftaran Berhasil');
        }
    }

    public function pendaftar(){
        $kegiatan = DB::table('kegiatan')->get();

        return view('user.home', ['kegiatan' => $kegiatan]);
    }
}
