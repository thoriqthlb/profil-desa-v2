@extends('layouts.app')

@section('title', $potensi->nama_potensi . ' — Desa Wiramastra')

@section('content')
<div class="container py-5" style="margin-top: 120px;">
    <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
            <div class="eyebrow mb-3">Potensi Desa</div>
            <h1 class="mb-4" style="font-family: 'DM Sans', sans-serif; font-weight: 700; letter-spacing: -.02em;">
                {{ $potensi->nama_potensi }}
            </h1>
            
            @if($potensi->gambar)
                <img src="{{ Storage::url($potensi->gambar) }}" alt="{{ $potensi->nama_potensi }}" class="img-fluid rounded mb-4 w-100" style="object-fit: cover; max-height: 450px;">
            @endif
        </div>
        
        <div class="col-lg-8">
            <div class="content text-muted" style="line-height: 1.8; font-size: 1.1rem; text-align: justify;">
                {{ $potensi->deskripsi }}
            </div>
        </div>
    </div>
</div>
@endsection