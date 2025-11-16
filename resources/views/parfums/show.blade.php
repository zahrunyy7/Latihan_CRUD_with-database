@extends('layouts.app')

@section('content')

<div class="card shadow p-4">
    <h2 class="header-font app-title" style="font-size: 2.5rem; border-bottom: 3px solid var(--color-tosca);">
        Detail Parfum: {{ $parfum->nama_parfum }}
    </h2>
    <div class="row mt-4">
        
        <div class="col-md-5">
            @if($parfum->foto)
                <img src="{{ asset('storage/' . $parfum->foto) }}" class="img-fluid rounded-3 shadow-sm" alt="{{ $parfum->nama_parfum }}">
            @else
                <div style="height: 400px; background: #eee; text-align: center; line-height: 400px; color: #aaa;">Tidak Ada Gambar</div>
            @endif
        </div>
        
        <div class="col-md-7">
            <h5 class="mb-3" style="color: var(--color-dark);">Harga:</h5>
            <p class="fs-4 fw-bold" style="color: var(--color-tosca);">
                Rp {{ number_format($parfum->harga, 0, ',', '.') }}
            </p>
            
            <h5 class="mt-4" style="color: var(--color-dark);">Deskripsi Produk:</h5>
            <p style="white-space: pre-wrap;">{{ $parfum->deskripsi }}</p>
            
            <a href="{{ route('parfums.index') }}" class="btn btn-secondary mt-3">← Kembali ke Katalog</a>
            
            <a href="{{ route('parfums.edit', $parfum->id) }}" class="btn btn-warning mt-3 me-2">Edit Produk</a>

            <form action="{{ route('parfums.destroy', $parfum->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger mt-3">Hapus</button>
            </form>
        </div>
    </div>
</div>

@endsection