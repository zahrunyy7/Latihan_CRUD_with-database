@extends('layouts.app')

@section('content')

<div class="card shadow border-0 rounded-4">
    <div class="card-body">
        <!-- Judul menggunakan Font Miss Fajardose -->
        <h4 class="mb-4 header-font" style="font-size: 2rem; margin-bottom: 25px;">Tambah Produk Parfum Baru</h4>
        
        <!-- Form mengarah ke route 'parfums.store' -->
        <form action="{{ route('parfums.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label class="form-label">Nama Parfum</label>
                <input type="text" name="nama_parfum" class="form-control" value="{{ old('nama_parfum') }}" required>
                @error('nama_parfum') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi Parfum</label>
                <textarea name="deskripsi" class="form-control" rows="4">{{ old('deskripsi') }}</textarea>
                @error('deskripsi') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Harga (Angka)</label>
                <input type="number" name="harga" class="form-control" value="{{ old('harga') }}" required>
                @error('harga') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Foto Produk</label>
                <input type="file" name="foto" class="form-control">
                @error('foto') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn btn-success">Simpan Produk</button>
            <a href="{{ route('parfums.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

@endsection