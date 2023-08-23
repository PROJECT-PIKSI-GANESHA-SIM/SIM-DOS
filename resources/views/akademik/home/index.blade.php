@extends('layouts.akademik-dashboard')

@section('title')

@endsection

@section('content')
<div class="card shadow bg-white flex-row card-rounded">
    <div class="card-body my-auto">
        <div class="title">
            <i class="fas fa-home fa-lg pe-2"></i>
            <span class="fw-bold fs-5">HOME</span>
            <hr>
        </div>
        <main>
            <div class="mb-3">
                <form action="{{ route('dosen.search') }}" method="GET">
                    @csrf
                    <div class="container">
                        <div class="input-group">
                            <input type="text" class="form-control" id="search" name="search" placeholder="Search for...">
                              <span class="input-group-btn">
                                <button type="submit" class="btn btn-search text-white" style="background-color: #8A00B9" type="button"><i class="fa fa-search fa-fw"></i> Search</button>
                              </span>
                        </div>
                        </div>
                </form>
            </div>

            <div class="container">
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead style="background-color: #8A00B9;">
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">NIDN</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Program Studi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if($all_user->isEmpty())
                                <tr>
                                    <td colspan="4" class="text-center py-3">Tidak Ada Data</td>
                                </tr>
                            @else()
                                @foreach ($all_user as $user)
                                    @php
                                        $kepegawaian = App\Models\Kepegawaian::where('user_id', $user->id)->get()[0];
                                    @endphp
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->nidn }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $kepegawaian->program_studi }}</td>
                                    </tr>
                                @endforeach
                            @endif()
                        </tbody>
                    </table>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-3 me-2">
                    <nav aria-label="Page navigation">
                        <ul class="pagination">

                            <!-- Tombol "Previous" -->
                            <li class="page-item {{ $all_user->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $all_user->previousPageUrl() }}" aria-label="Previous">
                                    <span aria-hidden="true">Previous</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>

                            <!-- Tombol nomor halaman -->
                            @for ($i = 1; $i <= $all_user->lastPage(); $i++)
                                <li class="page-item {{ $all_user->currentPage() == $i ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $all_user->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            <!-- Tombol "Next" -->
                            <li class="page-item {{ $all_user->currentPage() == $all_user->lastPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $all_user->nextPageUrl() }}" aria-label="Next">
                                    <span aria-hidden="true">Next</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

              <ul id="resultsList"></ul>
        </main>
    </div>
</div>
<script>
    var searchInput = document.getElementById('searchInput');
    var searchButton = document.getElementById('searchButton');
    var resultsList = document.getElementById('resultsList');

    searchButton.addEventListener('click', function() {
      var searchValue = searchInput.value.toLowerCase();

      // Hapus hasil pencarian sebelumnya
      resultsList.innerHTML = '';

      // Lakukan pencarian
      // Gantilah kode ini dengan logika pencarian sesuai kebutuhan Anda
      var data = ['Hasil 1', 'Hasil 2', 'Hasil 3', 'Hasil 4', 'Hasil 5'];

      data.forEach(function(item) {
        if (item.toLowerCase().includes(searchValue)) {
          var li = document.createElement('li');
          li.textContent = item;
          resultsList.appendChild(li);
        }
      });
    });
  </script>
@endsection
