<nav id="sidebar" class="active">
    <div class="sidebar-header d-flex justify-content-center align-content-center">
        <img src="{{ asset("assets/PIKSI.png") }}" alt="" width="40px" height="40px">
        <h4 class="fw-bold text-white text-center m-auto">SIM DOSEN</h4>
    </div>
    <ul class="list-unstyled components text-secondary">
        <li>
            <a href="{{ route('home') }}" style="text-decoration: none"><i class="fas fa-home"></i> Home</a>
        </li>
        <li>
            <a href="{{ route('dosen') }}" style="text-decoration: none"><i class="fas fa-user"></i> Dosen</a>
        </li>
        <li>
            <a href="" style="text-decoration: none"><i class="fas fa-sticky-note"></i> Pusat Informasi</a>
        </li>
        <li>
            <a href="" style="text-decoration: none"><i class="fas fa-window-maximize"></i> Pesan</a>
        </li>
    </ul>
</nav>