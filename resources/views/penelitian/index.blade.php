@extends('layouts.dashboard')

@section('title')
    
@endsection

@section('content')
<div class="card shadow bg-white flex-row card-rounded">
    <div class="card-body my-auto">
        <div class="title">
            <i class="fas fa-sticky-note fa-lg pe-2"></i>
            <span class="fw-bold fs-5">PENELITIAN</span>
            <hr>
        </div>
        <main>
            <section class="intro">
                <div class="bg-image h-100">
                    <div class="mask d-flex align-items-center h-100">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <a href="" class="btn btn-sm btn-success mb-3">TAMBAH</a>
                                    <div class="card">
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                        <table class="table table-striped mb-0">
                                            <thead style="background-color: #8A00B9;">
                                            <tr class="text-center">
                                                <th scope="col">No</th>
                                                <th scope="col">Tahun</th>
                                                <th scope="col">Judul Penelitian</th>
                                                <th scope="col">Ketua/Anggota</th>
                                                <th scope="col">Sumber Dana</th>
                                                <th scope="col">Jumlah Dana</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                    </div>
                                    <nav aria-label="...">
                                        <ul class="pagination my-3 justify-content-end">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Back</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">1</a>
                                            </li>
                                            <li class="page-item active" aria-current="page">
                                                <a class="page-link" href="#">2</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">3</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">Next</a>
                                            </li>
                                        </ul>
                                        </nav>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</div>
@endsection