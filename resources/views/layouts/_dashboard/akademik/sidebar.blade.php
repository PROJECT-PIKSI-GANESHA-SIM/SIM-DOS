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
            <a href="{{ route('pusat_informasi') }}" style="text-decoration: none"><i class="fas fa-info-circle"></i> Pusat Informasi</a>
        </li>
        <li>
            <a href="{{ route('pesan') }}" style="text-decoration: none"><i class="fas fa-comment-dots"></i> Pesan</a>
        </li>
        <li>
            <a href="{{ route('config') }}" style="text-decoration: none"><i class="fas fa-screwdriver"></i> Config</a>
        </li>
    </ul>
</nav>
