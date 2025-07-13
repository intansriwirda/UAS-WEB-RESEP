@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Tambah Kategori</h4>

    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama Kategori</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
