@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Admin Dashboard</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row g-4">

        {{-- Manajemen Resep --}}
        <div class="col-md-6">
            <div class="card border-primary shadow h-100">
                <div class="card-body">
                    <h5 class="card-title text-primary">Manajemen Resep</h5>
                    <p class="card-text">Tambah, ubah, atau hapus resep masakan yang tersedia.</p>
                    <a href="{{ route('admin.recipes.index') }}" class="btn btn-outline-primary">Kelola Resep</a>
                </div>
            </div>
        </div>

        {{-- Manajemen Kategori --}}
        <div class="col-md-6">
            <div class="card border-success shadow h-100">
                <div class="card-body">
                    <h5 class="card-title text-success">Manajemen Kategori</h5>
                    <p class="card-text">Atur daftar kategori masakan untuk klasifikasi resep.</p>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-success">Kelola Kategori</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
