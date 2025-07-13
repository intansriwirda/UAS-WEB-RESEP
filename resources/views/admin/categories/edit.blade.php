@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Edit Kategori</h4>

    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nama Kategori</label>
            <input type="text" name="name" value="{{ $category->name }}" class="form-control" required>
        </div>
        <button class="btn btn-success">Update</button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
