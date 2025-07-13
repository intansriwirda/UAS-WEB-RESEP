@extends('layouts.app')

@section('title', $recipe->title)

@section('content')
<div class="container my-5 bg-pastel-green p-5 rounded-4 shadow-sm">

  <!-- 🖼️ Gambar & Header -->
  <div class="row align-items-center mb-5">
    <div class="col-md-6 mb-4 mb-md-0">
      <img src="{{ asset('storage/' . $recipe->image) }}"
           alt="{{ $recipe->title }}"
           class="img-fluid rounded-4 shadow"
           style="height: 100%; object-fit: cover; max-height: 420px; width: 100%;">
    </div>

    <div class="col-md-6">
      <h2 class="fw-bold text-green d-flex align-items-center mb-3">
        <i class="bi bi-egg-fried me-2 fs-4"></i> {{ $recipe->title }}
      </h2>

      <p class="text-muted"><i class="bi bi-journal-text me-2"></i> {{ $recipe->description }}</p>

      <div class="mb-3">
        <span class="badge bg-purple fs-6 py-2 px-3">
          <i class="bi bi-tag-fill me-1"></i> {{ $recipe->category->name }}
        </span>
      </div>

      <div class="mb-3">
        <strong class="me-2"><i class="bi bi-clock me-1"></i> Waktu Masak:</strong>
        {{ $recipe->cooking_time ?? 'Tidak tersedia' }}
      </div>

      <div class="mb-3">
        <strong><i class="bi bi-star-fill text-warning me-1"></i> Rating:</strong>
        @php $avg = $recipe->averageRating(); @endphp
        @if ($avg > 0)
          @for ($i = 1; $i <= 5; $i++)
            <i class="bi {{ $i <= $avg ? 'bi-star-fill text-warning' : 'bi-star text-secondary' }}"></i>
          @endfor
          <small class="text-muted ms-1">({{ number_format($avg, 1) }})</small>
        @else
          <small class="text-muted"><i class="bi bi-emoji-neutral me-1"></i> Belum ada rating</small>
        @endif
      </div>

      <a href="{{ url()->previous() }}" class="btn btn-outline-green mt-3">
        <i class="bi bi-arrow-left-circle me-1"></i> Kembali
      </a>
    </div>
  </div>

  <!-- 🍳 Bahan & Langkah -->
  <div class="row">
    <!-- Bahan -->
    <div class="col-md-6 mb-4">
      <h5 class="text-green fw-bold mb-3">
        <i class="bi bi-basket-fill me-2"></i> Bahan-bahan
      </h5>
      <ul class="list-group list-group-flush shadow-sm rounded-4 overflow-hidden">
        @foreach(preg_split("/\r\n|\r|\n/", $recipe->ingredients) as $ingredient)
          <li class="list-group-item bg-white">{{ $ingredient }}</li>
        @endforeach
      </ul>
    </div>

    <!-- Langkah -->
    <div class="col-md-6 mb-4">
      <h5 class="text-green fw-bold mb-3">
        <i class="bi bi-list-check me-2"></i> Cara Membuat
      </h5>
      <ol class="list-group list-group-numbered list-group-flush shadow-sm rounded-4 overflow-hidden">
        @foreach(preg_split("/\r\n|\r|\n/", $recipe->instructions) as $step)
          <li class="list-group-item bg-white">{{ $step }}</li>
        @endforeach
      </ol>
    </div>
  </div>
</div>
@endsection
