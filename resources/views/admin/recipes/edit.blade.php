@extends('layouts.app')

@section('title', 'Edit Resep')

@section('content')
<div class="container my-5">
  <div class="bg-pastel-green p-5 rounded-4 shadow-sm">

    <h3 class="fw-bold mb-4">
      <i class="bi bi-pencil-square me-2"></i> Edit Resep
    </h3>

    <form method="POST" action="{{ route('admin.recipes.update', $recipe->id) }}" enctype="multipart/form-data">

      @csrf
      @method('PUT')

      <!-- Judul -->
      <div class="mb-3">
        <label class="form-label fw-semibold">Judul Resep</label>
        <input type="text" name="title" class="form-control" value="{{ $recipe->title }}" required>
      </div>

      <!-- Kategori -->
      <div class="mb-3">
        <label class="form-label fw-semibold">Kategori</label>
        <select name="category_id" class="form-select" required>
          @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $recipe->category_id == $category->id ? 'selected' : '' }}>
              {{ $category->name }}
            </option>
          @endforeach
        </select>
      </div>

      <!-- Deskripsi -->
      <div class="mb-3">
        <label class="form-label fw-semibold">Deskripsi</label>
        <textarea name="description" class="form-control" rows="3" required>{{ $recipe->description }}</textarea>
      </div>

      <!-- Waktu Masak -->
      <div class="mb-3">
        <label class="form-label fw-semibold">Waktu Masak</label>
        <input type="text" name="cooking_time" class="form-control" value="{{ $recipe->cooking_time }}">
      </div>

      <!-- Bahan -->
      <div class="mb-3">
        <label class="form-label fw-semibold">Bahan-Bahan</label>
        <textarea name="ingredients" class="form-control" rows="4" required>{{ $recipe->ingredients }}</textarea>
      </div>

      <!-- Langkah -->
      <div class="mb-3">
        <label class="form-label fw-semibold">Langkah-Langkah</label>
        <textarea name="instructions" class="form-control" rows="4" required>{{ $recipe->instructions }}</textarea>
      </div>

      <!-- Gambar -->
      <div class="mb-3">
        <label class="form-label fw-semibold">Gambar (opsional)</label>
        <input type="file" name="image" class="form-control">
        @if ($recipe->image)
          <div class="mt-2">
            <img src="{{ asset('storage/' . $recipe->image) }}" width="200" class="rounded shadow-sm">
          </div>
        @endif
      </div>

      <button class="btn btn-outline-green">
        <i class="bi bi-save me-1"></i> Simpan Perubahan
      </button>
    </form>
  </div>
</div>
@endsection
