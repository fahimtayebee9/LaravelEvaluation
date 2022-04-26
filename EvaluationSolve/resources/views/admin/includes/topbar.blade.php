<nav class="navbar navbar-expand-lg d-flex justify-content-between">
    <div class="" id="navbarNav">
        <ul class="navbar-nav" id="leftNav">
            <li class="nav-item">
                <a class="nav-link" id="sidebar-toggle" href=""><i data-feather="arrow-left"></i></a>
            </li>
        </ul>
    </div>
    <div class="logo">
        <a class="navbar-brand" href="{{ route('dashboard') }}"></a>
    </div>
    <div class="" id="headerNav">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link profile-dropdown" href="#" id="profileDropDown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    {{-- <img src="{{ (!is_null(auth()->user()->image)) ? 
                        asset('storage/uploads/users/' . auth()->user()->image) : 
                        asset('storage/assets/images/avatars/profile-image.png') }}" alt=""> --}}
                </a>
                <div class="dropdown-menu dropdown-menu-end profile-drop-menu" aria-labelledby="profileDropDown">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="dropdown-item" type="submit">
                            <i data-feather="log-out"></i>Logout
                        </button>
                    </form>
                    {{-- <a class="dropdown-item" href="#"><i data-feather="log-out"></i>Logout</a> --}}
                </div>
            </li>
        </ul>
    </div>
</nav>