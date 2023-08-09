@extends('layouts.dashboard')

@section('title')
    
@endsection

@section('content')
@if ($pesan[0]->status != 0)
    <div class="alert alert-info alert-dismissible" role="alert">
        <div>{{ $pesan[0]->message }}</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="card shadow bg-white card-rounded">
    <div class="card-body my-auto">
        <div class="title">
            <i class="fas fa-clipboard-list fa-lg pe-2"></i>
            <span class="fw-bold fs-5">PENDIDIKAN</span>
            <hr>
        </div>
        <main>
            <section class="intro">
                <div class="bg-image h-100">
                    <div class="mask d-flex align-items-center h-100">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <a href="{{ route('pendidikan.create') }}" class="btn btn-sm btn-success mb-3">TAMBAH</a>
                                    <div class="table-responsive">
                                        <table class="table table-striped mb-0">
                                            <thead style="background-color: #8A00B9;">
                                            <tr class="text-center">
                                                <th scope="col">No</th>
                                                <th scope="col">Jenjang</th>
                                                <th scope="col">Gelar</th>
                                                <th scope="col">Bidang Studi</th>
                                                <th scope="col">Perguruan Tinggi</th>
                                                <th scope="col">Tahun Lulus</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @if($pendidikan->isEmpty())
                                                    <tr>
                                                        <td colspan="7" class="text-center py-3">Tidak Ada Data</td>
                                                    </tr>
                                                @else()
                                                    @foreach ($pendidikan as $p)
                                                    @php
                                                        $jenjang_pendidikan = App\Models\JenjangPendidikan::find($p->jenjang_pendidikan);
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $jenjang_pendidikan->name}}</td>
                                                        <td>{{ $p->gelar_singkat }}</td>
                                                        <td>{{ $p->bidang_studi }}</td>
                                                        <td>{{ $p->nama_instansi }}</td>
                                                        <td>{{ $p->tanggal_berakhir_studi }}</td>
                                                        <td>
                                                            <div class="col">
                                                                <div class="row-3 text-center">
                                                                    <form method="POST" onsubmit="return confirm('Apakah anda yakin?')" action="{{ route('pendidikan.destroy', $p->id) }}">
                                                                        <a href="{{ route('pendidikan.view', $p->id) }}">
                                                                            <img src="{{ asset("assets/view.png") }}" alt="" width="30px" height="30px">
                                                                        </a>
                                                                        <a href="{{ route('pendidikan.edit', $p->id) }}">
                                                                            <img src="{{ asset("assets/edit.png") }}" alt="" width="30px" height="30px">
                                                                        </a>
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" style="border: none; background: none; padding: 0; cursor: pointer">
                                                                            <img src="{{ asset("assets/delete.png") }}" alt="" width="30px" height="30px">
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                @endif()
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <nav aria-label="Page navigation">
                                            <ul class="pagination">
                                    
                                                <!-- Tombol "Previous" -->
                                                <li class="page-item {{ $pendidikan->onFirstPage() ? 'disabled' : '' }}">
                                                    <a class="page-link" style="background-color: #8A00B9" href="{{ $pendidikan->previousPageUrl() }}" aria-label="Previous">
                                                        <span aria-hidden="true">Previous</span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                </li>
                                    
                                                <!-- Tombol nomor halaman -->
                                                @for ($i = 1; $i <= $pendidikan->lastPage(); $i++)
                                                    <li class="page-item {{ $pendidikan->currentPage() == $i ? 'active' : '' }}">
                                                        <a class="page-link" style="background-color: #8A00B9" href="{{ $pendidikan->url($i) }}">{{ $i }}</a>
                                                    </li>
                                                @endfor
                                    
                                                <!-- Tombol "Next" -->
                                                <li class="page-item {{ $pendidikan->currentPage() == $pendidikan->lastPage() ? 'disabled' : '' }}">
                                                    <a class="page-link" style="background-color: #8A00B9" href="{{ $pendidikan->nextPageUrl() }}" aria-label="Next">
                                                        <span aria-hidden="true">Next</span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
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
<script>
    //message with toastr
    @if(session()->has('success'))
        
        toastr.success('{{ session('success') }}', 'BERHASIL!'); 

    @elseif(session()->has('error'))

        toastr.error('{{ session('error') }}', 'GAGAL!'); 
        
    @endif
</script>
@endsection
