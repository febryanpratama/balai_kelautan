<?php

namespace App\Helpers;

use App\Models\DetailLaporanTahunan;
use App\Models\Dokumen;
use App\Models\LaporanTahunan;
use App\Models\Tahun;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Format {
    static function messages($string)
    {
        $str1 = str_replace('[["', '', $string);
        $str2 = str_replace('"]]', '', $str1);

        return $str2;
    }

    static function getPercentage(){
        $user = Auth::user()->id;

        $dokumen = Dokumen::count();

        $tahun = Tahun::where('tahun', Carbon::now()->format('Y'))->first();

        // dd($tahun->id);

        $LaporanTahunan = LaporanTahunan::where('tahun_id', $tahun->id)->where('user_id', $user)->first();

        if(!$LaporanTahunan){
            return 0;
        }

        $countDetail = DetailLaporanTahunan::where('laporan_tahunan_id', $LaporanTahunan->id)->count();

        // dd($countDetail);

        $total = ($countDetail / $dokumen) * 100;

        // dd(floor($total));
        return floor($total);



        // $total = 
    }
}