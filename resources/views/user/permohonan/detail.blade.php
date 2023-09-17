@extends('layouts.main')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>{{ $title }}</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></a></li>
                    <li class="breadcrumb-item">Permohonan</li>
                    <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </div>
            </div>
        </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="invoice">
                                {{-- {{ dd($data) }} --}}
                                <div>
                                    <div>
                                        <div class="row">
                                        <div class="col-sm-6">
                                            <div class="media">
                                                <div class="media-left">
                                                    <img class="media-object img-60" src="../assets/images/logo-icon.png" alt="">
                                                </div>
                                                <div class="media-body m-l-20 text-right">
                                                    <h4 class="media-heading">Dokumen : </h4>
                                                    <p><span><p>{{ $data->dokumen->nama_dokumen }}</p></span></p>
                                                </div>
                                            </div>
                                            <!-- End Info-->
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="text-md-end text-xs-center">
                                                <h3>Tahun <span class="counter">{{ $data->LaporanTahunan->tahun->tahun }}</span></h3>
                                                <p>Upload: {{ Carbon\Carbon::parse($data->created_at)->format('d M Y') }}</span><br>Payment Due: June <span>27, 2015</span></p>
                                            </div>
                                            <!-- End Title-->
                                        </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <!-- End InvoiceTop-->
                                    {{-- <div class="row invo-profile">
                                        <div class="col-xl-4">
                                            <div class="media">
                                                <div class="media-left"><img class="media-object rounded-circle img-60" src="../assets/images/user/1.jpg" alt=""></div>
                                                <div class="media-body m-l-20">
                                                <h4 class="media-heading">Johan Deo</h4>
                                                <p>JohanDeo@gmail.com<br><span>555-555-5555</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-8">
                                            <div class="text-xl-end" id="project">
                                                <h6>Dokumen</h6>
                                                <p>{{ $data->dokumen->nama_dokumen }}</p>
                                            </div>
                                        </div>
                                    </div> --}}
                                <!-- End InvoiceBot-->
                                </div>
                                <div class="col-sm-12 text-center mt-3">
                                    <button class="btn btn btn-primary me-2" type="button" onclick="myFunction()">Print</button>
                                    <button class="btn btn-secondary" type="button">Cancel</button>
                                </div>
                                <!-- End Invoice-->
                                <!-- End Invoice Holder-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="height: 308px">
                        <div class="card-header" style="border-bottom: 1px solid red">
                            <h3>History Permohonan</h3>
                        </div>
                        <div class="card-body overflow-auto">
                            <p>x</p>
                            <p>x</p>
                            <p>x</p>
                            <p>x</p>
                            <p>x</p>
                            <p>x</p>
                            <p>x</p>
                            <p>x</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($data->file as $item)
                    <div class="col-md-4">
                        <div class="card" style="height:400px">
                            <div class="card-body mb-2 text-center">
                                <iframe src="{{ asset('permohonan_dokumen/'.$item->path_dokumen) }}" width="100%" height="100%" frameborder="0"></iframe>
                                <a href="{{ asset('permohonan_dokumen/'.$item->path_dokumen) }}" class="mt-2" target="_blank">Lihat Dokumen</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection