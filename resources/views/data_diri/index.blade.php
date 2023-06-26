@extends('layouts.dashboard')

@section('title')
    
@endsection

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card shadow bg-white flex-row card-rounded">
            <div class="card-body my-auto">
                <div class="title d-flex">
                    <span class="fw-bold fs-5">Identitas Diri</span>
                    <img src="{{ asset("assets/edit.png") }}" alt="" width="20px" height="20px">
                </div>
                <hr>
                <div class="image-profile d-flex justify-content-center align-items-center">
                    <img src="{{ asset('assets/PIKSI.png') }}" alt="" width="170px;" height="170px">
                </div>
                <div class="items mt-5 me-2 ms-2">
                    <div class="row">
                        <div class="col-md-6">NIDN</div>
                        <div class="col-md-6">sasa</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">NIDN</div>
                        <div class="col-md-6">sasa</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">NIDN</div>
                        <div class="col-md-6">sasa</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">NIDN</div>
                        <div class="col-md-6">sasa</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">NIDN</div>
                        <div class="col-md-6">sasa</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">NIDN</div>
                        <div class="col-md-6">sasa</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">NIDN</div>
                        <div class="col-md-6">sasa</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">NIDN</div>
                        <div class="col-md-6">sasa</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">NIDN</div>
                        <div class="col-md-6">sasa</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">NIDN</div>
                        <div class="col-md-6">sasa</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">NIDN</div>
                        <div class="col-md-6">sasa</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card shadow bg-white flex-row card-rounded">
            <div class="card-body my-auto">
                <div class="title d-flex">
                    <span class="fw-bold fs-5">Alamat Dan Kontak</span>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card shadow bg-white flex-row card-rounded">
            <div class="card-body my-auto">
                <div class="title">
                    <span class="fw-bold fs-5">Lain -Lain</span>
                    <hr>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card shadow bg-white flex-row card-rounded">
            <div class="card-body my-auto">
                <div class="title">
                    <span class="fw-bold fs-5">Kepegawaian</span>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection