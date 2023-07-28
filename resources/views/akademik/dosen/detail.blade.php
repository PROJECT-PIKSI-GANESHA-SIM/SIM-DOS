@extends('layouts.akademik-dashboard')

@section('title')
    
@endsection

@section('content')
<ul class="nav nav-tabs card-header-tabs justify-content-end mb-0" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active bg-primary text-white" id="tab1-tab" data-bs-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true">Data Diri</a>
    </li>
    <li class="nav-item">
      <a class="nav-link bg-white text-black" id="tab2-tab" data-bs-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">Pendidikan</a>
    </li>
    <li class="nav-item">
      <a class="nav-link bg-white text-black" id="tab3-tab" data-bs-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false">Pengajaran</a>
    </li>
    <li class="nav-item">
        <a class="nav-link bg-white text-black" id="tab4-tab" data-bs-toggle="tab" href="#tab4" role="tab" aria-controls="tab4" aria-selected="false">Penelitian</a>
    </li>
    <li class="nav-item">
        <a class="nav-link bg-white text-black" id="tab5-tab" data-bs-toggle="tab" href="#tab5" role="tab" aria-controls="tab5" aria-selected="false">Pengabdian</a>
    </li>
  </ul>
<div class="card">
    <div class="card-body">
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
          <h5 class="card-title">Card 1</h5>
          <p class="card-text">This is the content of Card 1 in Tab 1.</p>
        </div>
        <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <a href="{{ route('dosen.pendidikan.create',$user->id) }}" class="btn btn-sm btn-success mb-3">TAMBAH</a>
                        <div class="card">
                        <div class="card-body p-0">
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
                                                        <form method="POST" onsubmit="return confirm('Apakah anda yakin?')" action="{{ route('dosen.pendidikan.destroy', $p->id) }}">
                                                            <a href="">
                                                                <img src="{{ asset("assets/view.png") }}" alt="" width="30px" height="30px">
                                                            </a>
                                                            <a href="{{ route('dosen.pendidikan.edit', [$user->id, $p->id]) }}">
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
                        </div>
                        <div class="d-flex justify-content-end">
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                        
                                    <!-- Tombol "Previous" -->
                                    <li class="page-item {{ $pendidikan->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $pendidikan->previousPageUrl() }}" aria-label="Previous">
                                            <span aria-hidden="true">Previous</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                        
                                    <!-- Tombol nomor halaman -->
                                    @for ($i = 1; $i <= $pendidikan->lastPage(); $i++)
                                        <li class="page-item {{ $pendidikan->currentPage() == $i ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $pendidikan->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                        
                                    <!-- Tombol "Next" -->
                                    <li class="page-item {{ $pendidikan->currentPage() == $pendidikan->lastPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $pendidikan->nextPageUrl() }}" aria-label="Next">
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
        <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <a href="{{ route('dosen.pengajaran.create', $user->id) }}" class="btn btn-sm btn-success mb-3">TAMBAH</a>
                        <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead style="background-color: #8A00B9;">
                                <tr class="text-center">
                                    <th scope="col">No</th>
                                    <th scope="col">Mata Kuliah</th>
                                    <th scope="col">Jenis <br>Mata Kuliah</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Tahun Ajar</th>
                                    <th scope="col">Jumlah <br>Mahasiswa</th>
                                    <th scope="col">SKS</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if ($pengajaran->isEmpty())
                                        <tr>
                                            <td colspan="8" class="text-center py-3">Tidak Ada Data</td>
                                        </tr>
                                    @endif
                                    @foreach ($pengajaran as $p)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $p->nama_mata_kuliah }}</td>
                                        <td>{{ $p->jenis_mata_kuliah }}</td>
                                        <td>{{ $p->kelas }}</td>
                                        <td>{{ $p->tahun_ajaran }}</td>
                                        <td>{{ $p->jumlah_mahasiswa }}</td>
                                        <td>{{ $p->jumlah_sks }}</td>
                                        <td>
                                            <div class="col">
                                                <div class="row-3 text-center">
                                                    <form method="POST" onsubmit="return confirm('Apakah anda yakin?')" action="{{ route('dosen.pengajaran.destroy', $p->id) }}">
                                                        <a href="">
                                                            <img src="{{ asset("assets/view.png") }}" alt="" width="30px" height="30px">
                                                        </a>
                                                        <a href="{{ route('dosen.pengajaran.edit', [$user->id, $p->id]) }}">
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
                                    <li class="page-item {{ $pengajaran->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $pengajaran->previousPageUrl() }}" aria-label="Previous">
                                            <span aria-hidden="true">Previous</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                        
                                    <!-- Tombol nomor halaman -->
                                    @for ($i = 1; $i <= $pengajaran->lastPage(); $i++)
                                        <li class="page-item {{ $pengajaran->currentPage() == $i ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $pengajaran->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                        
                                    <!-- Tombol "Next" -->
                                    <li class="page-item {{ $pengajaran->currentPage() == $pengajaran->lastPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $pengajaran->nextPageUrl() }}" aria-label="Next">
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
        <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="tab4-tab">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <a href="{{ route('dosen.penelitian.create', $user->id) }}" class="btn btn-sm btn-success mb-3">TAMBAH</a>
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
                                                        <form method="POST" onsubmit="return confirm('Apakah anda yakin?')" action="{{ route('dosen.penelitian.destroy', $p->id) }}">
                                                            <a href="">
                                                                <img src="{{ asset("assets/view.png") }}" alt="" width="30px" height="30px">
                                                            </a>
                                                            <a href="{{ route('dosen.penelitian.edit', [$user->id, $p->id]) }}">
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
        <div class="tab-pane fade" id="tab5" role="tabpanel" aria-labelledby="tab5-tab">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <a href="{{ route('dosen.pengabdian.create', $user->id) }}" class="btn btn-sm btn-success mb-3">TAMBAH</a>
                        <div class="card">
                        <div class="card-body p-0">
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
                                                        <form method="POST" onsubmit="return confirm('Apakah anda yakin?')" action="{{ route('dosen.pengabdian.destroy', $p->id) }}">
                                                            <a href="">
                                                                <img src="{{ asset("assets/view.png") }}" alt="" width="30px" height="30px">
                                                            </a>
                                                            <a href="{{ route('dosen.pengabdian.edit', [$user->id, $p->id]) }}">
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
                        </div>
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
    </div>
  </div>
  
  <script>
    var tabs = document.querySelectorAll('.nav-link');

    tabs.forEach(function(tab) {
        tab.addEventListener('click', function() {
            tabs.forEach(function(tab) {
                tab.classList.remove('active');
                tab.classList.remove('bg-primary');
                tab.classList.remove('text-white');

                tab.classList.add('bg-white');
                tab.classList.add('text-black');
            });

            this.classList.add('active');
            this.classList.add('bg-primary');
            this.classList.add('text-white');

            this.classList.remove('bg-white');
            this.classList.remove('text-black');
        });
    });
</script>

@endsection