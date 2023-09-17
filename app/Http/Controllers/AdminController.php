<?php

namespace App\Http\Controllers;

use App\Services\Admin\DokumenService;
use App\Services\Admin\TahunService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    protected $dokumenService;
    protected $tahunService;

    public function __construct(DokumenService $dokumenService, TahunService $tahunService)
    {
        $this->dokumenService = $dokumenService;
        $this->tahunService = $tahunService;
    }

    // Dokumen
    public function indexDokumen()
    {
        $title = "Dokumen";

        $response = $this->dokumenService->getData();

        return view('admin.dokumen.index', [
            "title" => $title,
            "data" => $response['data']
        ]);
    }

    public function postDokumen(Request $request){
        $data = $request->all();

        dd($data);
        $response = $this->dokumenService->storeData($data);

        if($response['status']){
            return back()->withSuccess($response['message']);
        }else{
            return back()->withErrors($response['message']);
        }
    }

    public function indexTahun(){
        $title = "Tahun";

        $response = $this->tahunService->getData();

        return view('admin.tahun.index', [
            "title" => $title,
            "data" => $response['data']
        ]);
    }

    public function storeTahun(Request $request){
        $data = $request->all();

        $response = $this->tahunService->storeData($data);

        if($response['status']){
            return back()->withSuccess($response['message']);
        }else{
            return back()->withErrors($response['message']);
        }
    }

    public function ubahStatus(Request $request){
        $data = $request->all();

        // dd($data);
        $response = $this->tahunService->ubahStatus($data);

        if($response['status']){
            return back()->withSuccess($response['message']);
        }else{
            return back()->withErrors($response['message']);
        }
    }
    // END Dokumen
}
