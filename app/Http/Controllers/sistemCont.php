<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class sistemCont extends Controller
{
    public function show(){
        $kegiatan = DB::table('kegiatan')->get();

        return view('admin.page.kegiatan', ['kegiatan' => $kegiatan]);
    }

    public function ubahStatus($id){
        $status = DB::table('kegiatan')->where('id', '=', $id)->value('status');

        if($status=="buka"){       
            $ubahStatus = "tutup";    
        }else if ($status=="tutup"){
            $ubahStatus = "buka";
        }
        
        DB::table('kegiatan')->where('id', $id)->update(['status' => $ubahStatus]);

        return Redirect('/kegiatan');
    }

    public function hapusData($id){       
        DB::table('kegiatan')->where('id', '=', $id)->delete();
        
        DB::table('anggota')->where('kegiatan_id', '=', $id)->delete();

        return Redirect('/kegiatan');
    }

    public function detailKegiatan($id){
        $anggota = DB::table('anggota')->where('kegiatan_id', '=', $id)->get();

        return view('admin.page.dataDetail', ['anggota' => $anggota]);
    }

    public function postKegiatan(Request $req){
        
        $nama = $req->inputNama;
        $tanggal = $req->inputTanggal;
        $kuota = $req->inputKuota;
        
        $sisa = 0;
        
        $status = "Buka";

        DB::table('kegiatan')->insert(
            ['nama' => $nama, 'tanggal' => $tanggal, 'kuota' => $kuota, 'sisa' => $sisa, 'status'=> $status]
        );

        $check = DB::table('kegiatan')->where('nama', '=', $nama)->value('nama');
        
        if($check == $nama){
            return redirect()->back()->with('success', 'Penambahan Kegiatan Berhasil');
        }else{
            return redirect()->back()->with('error', 'Penambahan Kegiatan Gagal!');
        }
    }
}
