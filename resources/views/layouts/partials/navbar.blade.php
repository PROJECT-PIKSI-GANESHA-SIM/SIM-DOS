<link rel="icon" type="image/x-icon" href="{{ asset('assets/PIKSI.png') }}">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<nav class="navbar navbar-expand-lg navbar-dark shadow-sm sticky-top" style="background-color: #8A00B9">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">
            <img src="{{ asset('assets/PIKSI.png') }}" alt="logo piksi" height="30" class="d-inline-block align-text-top">
            SIM DOSEN
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'Beranda' ? 'active' : '' }}" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'Dosen' ? 'active' : '' }}" href="{{ route('external.dosen') }}">Dosen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'Tentang' ? 'active' : '' }}" href="{{ route('external.about') }}">Tentang</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
