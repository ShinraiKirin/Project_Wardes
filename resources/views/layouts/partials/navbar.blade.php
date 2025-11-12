<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <i class="fas fa-store-alt text-warning"></i> Warung Desa
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('menu.index') ? 'active' : '' }}" href="{{ route('menu.index') }}">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('kontak.index') ? 'active' : '' }}" href="{{ route('kontak.index') }}">Kontak</a>
                </li>
                <li class="nav-item ms-lg-3">
                    <a class="btn btn-outline-warning position-relative" href="{{ route('cart.index') }}">
                        <i class="fas fa-shopping-cart me-1"></i> Cart
                        <span id="cart-count" class="badge bg-dark text-white ms-1 rounded-pill position-absolute top-0 start-100 translate-middle">
                            {{ session('cart') ? count(session('cart')) : 0 }}
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>