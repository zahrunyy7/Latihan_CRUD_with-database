@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="header-font" style="font-size: 2rem;">Katalog Parfum</h3>
    <a href="{{ route('parfums.create') }}" class="btn btn-primary">+ Tambah Parfum</a>
</div>

<div class="row">
    @if($parfums->isEmpty())
        <div class="col-12 text-center mt-5">
            <p class="fs-5 text-muted">Belum ada produk parfum yang ditambahkan.</p>
            <a href="{{ route('parfums.create') }}" class="btn btn-secondary mt-3">Tambahkan Produk Pertama</a>
        </div>
    @else
        @foreach($parfums as $parfum)
        <div class="col-md-4 mb-4">
            <div class="card shadow border-0 h-100" style="border-radius: 1rem;">
                
                <a href="{{ route('parfums.show', $parfum->id) }}" style="text-decoration: none;">
                    @if($parfum->foto)
                        <img src="{{ asset('storage/' . $parfum->foto) }}" class="card-img-top" 
                             alt="{{ $parfum->nama_parfum }}" style="height: 300px; object-fit: cover; border-top-left-radius: 1rem; border-top-right-radius: 1rem;">
                    @else
                        <div style="height: 300px; background: #eee; text-align: center; line-height: 300px; color: #aaa;">No Image</div>
                    @endif
                </a>
                
                <div class="card-body text-center">
                    <h5 class="card-title mb-1" style="color: var(--color-dark);">{{ $parfum->nama_parfum }}</h5>
                    <p class="card-text fw-bold" style="color: var(--color-tosca);">Rp {{ number_format($parfum->harga, 0, ',', '.') }}</p>
                </div>

                <div class="card-footer text-center bg-transparent border-0 d-flex justify-content-center">
                    <a href="{{ route('parfums.edit', $parfum->id) }}" class="btn btn-warning btn-sm me-2">Edit</a>
                    
                    <form action="{{ route('parfums.destroy', $parfum->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    @endif
</div>

@endsection