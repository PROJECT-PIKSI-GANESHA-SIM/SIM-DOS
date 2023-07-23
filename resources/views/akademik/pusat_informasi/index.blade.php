@extends('layouts.akademik-dashboard')

@section('title')
    
@endsection

@section('content')
<div class="card shadow bg-white card-rounded">
    <div class="card-body my-auto">
        <div class="title">
            <i class="fas fa-sticky-note fa-lg pe-2"></i>
            <span class="fw-bold fs-5">PUSAT INFORMASI</span>
            <hr>
        </div>
        <main class="table-responsive">
            <section class="intro">
                <div class="container table-responsive">
                    <div class="row">
                        <div class="">
                            <a href="{{ route('pusat_informasi.create') }}" class="btn btn-sm btn-success mb-3">TAMBAH</a>
                            <div class="table-responsive mb-2">
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
                                        @if ($pusat_informasi->isEmpty())
                                            <td colspan="6" class="text-center py-3">Tidak Ada Data</td>
                                        @else
                                            @foreach ($pusat_informasi as $p)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $p->title }}</td>
                                                <td>{{ $p->thumbnail }}</td>
                                                <td>{{ $p->date }}</td>
                                                <td style="word-wrap: break-word; max-width: 200px;">{{ \Illuminate\Support\Str::limit($p->description, 100) }}</td><td>
                                                    <div class="col">
                                                        <div class="row-3 text-center">
                                                            <form method="POST" onsubmit="return confirm('Apakah anda yakin?')" action="{{ route('penelitian.destroy', $p->id) }}">
                                                                <a href="">
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
                                        @endif
                                    </tbody>
                                </table>
                                </div>
                            <div class="d-flex justify-content-end">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination">
                            
                                        <!-- Tombol "Previous" -->
                                        <li class="page-item {{ $pusat_informasi->onFirstPage() ? 'disabled' : '' }}">
                                            <a class="page-link" href="{{ $pusat_informasi->previousPageUrl() }}" aria-label="Previous">
                                                <span aria-hidden="true">Previous</span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                        </li>
                            
                                        <!-- Tombol nomor halaman -->
                                        @for ($i = 1; $i <= $pusat_informasi->lastPage(); $i++)
                                            <li class="page-item {{ $pusat_informasi->currentPage() == $i ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $pusat_informasi->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endfor
                            
                                        <!-- Tombol "Next" -->
                                        <li class="page-item {{ $pusat_informasi->currentPage() == $pusat_informasi->lastPage() ? 'disabled' : '' }}">
                                            <a class="page-link" href="{{ $pusat_informasi->nextPageUrl() }}" aria-label="Next">
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
            </section>
        </main>
    </div>
</div>
@endsection