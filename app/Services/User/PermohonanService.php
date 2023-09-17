<?php

namespace App\Services\User;

use App\Models\DetailLaporanTahunan;
use App\Models\FileLaporan;
use App\Models\LaporanTahunan;
use App\Models\LogDetailLaporan;
use App\Models\LogLaporanTahunan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PermohonanService {
    static function storeData($data){
        // dd($data);

        $validator = Validator::make($data,[
            'dokumen_id' => 'required|exists:dokumens,id',
            'tahun_id' => 'required|exists:tahuns,id',
            'keterangan' => 'required',
            'path_dokumen' => 'required',
            'path_dokumen*' => 'mimes:pdf,docx,png,jpeg,jpg|max:2048'
        ]);

        if($validator->fails()){
            return [
                'status' => false,
                'message' => $validator->errors()->first()
            ];
        }

        // dd($data);

        DB::beginTransaction();

        try {

            $laporan = LaporanTahunan::where('tahun_id', $data['tahun_id'])->where('user_id', Auth::user()->id)->first();

            if (!$laporan) {
                # code...
                $laporan = LaporanTahunan::create([
                    'tahun_id' => $data['tahun_id'],
                    'user_id' => Auth::user()->id,
                    'status' => 'Progress'
                ]);

                $log = LogLaporanTahunan::create([
                    'laporan_tahunan_id' => $laporan->id,
                    'log_user_id' => Auth::user()->id,
                    'keterangan' => 'Laporan Tahunan dibuat'
                ]);
            }

            $check = DetailLaporanTahunan::where('laporan_tahunan_id', $laporan->id)->where('dokumen_id', $data['dokumen_id'])->first();

            if($check){
                return [
                    'status' => false,
                    'message' => 'Dokumen sudah ada'
                ];
            }

            
            $detail = DetailLaporanTahunan::create([
                'laporan_tahunan_id' => $laporan->id,
                'dokumen_id' => $data['dokumen_id'],
                'status' => 'Progress',
                'keterangan' => $data['keterangan'],
            ]);

            $logDetail = LogDetailLaporan::create([
                'detail_laporan_tahunan_id' => $detail->id,
                'log_user_id' => Auth::user()->id,
                'keterangan' => 'Detail Laporan Tahunan dibuat'
            ]);

            for($i = 0; $i < count($data['path_dokumen']); $i++){
                $file = $data['path_dokumen'][$i];
                $nama_file = time()."_".$file->getClientOriginalName();
                $tujuan_upload = 'permohonan_dokumen';

                $file->move($tujuan_upload,$nama_file);

                FileLaporan::create([
                    'detail_laporan_tahunan_id' => $detail->id,
                    'path_dokumen' => $nama_file
                ]);
            }

            DB::commit();

            return [
                'status' => true,
                'message' => 'Data berhasil ditambahkan'
            ];

        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();

            return [
                'status' => false,
                'message' => $th->getMessage()
            ];
        }
    }
}