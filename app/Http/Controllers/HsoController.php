<?php

namespace App\Http\Controllers;

use App\Models\DetailLaporanTahunan;
use App\Models\LaporanTahunan;
use Illuminate\Http\Request;

class HsoController extends Controller
{
    //

    public function indexPermohonan(){
        $title = 'Permohonan Dokumen';

        $data = LaporanTahunan::with('user')->where('is_verify', 'Verificator')->get();

        return view('hso.permohonan.index', [
            'title' => $title,
            'data' => $data
        ]);
    }

    public function LaporanTahunan($tahunan_id){
        
        $data = DetailLaporanTahunan::with('LaporanTahunan.user', 'dokumen')->where('laporan_tahunan_id', $tahunan_id)->get();
        
        
        $title = 'Detail Laporan Tahunan '. @$data[0]->LaporanTahunan->tahun->tahun;
        return view('hso.permohonan.detail', [
            'title' => $title,
            'data' => $data
        ]);
    }

    public function DetailLaporanTahunan($tahunan_id, $detail_laporan_id){

        $check = DetailLaporanTahunan::with('LaporanTahunan', 'LaporanTahunan.user','LaporanTahunan.tahun', 'dokumen', 'file','logDetail', 'logDetail.user')
        ->where('laporan_tahunan_id', $tahunan_id)
        ->where('id', $detail_laporan_id)
        ->first();
        
        if(!$check){
            return back()->withErrors('Data tidak ditemukan');
        }



        $title = 'Detail Laporan Tahunan '. @$check->LaporanTahunan->user->name;
        return view('hso.permohonan.detaillaporan', [
            'title' => $title,
            'data' => $check
        ]);
    }
}
