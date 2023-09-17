<?php

namespace App\Http\Controllers;

use App\Models\DetailLaporanTahunan;
use App\Models\Dokumen;
use App\Models\Tahun;
use App\Services\User\PermohonanService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    protected $permohonanService;

    public function __construct(PermohonanService $permohonanService)
    {
        $this->permohonanService = $permohonanService;
    }


    public function indexPermohonan(Request $request){
        $title = 'Permohonan Dokumen';

        if($request['doc']){
            $data = DetailLaporanTahunan::with('LaporanTahunan','LaporanTahunan.tahun', 'dokumen')->where('id', $request['doc'])->whereRelation('LaporanTahunan', 'user_id', Auth::user()->id)->get();
        }

        $dokumen = Dokumen::get();
        $tahun = Tahun::get();

        return view('user.permohonan.index',[
            'title' => $title,
            'dokumen' => $dokumen,
            'tahun' => $tahun,
            'data' => $data ?? null
        ]);
    }

    public function storePermohonan(Request $request){
        $data = $request->all();

        $response = $this->permohonanService->storeData($data);

        if($response['status']){
            return back()->withSuccess($response['message']);
        }else{
            return back()->withErrors($response['message']);
        }
    }

    public function detailPermohonan($detail_id){
        $title = 'Detail Permohonan Dokumen';

        $data = DetailLaporanTahunan::with('LaporanTahunan','LaporanTahunan.tahun', 'dokumen', 'file')->where('id', $detail_id)->whereRelation('LaporanTahunan', 'user_id', Auth::user()->id)->first();

        // dd($data);
        return view('user.permohonan.detail',[
            'title' => $title,
            'data' => $data
        ]);
    }
}
