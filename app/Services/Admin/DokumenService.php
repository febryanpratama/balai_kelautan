<?php

namespace App\Services\Admin;

use App\Models\Dokumen;
use Illuminate\Support\Facades\Validator;

class DokumenService{

    static function getData(){
        // 
        $data = Dokumen::get();

        // dd($data);
        return [
            "data" => $data,
            "message" => "Berhasil mengambil data dokumen",
            "status" => true
        ];
    }

    static function storeData($data){
        $validator = Validator::make($data, [
            'nama_dokumen' => 'required',
            'path_dokumen' => 'required|file|mimes:docx,doc,pdf|max:2048'
        ]);

        if ($validator->fails()) {
            # code...
            // dd($validator->errors()->first());
            return [
                'message' => $validator->errors()->first(),
                'status' => false
            ];
        }

        if($data['path_dokumen']){
            $file = $data['path_dokumen'];
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'dokumen';
            $file->move($tujuan_upload,$nama_file);
        }

        Dokumen::create([
            'nama_dokumen' => $data['nama_dokumen'],
            'path_dokumen' => $nama_file
        ]);

        return [
            'message' => "Berhasil menambahkan data dokumen",
            'status' => true
        ];
    }
}