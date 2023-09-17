<?php

namespace App\Services\Admin;

use App\Models\Tahun;
use Illuminate\Support\Facades\Validator;

class TahunService{
    static function getData(){
        // 
        $data = Tahun::all();

        return [
            'status' => true,
            'data' => $data
        ];
    }

    static function storeData($data){
        $validator = Validator::make($data, [
            'tahun' => 'required|unique:tahuns,tahun',
            'status' => 'required|in:Open,Closed,Finished'
        ]);

        if($validator->fails()){
            return [
                'status' => false,
                'message'=> $validator->errors()->first()
            ];
        }

        Tahun::create([
            'tahun' => $data['tahun'],
            'status' => $data['status']
        ]);

        return [
            'status' => true,
            'message'=> 'Data berhasil ditambahkan'
        ];
    }

    static function ubahStatus($data){
        $validator = Validator::make($data, [
            'id' => 'required|exists:tahuns,id',
            'status' => 'required|in:Open,Closed,Finished'
        ]);

        if($validator->fails()){
            return [
                'status' => false,
                'message'=> $validator->errors()->first()
            ];
        }

        $tahun = Tahun::find($data['id']);
        $tahun->status = $data['status'];
        $tahun->save();

        return [
            'status' => true,
            'message'=> 'Status berhasil diubah'
        ];

    }
}