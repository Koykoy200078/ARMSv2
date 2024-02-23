<div class="header">
    <div class="header-left">
        <a href="/" class="logo">
            <img src="{{ asset('assets/img/logo.png') }}" width="35" height="35" alt=""> <span>ARMS</span>
        </a>
    </div>
    <a id="toggle_btn" href="javascript:void(0);"><img src="{{ asset('assets/img/icons/bar-icon.svg') }}" alt=""></a>
    <a id="mobile_btn" class="mobile_btn float-start" href="#sidebar"><img src="{{ asset('assets/img/icons/bar-icon.svg') }}" alt=""></a>
    <div class="top-nav-search mob-view">
        <form>
            <input type="text" class="form-control" placeholder="Search here">
            <a class="btn"><img src="{{ asset('assets/img/icons/search-normal.svg') }}" alt=""></a>
        </form>
    </div>
    <ul class="nav user-menu float-end">

        <li class="nav-item dropdown has-arrow user-profile-list">
            <a href="#" class="dropdown-toggle nav-link user-link" data-bs-toggle="dropdown">
                <div class="user-names">
                    <h5>{{ Auth::user()->profile->fname ?? Auth::user()->email }}</h5>
                    <span>{{ Auth::user()->role->role }}</span>
                </div>
                <span class="user-img">
                    <img src="{{ asset('assets/img/user-06.jpg') }}" alt="Admin">
                </span>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('professor.logout') }}">Logout</a>
            </div>
        </li>

    </ul>
    <div class="dropdown mobile-user-menu float-end">
        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></a>
        <div class="dropdown-menu dropdown-menu-end">
            <a class="dropdown-item" href="{{ route('professor.logout') }}">Logout</a>
        </div>
    </div>
</div>