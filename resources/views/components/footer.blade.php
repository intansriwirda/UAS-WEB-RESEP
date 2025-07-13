<footer class="bg-cream text-dark pt-5 pb-4 mt-5 border-top shadow-sm">
  <div class="container">
    <div class="row">

      {{-- Tentang --}}
      <div class="col-md-4 mb-4">
        <h5 class="fw-bold mb-3">
          <i class="bi bi-egg-fried me-2 text-danger"></i> Resep<span class="text-danger">Enak</span>.
        </h5>
        <p class="small">
          ResepEnak adalah platform berbagi resep masakan rumahan, dessert lezat, dan kreasi kuliner lainnya.
          Temukan inspirasi memasak setiap hari bersama kami!
        </p>
      </div>

      {{-- Navigasi --}}
      <div class="col-md-4 mb-4">
        <h5 class="fw-bold mb-3"><i class="bi bi-link-45deg me-1"></i> Navigasi</h5>
        <ul class="list-unstyled">
          <li class="mb-1">
            <a href="{{ url('/') }}" class="text-decoration-none text-dark">
              <i class="bi bi-chevron-right me-1"></i> Beranda
            </a>
          </li>
          {{-- <li class="mb-1">
            <a href="#about" class="text-decoration-none text-dark">
              <i class="bi bi-chevron-right me-1"></i> Tentang Kami
            </a>
          </li> --}}
          <li class="mb-1">
            <a href="{{ url('/?category=all') }}" class="text-decoration-none text-dark">
              <i class="bi bi-chevron-right me-1"></i> Semua Resep
            </a>
          </li>
        </ul>
      </div>

      {{-- Kontak --}}
      <div class="col-md-4 mb-4">
        <h5 class="fw-bold mb-3"><i class="bi bi-envelope-fill me-1"></i> Hubungi Kami</h5>
        <p class="small mb-1">
          <i class="bi bi-geo-alt me-1"></i> Padang, Indonesia
        </p>
        <p class="small mb-1">
          <i class="bi bi-envelope-open me-1"></i> support@resepenak.com
        </p>
        <p class="small">
          <i class="bi bi-instagram me-1"></i> @resep.enak
        </p>
      </div>
    </div>

    {{-- Copyright --}}
    <div class="text-center mt-4 pt-3 border-top small text-muted">
      &copy; {{ date('Y') }} ResepEnak. All rights reserved.
    </div>
  </div>
</footer>
