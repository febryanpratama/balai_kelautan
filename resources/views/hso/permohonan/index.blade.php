@extends('layouts.main')

@section('content')
<div class="page-body">
   <div class="container-fluid">
      <div class="page-title">
         <div class="row">
            <div class="col-12 col-sm-6">
               <h3>List Data {{ $title }}</h3>
            </div>
            <div class="col-12 col-sm-6">
               <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html">
                            <i data-feather="home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item">{{ $title }}</li>
                    <li class="breadcrumb-item active"> List Data {{ $title }}</li>
               </ol>
            </div>
         </div>
      </div>
   </div>
   <!-- Container-fluid starts-->
   <div class="container-fluid">
      <div class="row">
         <!-- Ajax data source array start-->
         <div class="col-sm-12">
            <div class="card">
               <div class="card-header pb-0 d-flex justify-content-between">
                  <h5 class="mb-3">Data {{ $title }}</h5>
                  {{-- <button class="btn btn-outline-info" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalfat" data-whatever="@mdo">+ {{ $title }}</button> --}}
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                     <table class="display datatables" id="basic-1">
                        <thead class="text-center">
                           <tr>
                              <th>Nama Pengguna</th>
                              <th>Tanggal Upload Dokumen</th>
                              <th>Aksi</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($data as $item=>$key)
                              <tr class="text-center">
                                 <td>{{ $key->user->name }}</td>
                                 <td>
                                    {{ Carbon\Carbon::parse($key->created_at)->format('d M Y') }}
                                 </td>
                                 <td>
                                    <a href="{{ url('hso/permohonan-dokumen/'.$key->id.'/laporan') }}" class="text-primary" title="Detail Permohonan">
                                       <i data-feather="align-center" ></i>
                                    </a>
                                 </td>
                              </tr>
                           @endforeach
                        </tbody>
                        <tfoot class="text-center">
                           <tr>
                              <th>Nama Dokumen</th>
                              <th>Dokumen </th>
                              <th>Aksi</th>
                           </tr>
                        </tfoot>
                     </table>
                  </div>
               </div>
            </div>
         </div>
         <!-- Ajax data source array end-->
         
      </div>
   </div>
   <!-- Container-fluid Ends-->
</div>

{{-- @foreach ($data as $item)
<div class="modal fade" id="viewDokumen{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Dokumen {{ $item->nama_dokumen }}</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="col-md-12" style="height: 500px">
                     <embed src="{{ asset('dokumen/'.$item->path_dokumen) }}" type="application/pdf" width="100%" height="100%"> 
                  </div>
               </div>
            </div>
        </div>
    </div>
</div>
@endforeach --}}

<div class="modal fade" id="exampleModalfat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Tambah {{ $title }}</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ url('admin/dokumen-kewajiban') }}" enctype="multipart/form-data">
               @csrf
               <div class="modal-body">
                  <div class="mb-3">
                        <label class="col-form-label">Nama {{ $title }}</label>
                        <input class="form-control" type="text" name="nama_dokumen" placeholder="Masukkan Nama {{ $title }}">
                  </div>
                  <div class="mb-3">
                        <label for="label-control">Dokumen</label>
                        <input type="file" class="form-control dropify" name="path_dokumen" >
                  </div>
               </div>
               <div class="modal-footer">
                  <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Tutup</button>
                  <button class="btn btn-primary" type="submit">Simpan {{ $title }}</button>
               </div>
            </form>
        </div>
    </div>
</div>
@endsection