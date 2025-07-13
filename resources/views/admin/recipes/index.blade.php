@extends('layouts.app')

@section('title', 'Data Resep')

@section('content')
<div class="container my-4">
  <div class="bg-pastel-green p-4 rounded-4 shadow-sm">

    <div class="d-flex justify-content-between align-items-center mb-3">
      <h3 class="fw-bold mb-0">
        <i class="bi bi-collection-fill me-2 text-green"></i> Semua Resep
      </h3>
      <a href="{{ url('/admin/recipes/create') }}" class="btn btn-outline-green">
        <i class="bi bi-plus-circle me-1"></i> Tambah Resep
      </a>
    </div>

    <div class="table-responsive">
      <table class="table table-bordered table-hover align-middle bg-white">
        <thead class="table-light text-center">
          <tr>
            <th>#</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Gambar</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($recipes as $recipe)
          <tr>
            <td class="text-center">{{ $loop->iteration }}</td>
            <td>{{ $recipe->title }}</td>
            <td>{{ $recipe->category->name }}</td>
            <td class="text-center">
              <img src="{{ asset('storage/' . $recipe->image) }}" width="80" class="rounded shadow-sm" alt="image">
            </td>
            <td class="text-center">
              <a href="{{ url('/admin/recipes/' . $recipe->id . '/edit') }}" class="btn btn-sm btn-warning me-1">
                <i class="bi bi-pencil-square"></i>
              </a>
              <form action="{{ url('/admin/recipes/' . $recipe->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Yakin ingin menghapus resep ini?')" class="btn btn-sm btn-danger">
                  <i class="bi bi-trash3-fill"></i>
                </button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </div>
</div>
@endsection
