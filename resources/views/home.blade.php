@extends('layouts.app')

@section('title', 'Beranda - Resep')

@section('content')

@if(request()->has('q') && request()->q != '')
  <!-- Section: Hasil Pencarian -->
  <div class="container mb-4">
    <h4 class="fw-bold mb-3">
      <i class="bi bi-search-heart me-2"></i>
      Hasil Pencarian untuk: <span class="text-green">"{{ request()->q }}"</span>
    </h4>

    @if ($recipes->isEmpty())
      <div class="alert alert-warning">
        <i class="bi bi-emoji-frown me-1"></i> Tidak ada resep yang ditemukan.
      </div>
    @else
      <div class="row">
        @foreach ($recipes as $recipe)
          <div class="col-md-3 mb-4">
            <a href="{{ route('recipes.show', $recipe->id) }}" class="card-link text-decoration-none">
              <div class="card h-100 hover-shadow rounded-4 overflow-hidden border-0">
                <img src="{{ asset('storage/' . $recipe->image) }}" class="card-img-top" alt="{{ $recipe->title }}">
                <div class="card-body">
                  <h6 class="card-title d-flex align-items-center">
                    <i class="bi bi-bookmark-heart me-2 text-terracotta"></i> {{ $recipe->title }}
                  </h6>
                  <p class="text-muted mb-1">{{ Str::limit($recipe->description, 60) }}</p>
                </div>
              </div>
            </a>
          </div>
        @endforeach
      </div>
    @endif
  </div>

@else
  <!-- Hero & Carousel -->
  @include('components.hero')
  @include('components.carousel', ['carouselRecipes' => $carouselRecipes])



<!-- Section: Card Resep -->
<section class="bg-pastel-green py-5">
  <div class="container">
    <h4 id="recipes" class="fw-bold text-center mb-5 text-green">
      <i class="bi bi-egg-fried me-2"></i> Super Delicious
    </h4>

    <div class="row mt-3">
  @foreach ($recipes as $recipe)
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
      <div class="card h-100 hover-shadow rounded-4 overflow-hidden border-0 position-relative">

        <!-- Gambar -->
        <img src="{{ asset('storage/' . $recipe->image) }}" class="card-img-top" style="height: 180px; object-fit: cover;" alt="{{ $recipe->title }}">

        <!-- Badge Kategori -->
        <div class="position-absolute top-0 end-0 m-2">
          @php
            $category = strtolower($recipe->category->name);
            $badgeClass = match($category) {
                'makanan berat' => 'bg-danger',
                'minuman' => 'bg-info',
                'dessert' => 'bg-purple',
                default => 'bg-secondary'
            };
          @endphp
          <span class="badge {{ $badgeClass }}">
            <i class="bi bi-tag-fill me-1"></i> {{ $recipe->category->name }}
          </span>
        </div>

        <!-- Konten -->
        <div class="card-body">
          <h6 class="card-title mb-1 d-flex align-items-center">
            <i class="bi bi-egg-fried me-2 text-green"></i> {{ $recipe->title }}
          </h6>
          <p class="text-muted small mb-2">{{ Str::limit($recipe->description, 60) }}</p>

          <!-- Rating -->
          @php $avg = $recipe->averageRating(); @endphp
          <div class="mb-2">
            @if ($avg > 0)
              @for ($i = 1; $i <= 5; $i++)
                <i class="bi {{ $i <= $avg ? 'bi-star-fill text-warning' : 'bi-star text-secondary' }}"></i>
              @endfor
              <small class="text-muted">({{ number_format($avg, 1) }})</small>
            @else
              <small class="text-muted"><i class="bi bi-emoji-neutral me-1"></i> Belum ada rating</small>
            @endif
          </div>

          <!-- Tombol Detail -->
          <a href="{{ route('recipes.show', $recipe->id) }}" class="btn btn-sm btn-outline-green w-100 mt-2">
            <i class="bi bi-eye-fill me-1"></i> Lihat Detail
          </a>
        </div>
      </div>
    </div>
  @endforeach
</div>

</section>

@endif

@endsection
