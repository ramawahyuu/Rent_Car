<style>
    .dropdown-item:hover {
    background-color: rgba(0, 0, 0, 0.05);
}
</style>
<nav class="navbar navbar-expand-lg px-5 py-3 mx-auto">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{ asset("logonew.png") }}" alt="logo" height="40" />
        </a>
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav text-dark fw-semibold lh-md">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('cars') }}">
                        Categories
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('about') }}">
                        About Us
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        Help center
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="#">Contact Us</a>
                        </li>
                        <li><a class="dropdown-item" href="#">FAQ</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto text-dark fw-semibold lh-md">
                @guest
                @if(Route::has("register"))
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            aria-current="page"
                            href="{{ route("register") }}"
                        >
                            {{ __("Register") }}
                        </a>
                    </li>
                @endif

                @if(Route::has("login"))
                    <li class="nav-item">
                        <a
                            class="nav-link btn btn-lg btn-success text-light rounded-5 px-4"
                            aria-current="page"
                            href="{{ route("login") }}"
                        >
                            {{ __("Login") }}
                            <b class="bi bi-box-arrow-in-right"></b>
                        </a>
                    </li>
                @endif
                 @else
                 <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="bi bi-person-circle me-2" style="font-size: 30px; color: #fff;"></i>
                        <span>{{ Auth::user()->name }}</span>
                    </a>
                
                    <div class="dropdown-menu dropdown-menu-end shadow border-0" style="background: linear-gradient(135deg, #f7f7f7, #e3e3e3); border-radius: 10px;" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item d-flex align-items-center py-2" href="{{ route('pesanan') }}" style="transition: background 0.3s;">
                            <i class="bi bi-bell me-2" style="font-size: 18px; color: #333;"></i> 
                            <span style="color: #333; font-weight: 500;">Pesanan Saya</span>
                        </a>
                        <a class="dropdown-item d-flex align-items-center py-2" href="{{ route('pengembalian') }}" style="transition: background 0.3s;">
                            <i class="bi bi-box-arrow-left me-2" style="font-size: 18px; color: #333;"></i> 
                            <span style="color: #333; font-weight: 500;">Pengembalian Mobil</span>
                        </a>
                        <a class="dropdown-item d-flex align-items-center py-2" href="{{ route('history') }}" style="transition: background 0.3s;">
                            <i class="bi bi-clock-history me-2" style="font-size: 18px; color: #333;"></i> 
                            <span style="color: #333; font-weight: 500;">Riwayat Pemesanan</span>
                        </a>
                        @if (auth()->user()->role != "user")
                        <a class="dropdown-item d-flex align-items-center py-2" href="{{ route('dashboard') }}" style="transition: background 0.3s;">
                            <i class="bi bi-grid me-2" style="font-size: 18px; color: #333;"></i> 
                            <span style="color: #333; font-weight: 500;">Dashboard</span>
                        </a>
                        @endif
                        
                        <div class="dropdown-divider"></div>
                
                        <a class="dropdown-item d-flex align-items-center py-2" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="transition: background 0.3s;">
                            <i class="bi bi-box-arrow-left me-2" style="font-size: 18px; color: #333;"></i> 
                            <span style="color: #333; font-weight: 500;">{{ __('Logout') }}</span>
                        </a>
                
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                
                @endguest
            </ul>
        </div>
    </div>
</nav>
