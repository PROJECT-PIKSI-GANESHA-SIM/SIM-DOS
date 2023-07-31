<nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color: #8A00B9">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">
            <img src="assets/PIKSI.png" alt="logo piksi" height="30" class="d-inline-block align-text-top">
            SIM DOSEN
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ ($title === "Beranda") ? 'active' : '' }}" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title === "Dosen") ? 'active' : '' }}" href="dosen">Dosen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title === "Tentang") ? 'active' : '' }}" href="about">Tentang</a>
                </li>
            </ul>
        </div>
    </div>
</nav>