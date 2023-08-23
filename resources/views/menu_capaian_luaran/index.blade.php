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
            <i class="fas fa-band-aid fa-lg pe-2"></i>
            <span class="fw-bold fs-5">CAPAIAN LUARAN</span>
            <hr>
        </div>
        <main>
            <section class="intro">
                <div class="bg-image h-100">
                    <div class="mask d-flex align-items-center h-100">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12">
                                <a href="{{ route('capaian_luaran.create') }}" class="btn btn-sm btn-success mb-3">TAMBAH</a>
                                    <div class="table-responsive">
                                        <table class="table table-striped mb-0">
                                            <thead style="background-color: #8A00B9;">
                                            <tr class="text-center">
                                                <th scope="col">No</th>
                                                <th scope="col">Jenis Luaran</th>
                                                <th scope="col">Judul Karya</th>
                                                <th scope="col">Tanggal</th>
                                                <th scope="col">Tautan Eksternal</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @if($capaian_luaran->isEmpty())
                                                    <tr>
                                                        <td colspan="7" class="text-center py-3">Tidak Ada Data</td>
                                                    </tr>
                                                @else()
                                                    @foreach ($capaian_luaran as $p)
                                                    {{-- @php
                                                        $menu_penunjang = App\Models\MenuPenunjang::find($p->jenjang_pendidikan);
                                                    @endphp --}}
                                                    <tr class="text-center">
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $p->jenis_luaran}}</td>
                                                        <td>{{ $p->judul_karya }}</td>
                                                        <td>{{ $p->tanggal }}</td>
                                                        <td>{{ $p->tautan_eksternal }}</td>
                                                        <td>
                                                            <div class="col">
                                                                <div class="row-3 text-center">
                                                                    <form method="POST" onsubmit="return confirm('Apakah anda yakin?')" action="{{ route('capaian_luaran.destroy', $p->id) }}">
                                                                        <a href="{{ route('capaian_luaran.view', $p->id) }}">
                                                                            <img src="{{ asset("assets/view.png") }}" alt="" width="30px" height="30px">
                                                                        </a>
                                                                        <a href="{{ route('capaian_luaran.edit', $p->id) }}">
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
                                    <div class="d-flex justify-content-end mt-3">
                                        <nav aria-label="Page navigation">
                                            <ul class="pagination">

                                                <!-- Tombol "Previous" -->
                                                <li class="page-item {{ $capaian_luaran->onFirstPage() ? 'disabled' : '' }}">
                                                    <a class="page-link" href="{{ $capaian_luaran->previousPageUrl() }}" aria-label="Previous">
                                                        <span aria-hidden="true">Previous</span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                </li>

                                                <!-- Tombol nomor halaman -->
                                                @for ($i = 1; $i <= $capaian_luaran->lastPage(); $i++)
                                                    <li class="page-item {{ $capaian_luaran->currentPage() == $i ? 'active' : '' }}">
                                                        <a class="page-link" href="{{ $capaian_luaran->url($i) }}">{{ $i }}</a>
                                                    </li>
                                                @endfor

                                                <!-- Tombol "Next" -->
                                                <li class="page-item {{ $capaian_luaran->currentPage() == $capaian_luaran->lastPage() ? 'disabled' : '' }}">
                                                    <a class="page-link" href="{{ $capaian_luaran->nextPageUrl() }}" aria-label="Next">
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
