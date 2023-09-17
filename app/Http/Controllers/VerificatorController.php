<?php

namespace App\Http\Controllers;

use App\Models\DetailLaporanTahunan;
use App\Models\Dokumen;
use App\Models\LaporanTahunan;
use App\Models\LogDetailLaporan;
use App\Models\LogLaporanTahunan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class VerificatorController extends Controller
{
    //

    public function indexPermohonan(Request $request){
        $title = 'Permohonan Dokumen';

        if($request['doc']){
            $data = DetailLaporanTahunan::with('LaporanTahunan','LaporanTahunan.tahun', 'dokumen')->where('id', $request['doc'])->get();
        }
        $dokumen = Dokumen::get();


        return view('verificator.permohonan.index', [
            'title' => $title,
            'dokumen' => $dokumen,
            'data' => $data ?? null
        ]);
    }

    public function detailPermohonan($detail_id){
        $title = 'Detail Permohonan Dokumen';

        $data = DetailLaporanTahunan::with('LaporanTahunan','LaporanTahunan.tahun', 'dokumen', 'file','logDetail', 'logDetail.user')->where('id', $detail_id)->first();

        // dd($data->logDetail);
        return view('verificator.permohonan.detail', [
            'title' => $title,
            'data' => $data
        ]);
    }

    public function ubahStatus(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:Disetujui,Ditolak',
            'detail_id' => 'required',
            'catatan' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }

        DB::beginTransaction();

        try {
            //code...
            $data = DetailLaporanTahunan::where('id', $request['detail_id'])->update([
                'status' => $request['status'],
            ]);
    
            $log = LogDetailLaporan::create([
                'detail_laporan_tahunan_id' => $request['detail_id'],
                'log_user_id' => Auth::user()->id,
                'keterangan' => "Dokumen ini telah disetujui oleh verifikator dengan catatan ".$request['catatan'] ?? 'Tidak ada',
            ]);

            $detail = DetailLaporanTahunan::where('id', $request['detail_id'])->first();

            $check = DetailLaporanTahunan::where('laporan_tahunan_id', $detail->laporan_tahunan_id)->where('status', 'Disetujui')->count();

            // dd($check);
            $checkDokumen = Dokumen::count();

            if($check == $checkDokumen){
                $rlaporantahunan = LaporanTahunan::where('id', $detail->laporan_tahunan_id)->update([
                    'is_verify' => 'Verificator'
                ]);

                $log = LogLaporanTahunan::create([
                    'laporan_tahunan_id' => $detail->laporan_tahunan_id,
                    'log_user_id' => Auth::user()->id,
                    'keterangan' => "Dokumen ini telah disetujui oleh verifikator",
                ]);

            }

            DB::commit();

            return back()->withSuccess('Berhasil mengubah status dokumen');

        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }


    }
}
