<nav class="navbar navbar-expand-lg bg-cream shadow-sm py-3 sticky-top">
  <div class="container">

    {{-- Logo Kiri --}}
    <a class="navbar-brand fw-bold text-dark fs-3" href="{{ url('/') }}">
      <i class="bi bi-egg-fried me-1 text-terracotta"></i>Resep<span class="text-terracotta">Enak</span>.</span>

    </a>

    {{-- Hamburger Button --}}
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    {{-- Link dan Form --}}
    <div class="collapse navbar-collapse" id="mainNavbar">
      {{-- Menu Tengah --}}
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active text-warning fw-bold' : '' }}">
            <i class="bi bi-house-door me-1"></i> Home
          </a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-book me-1"></i> Recipes
          </a>
          <ul class="dropdown-menu">
            @if($sharedCategories->count())
              @foreach ($sharedCategories as $category)
                <li>
                  <a class="dropdown-item" href="{{ url('/?category=' . $category->id) }}">
                    <i class="bi bi-tag me-1"></i> {{ $category->name }}
                  </a>
                </li>
              @endforeach
            @else
              <li><span class="dropdown-item text-muted">Tidak ada kategori</span></li>
            @endif
          </ul>
        </li>
      </ul>

      {{-- Search Bar --}}
      <form class="d-flex me-3" method="GET" action="{{ url('/') }}">
        <input class="form-control me-2" type="search" name="q" placeholder="Cari resep..." value="{{ request('q') }}">
        <button class="btn btn-outline-success" type="submit">
          <i class="bi bi-search"></i>
        </button>
      </form>

      {{-- Tombol Login / Dashboard --}}
      <div class="d-flex">
        @if (Session::get('admin_login'))
          <a href="/admin/dashboard" class="btn btn-outline-dark me-2">
            <i class="bi bi-speedometer2"></i> Dashboard
          </a>
          <a href="/admin/logout" class="btn btn-danger">
            <i class="bi bi-box-arrow-right"></i> Logout
          </a>
        @else
          <a href="/admin/login" class="btn btn-outline-primary">
            <i class="bi bi-box-arrow-in-right"></i> Login
          </a>
        @endif
      </div>
    </div>
  </div>
</nav>
