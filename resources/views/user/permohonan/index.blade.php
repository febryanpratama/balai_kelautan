@extends('layouts.main')
@section('style')
    <style>
        .scroll::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        .scroll {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
    </style>
@endsection

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

        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-4 col-md-4 mt-2">
                    <div class="card mb-0" >
                        <div class="card-header" style="border-bottom: 1px solid #eaf0f1">
                            <h5 class="mb-0">Dokumen KKPRL</h5>
                            <div class="project-status mt-4">
                                <div class="media mb-0">
                                    <p>{{ App\Helpers\Format::getPercentage() }} %</p>
                                    <div class="media-body text-end"><span>Done</span></div>
                                </div>
                                <div class="progress" style="height: 5px">
                                    <div class="progress-bar-animated bg-primary progress-bar-striped" role="progressbar" style="width: {{ App\Helpers\Format::getPercentage() }}%" aria-valuenow="{{ App\Helpers\Format::getPercentage() }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body scroll overflow-auto" style="max-height: 300px">
                            @foreach ($dokumen as $it=>$item)
                                <a href="{{ url('user/permohonan-dokumen?doc='.$item->id) }}">
                                    <div class="d-flex text-black">
                                        <div class="m-2 my-auto align-middle"><span class="badge badge-danger">G</span></div>
                                        <div class="task_desc_0 text-black" style="color: black">{{ $item->nama_dokumen }}</div>
                                    </div>
                                    <hr>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 box-col-8 col-md-8 mt-2 xl-70">
                    <div class="email-right-aside bookmark-tabcontent">
                        <div class="card email-body radius-left">
                            <div class="ps-0">
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="pills-created" role="tabpanel" aria-labelledby="pills-created-tab">
                                        <div class="card mb-0">
                                            <div class="card-header d-flex">
                                                <h5 class="mb-0">Laporan KKPRL</h5>
                                                @if (Request::get('doc'))
                                                    <a href="#" class="btn btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#tambah" data-whatever="@mdo">
                                                        <svg xmlns="http://www.w3.org/2000/svg" style="width: 25px;height: 25px" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5v6m3-3H9m4.06-7.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                                                        </svg>

                                                        Tambah Dokumen
                                                    </a>
                                                @endif
                                            </div>
                                            <div class="card-body p-0">
                                                <div class="taskadd">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <tbody>
                                                                @if ($data == NULL)
                                                                    <tr class="text-center">
                                                                        <td>
                                                                            Data Tidak Ditemukan
                                                                        </td>
                                                                    </tr>
                                                                @else
                                                                    @foreach ($data as $it=>$item)
                                                                        <tr>
                                                                            <td>
                                                                                <h6 class="task_title_0">Tahun {{ $item->LaporanTahunan->tahun->tahun }}</h6>
                                                                                @switch($item->status)
                                                                                    @case('Progress')
                                                                                        <p class="project_name_0 badge badge-warning">{{ $item->status }}</p>
                                                                                        @break
                                                                                    @case('Disetujui')
                                                                                        <p class="project_name_0 badge badge-success">{{ $item->status }}</p>
                                                                                        @break
                                                                                    @case('Ditolak')
                                                                                        <p class="project_name_0 badge badge-danger">{{ $item->status }}</p>
                                                                                        @break
                                                                                    @default
                                                                                @endswitch
                                                                            </td>
                                                                            <td width="65%">
                                                                                <p class="task_desc_0">{{ $item->dokumen->nama_dokumen }}</p>
                                                                            </td>
                                                                            <td>
                                                                                <a class="me-2" href="{{ url('user/permohonan-dokumen/detail/'.$item->id) }}" title="Lihat Dokumen">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                                    </svg>

                                                                                </a>
                                                                                <a href="javascript:void(0)" type="button" data-bs-toggle="modal" data-bs-target="#update{{ $item->id }}" data-whatever="@mdo" title="Upload Dokumen">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="24" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 8.25H7.5a2.25 2.25 0 00-2.25 2.25v9a2.25 2.25 0 002.25 2.25h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25H15m0-3l-3-3m0 0l-3 3m3-3V15" />
                                                                                    </svg>
                                                                                </a>
                                                                            </td>
                                                                            <td>
                                                                                <a href="javascript:void(0)">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75" />
                                                                                    </svg>
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                @endif
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
    </div>

    @if ($data != NULL )
        @foreach ($data as $item)
        <div class="modal fade" id="dokumen{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel2"><b>Upload Dokumen</b> :  <br> {{ $item->nama_dokumen }}</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12" style="height: 500px">
                                    <div class="mb-3">
                                        <iframe src="{{ asset('permohonan_dokumen/'.$item->path_dokumen) }}" frameborder="0" width="100%" style="height: 500px"></iframe>
                                    </div>
                                </div>
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
        <div class="modal fade" id="update{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel2"><b>Update Dokumen</b> :  <br> {{ $item->nama_dokumen }}</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="" class="control-label">Tahun</label>
                                        <input type="text" class="form-control" value="{{ $item->LaporanTahunan->tahun->tahun }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="" class="control-label">Dokumen</label>
                                        <input type="file" class="form-control dropify" name="path_dokumen" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="" class="control-label">Keterangan</label>
                                        <textarea name="keterangan" class="form-control" id="" cols="30" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Tutup</button>
                            <button class="btn btn-primary" type="submit">Update {{ $title }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    @endif


    
    @if (Request::get('doc'))
        <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel2"><b>Upload Dokumen</b> :  <br> {{ $item->nama_dokumen }}</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ url('user/permohonan-dokumen') }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        <input type="hidden" name="dokumen_id" value="{{ Request::get('doc') }}">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="">Tahun</label>
                                <select name="tahun_id" class="form-control" id="">
                                    <option value="" selected disabled> == Pilih == </option>
                                    @foreach ($tahun as $item)
                                        <option value="{{ $item->id }}">{{ $item->tahun }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="label-control">Dokumen</label>
                                <input type="file" class="form-control dropify" name="path_dokumen[]" multiple >
                            </div>
                            <div class="mb-3">
                                <label for="label-control">Keterangan</label>
                                <textarea name="keterangan" class="form-control" id="" cols="30" rows="5"></textarea>
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
    @endif
@endsection