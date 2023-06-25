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
            <a href="{{ route('data_diri') }}" style="text-decoration: none"><i class="fas fa-user"></i> Data Diri</a>
        </li>
        <li>
            <a href="{{ route('pendidikan') }}" style="text-decoration: none"><i class="fas fa-clipboard-list"></i> Pendidikan Formal</a>
        </li>
        <li>
            <a href="{{ route('pengajaran') }}" style="text-decoration: none"><i class="fas fa-graduation-cap"></i> Pengajaran</a>
        </li>
        <li>
            <a href="{{ route('penelitian') }}" style="text-decoration: none"><i class="fas fa-sticky-note"></i> Penelitian</a>
        </li>
        <li>
            <a href="{{ route('pengabdian') }}" style="text-decoration: none"><i class="fas fa-window-maximize"></i> Pengabdian</a>
        </li>
    </ul>
</nav>