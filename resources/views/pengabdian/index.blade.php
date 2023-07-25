@extends('layouts.dashboard')

@section('title')
    
@endsection

@section('content')
<div class="alert alert-info alert-dismissible" role="alert">
    <div>{{ $pesan[0]->message }}</div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<div class="card shadow bg-white card-rounded">
    <div class="card-body my-auto">
        <div class="title">
            <i class="fas fa-graduation-cap fa-lg pe-2"></i>
            <span class="fw-bold fs-5">PENGABDIAN</span>
            <hr>
        </div>
        <main>
            <section class="intro">
                <div class="bg-image h-100">
                    <div class="mask d-flex align-items-center h-100">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <a href="{{ route('pengabdian.create') }}" class="btn btn-sm btn-success mb-3">TAMBAH</a>
                                    <div class="table-responsive">
                                        <table class="table table-striped mb-0">
                                            <thead style="background-color: #8A00B9;">
                                            <tr class="text-center">
                                                <th scope="col">No</th>
                                                <th scope="col">Judul</th>
                                                <th scope="col">Bidang Keilmuan</th>
                                                <th scope="col">Tahun <br> Pelaksanaan</th>
                                                <th scope="col">Lama Kegiatan</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @if ($pengabdian->isEmpty())
                                                    <tr>
                                                        <td colspan="7" class="text-center py-3">Tidak Ada Data</td>
                                                    </tr>
                                                @else()
                                                    @foreach ($pengabdian as $p)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $p->judul_pengabdian }}</td>
                                                        <td>{{ $p->bidang_keilmuan }}</td>
                                                        <td>{{ $p->tahun_pelaksanaan }}</td>
                                                        <td>{{ $p->lama_kegiatan }}</td>
                                                        <td>
                                                            <div class="col">
                                                                <div class="row-3 text-center">
                                                                    <form method="POST" onsubmit="return confirm('Apakah anda yakin?')" action="{{ route('pengabdian.destroy', $p->id) }}">
                                                                        <a href="{{ route('pengabdian.view', $p->id) }}">
                                                                            <img src="{{ asset("assets/view.png") }}" alt="" width="30px" height="30px">
                                                                        </a>
                                                                        <a href="{{ route('pengabdian.edit', $p->id) }}">
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
                                                <li class="page-item {{ $pengabdian->onFirstPage() ? 'disabled' : '' }}">
                                                    <a class="page-link" href="{{ $pengabdian->previousPageUrl() }}" aria-label="Previous">
                                                        <span aria-hidden="true">Previous</span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                </li>
                                    
                                                <!-- Tombol nomor halaman -->
                                                @for ($i = 1; $i <= $pengabdian->lastPage(); $i++)
                                                    <li class="page-item {{ $pengabdian->currentPage() == $i ? 'active' : '' }}">
                                                        <a class="page-link" href="{{ $pengabdian->url($i) }}">{{ $i }}</a>
                                                    </li>
                                                @endfor
                                    
                                                <!-- Tombol "Next" -->
                                                <li class="page-item {{ $pengabdian->currentPage() == $pengabdian->lastPage() ? 'disabled' : '' }}">
                                                    <a class="page-link" href="{{ $pengabdian->nextPageUrl() }}" aria-label="Next">
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

<script>
    //message with toastr
    @if(session()->has('success'))
        
        toastr.success('{{ session('success') }}', 'BERHASIL!'); 

    @elseif(session()->has('error'))

        toastr.error('{{ session('error') }}', 'GAGAL!'); 
        
    @endif

    const alertPlaceholder = document.getElementById('liveAlertPlaceholder')
    const appendAlert = (message, type) => {
    const wrapper = document.createElement('div')
    wrapper.innerHTML = [
        `<div class="alert alert-${type} alert-dismissible" role="alert">`,
        `   <div>${message}</div>`,
        '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
        '</div>'
    ].join('')

    alertPlaceholder.append(wrapper)
    }

    const alertTrigger = document.getElementById('liveAlertBtn')
    if (alertTrigger) {
    alertTrigger.addEventListener('click', () => {
        appendAlert('Nice, you triggered this alert message!', 'success')
    })
    }

</script>