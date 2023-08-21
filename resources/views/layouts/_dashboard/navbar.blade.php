<!-- navbar navigation component -->
<nav class="navbar navbar-expand-lg navbar-white bg-white">
    <button type="button" id="sidebarCollapse" class="btn btn-light">
        <i class="fas fa-bars"></i><span></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav navbar-nav ms-auto">
            <li class="nav-item dropdown">
                <div class="nav-dropdown">
                    <a href="#" id="nav2" class="nav-item nav-link dropdown-toggle text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                        @if ($user->image == null)
                            <img src="{{ asset('assets/profile-picture.jpg') }}" class="rounded-circle" alt="Profile Picture" width="40px" height="40px">
                        @else
                            <img src="{{ Storage::url('dosen/profile/' . $user->image) }}" class="rounded-circle" alt="Profile Picture" width="40px" height="40px">
                        @endif
                        <i style="font-size: .8em;" class="fas fa-caret-down"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end nav-link-menu">
                        <ul class="nav-list">
                            <li><a href="{{ route('profile') }}" class="dropdown-item"><i class="fas fa-address-card"></i> Profile</a></li>
                            <li><a href="{{ route('changepassword') }}" class="dropdown-item"><i class="fas fa-unlock"></i> Change Password</a></li>
                            <div class="dropdown-divider"></div>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </a>
                            </li>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>
<!-- end of navbar navigation -->
