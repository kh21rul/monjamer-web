<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 bg-light opacity-85"
    data-navbar-on-scroll="data-navbar-on-scroll">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img class="d-inline-block align-top img-fluid"
                src="{{ asset('landing-pages/assets/img/gallery/logo-icon.png') }}" alt="" width="50" />
            <span class="text-theme font-monospace fs-4 ps-2">MonJaMer</span>
        </a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end border-top border-lg-0 mt-4 mt-lg-0"
            id="navbarSupportedContent">
            <form class="d-flex">
                @auth
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle text-success" data-bs-toggle="dropdown"><i
                                class="fas fa-user-circle"></i>
                            {{ auth()->user()->name }}</a>
                        <div class="dropdown-menu m-0">
                            <a href="{{ route('dashboard') }}" class="dropdown-item text-success"><i
                                    class="fas fa-table"></i>
                                Dashboard</a>
                            <a href="{{ route('logout') }}" class="dropdown-item text-success"><i
                                    class="fas fa-sign-out-alt"></i>
                                logout</a>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="btn btn-lg btn-dark bg-gradient order-0">Login</a>
                @endauth
            </form>
        </div>
    </div>
</nav>
