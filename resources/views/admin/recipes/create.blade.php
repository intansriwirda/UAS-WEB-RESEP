@extends('layouts.app')

@section('title', 'Tambah Resep')

@section('content')
<div class="container my-5">
  <div class="bg-pastel-green p-5 rounded-4 shadow-sm">

    <h3 class="fw-bold mb-4">
      <i class="bi bi-plus-circle me-2"></i> Tambah Resep Baru
    </h3>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('admin.recipes.store') }}" enctype="multipart/form-data">

      @csrf

      <!-- Judul -->
      <div class="mb-3">
        <label class="form-label fw-semibold">Judul Resep</label>
        <input type="text" name="title" class="form-control" required>
      </div>

      <!-- Kategori -->
      <div class="mb-3">
        <label class="form-label fw-semibold">Kategori</label>
        <select name="category_id" class="form-select" required>
          <option value="">-- Pilih Kategori --</option>
          @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        </select>
      </div>

      <!-- Deskripsi -->
      <div class="mb-3">
        <label class="form-label fw-semibold">Deskripsi</label>
        <textarea name="description" class="form-control" rows="3" required></textarea>
      </div>

      <!-- Waktu Masak -->
      <div class="mb-3">
        <label class="form-label fw-semibold">Waktu Masak (misal: 30 menit)</label>
        <input type="text" name="cooking_time" class="form-control">
      </div>

      <!-- Bahan -->
      <div class="mb-3">
        <label class="form-label fw-semibold">Bahan-Bahan (pisahkan dengan enter)</label>
        <textarea name="ingredients" class="form-control" rows="4" required></textarea>
      </div>

      <!-- Langkah -->
      <div class="mb-3">
        <label class="form-label fw-semibold">Langkah Pembuatan (pisahkan dengan enter)</label>
        <textarea name="instructions" class="form-control" rows="4" required></textarea>
      </div>

      <!-- Gambar -->
      <div class="mb-3">
        <label class="form-label fw-semibold">Gambar</label>
        <input type="file" name="image" class="form-control">
      </div>

      <button type="submit" class="btn btn-outline-green">
        <i class="bi bi-save me-1"></i> Simpan Resep
      </button>
    </form>
  </div>
</div>
@endsection
