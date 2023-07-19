@extends('layouts.akademik-dashboard')

@section('title')
    
@endsection

@section('content')
<div class="card shadow bg-white flex-row card-rounded">
    <div class="card-body my-auto">
        <div class="title">
            <i class="fas fa-sticky-note fa-lg pe-2"></i>
            <span class="fw-bold fs-5">PUSAT INFORMASI</span>
            <hr>
        </div>
        <main>
            <section class="intro">
                <div class="bg-image h-100">
                    <div class="mask d-flex align-items-center h-100">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <a href="{{ route('pusat_informasi.create') }}" class="btn btn-sm btn-success mb-3">TAMBAH</a>
                                    <div class="card">
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                        <table class="table table-striped mb-0">
                                            <thead style="background-color: #8A00B9;">
                                            <tr class="text-center">
                                                <th scope="col">No</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Thumbnail</th>
                                                <th scope="col">Tanggal</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        {{-- <nav aria-label="Page navigation">
                                            <ul class="pagination">
                                    
                                                <!-- Tombol "Previous" -->
                                                <li class="page-item {{ $penelitian->onFirstPage() ? 'disabled' : '' }}">
                                                    <a class="page-link" href="{{ $penelitian->previousPageUrl() }}" aria-label="Previous">
                                                        <span aria-hidden="true">Previous</span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                </li>
                                    
                                                <!-- Tombol nomor halaman -->
                                                @for ($i = 1; $i <= $penelitian->lastPage(); $i++)
                                                    <li class="page-item {{ $penelitian->currentPage() == $i ? 'active' : '' }}">
                                                        <a class="page-link" href="{{ $penelitian->url($i) }}">{{ $i }}</a>
                                                    </li>
                                                @endfor
                                    
                                                <!-- Tombol "Next" -->
                                                <li class="page-item {{ $penelitian->currentPage() == $penelitian->lastPage() ? 'disabled' : '' }}">
                                                    <a class="page-link" href="{{ $penelitian->nextPageUrl() }}" aria-label="Next">
                                                        <span aria-hidden="true">Next</span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav> --}}
                                    </div>
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