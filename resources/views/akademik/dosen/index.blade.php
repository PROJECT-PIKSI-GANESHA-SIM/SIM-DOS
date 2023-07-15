@extends('layouts.akademik-dashboard')

@section('title')
    
@endsection

@section('content')
<div class="card shadow bg-white flex-row card-rounded">
    <div class="card-body my-auto">
        <div class="title">
            <i class="fas fa-home fa-lg pe-2"></i>
            <span class="fw-bold fs-5">DOSEN</span>
            <hr>
        </div>
        <main>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="searchInput" placeholder="Cari...">
                <button type="button" class="btn btn-primary" id="searchButton">Cari</button>
            </div>
              
            <div class="container">
                @foreach ($users as $user)
                    <div class="row align-items-center">
                        <div class="col-2">
                            {{-- <p>IMAGE: {{ asset('dosen/profile/' . $user->image) }}</p> --}}
                            @if ($user->image == null)
                                <img src="{{ asset('assets/profile-picture.jpg') }}" class="rounded-circle" alt="Profile Picture" width="70px" height="70px">
                            @else
                                <img src="{{ Storage::url('dosen/profile/' . $user->image) }}" class="rounded-circle" alt="Profile Picture" width="70px" height="70px">    
                            @endif
                        </div>
                        <div class="col-8 text-center">
                            <h5>{{ $user->name }}</h5>
                            <p>NIDN: {{ $user->nidn }}</p>
                        </div>
                        <div class="col">
                            <div class="row-3 text-center">
                                <form method="POST" onsubmit="return confirm('Apakah anda yakin?')" action="">
                                    <a href="">
                                        <img src="{{ asset("assets/view.png") }}" alt="" width="35px" height="35px">
                                    </a>
                                    <a href="">
                                        <img src="{{ asset("assets/edit.png") }}" alt="" width="35px" height="35px">
                                    </a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="border: none; background: none; padding: 0; cursor: pointer">
                                        <img src="{{ asset("assets/delete.png") }}" alt="" width="35px" height="35px">
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
                <div class="d-flex justify-content-end">
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                
                            <!-- Tombol "Previous" -->
                            <li class="page-item {{ $users->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $users->previousPageUrl() }}" aria-label="Previous">
                                    <span aria-hidden="true">Previous</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                
                            <!-- Tombol nomor halaman -->
                            @for ($i = 1; $i <= $users->lastPage(); $i++)
                                <li class="page-item {{ $users->currentPage() == $i ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $users->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                
                            <!-- Tombol "Next" -->
                            <li class="page-item {{ $users->currentPage() == $users->lastPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $users->nextPageUrl() }}" aria-label="Next">
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