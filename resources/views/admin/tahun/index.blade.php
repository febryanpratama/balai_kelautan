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
                  <button class="btn btn-outline-info" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalfat" data-whatever="@mdo">+ {{ $title }}</button>
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                     <table class="display datatables" id="basic-1">
                        <thead class="text-center">
                           <tr>
                              <th>Nama Tahun</th>
                              <th>Status </th>
                              <th>Aksi</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($data as $item=>$key)
                              <tr class="text-center">
                                 <td>{{ $key->tahun }}</td>
                                 <td>
                                    <div class="dropdown">
                                       @switch($key->status)
                                          @case('Open')
                                                <button class="badge badge-success" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                {{ $key->status }}
                                                </button>
                                                @break
                                             @case('Closed')
                                                <button class="badge badge-danger" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                {{ $key->status }}
                                                </button>
                                                @break
                                             @case('Finished')
                                                <button class="badge badge-primary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                {{ $key->status }}
                                                </button>
                                                @break
                                             @default
                                       @endswitch
                                       <ul class="dropdown-menu">
                                          <li><a class="dropdown-item" href="{{ url('admin/tahun/status?id='.$key->id.'&status=Open') }}">Open</a></li>
                                          <li><a class="dropdown-item" href="{{ url('admin/tahun/status?id='.$key->id.'&status=Closed') }}">Closed</a></li>
                                          <li><a class="dropdown-item" href="{{ url('admin/tahun/status?id='.$key->id.'&status=Finished') }}">Finished</a></li>
                                       </ul>
                                    </div>
                                 </td>
                                 <td>
                                    <a href="" class="text-warning" title="Edit Dokumen">
                                       <i data-feather="edit" ></i>
                                    </a>
                                    <a href="" class="text-danger" title="Hapus Dokumen">
                                       <i data-feather="trash" ></i>
                                    </a>
                                 </td>
                              </tr>
                           @endforeach
                        </tbody>
                        <tfoot class="text-center">
                           <tr>
                              <th>Nama Tahun</th>
                              <th>Status </th>
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
            <form method="POST" action="{{ url('admin/tahun') }}" enctype="multipart/form-data">
               @csrf
               <div class="modal-body">
                  <div class="mb-3">
                        <label class="col-form-label">Pilih {{ $title }}</label>
                        <select name="tahun"  class="form-control" id="">
                            <option value="" selected disabled> == Pilih == </option>
                            @for ($i = 2021; $i <= 2030; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                  </div>
                  <div class="mb-3">
                        <label for="label-control">Status</label>
                        <select name="status"  class="form-control" id="">
                            <option value="" selected disabled> == Pilih == </option>
                            <option value="Open">Open</option>
                            <option value="Closed">Closed</option>
                            <option value="Finished">Finished</option>
                        </select>
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