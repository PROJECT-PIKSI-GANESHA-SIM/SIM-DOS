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
                                    <a href="{{ route('penelitian.create') }}" class="btn btn-sm btn-success mb-3">TAMBAH</a>
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
                                                @if ($penelitian->isEmpty())
                                                    <tr>
                                                        <td colspan="7" class="text-center py-3">Tidak Ada Data</td>
                                                    </tr>
                                                @endif
                                                @foreach ($penelitian as $p)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $p->tahun_kegiatan }}</td>
                                                        <td>{{ $p->judul_penelitian }}</td>
                                                        <td>{{ $p->status_peneliti }}</td>
                                                        <td>{{ $p->sumber_dana }}</td>
                                                        <td>{{ $p->jumlah_dana }}</td>
                                                        <td>
                                                            <div class="col">
                                                                <div class="row-3 text-center">
                                                                    <form method="POST" onsubmit="return confirm('Apakah anda yakin?')" action="{{ route('penelitian.destroy', $p->id) }}">
                                                                        <a href="{{ route('penelitian.view', $p->id) }}">
                                                                            <img src="{{ asset("assets/view.png") }}" alt="" width="30px" height="30px">
                                                                        </a>
                                                                        <a href="{{ route('penelitian.edit', $p->id) }}">
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
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <nav aria-label="Page navigation">
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
@endsection