@extends('layouts.app')

@section('title', $artikel->judul . ' — Desa Wiramastra')

@section('content')
<div class="container py-5" style="margin-top: 120px;">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h1 class="mb-4" style="font-family: 'DM Sans', sans-serif; font-weight: 700; letter-spacing: -.02em;">
                {{ $artikel->judul }}
            </h1>
            
            @if($artikel->gambar)
                <img src="{{ Storage::url($artikel->gambar) }}" alt="{{ $artikel->judul }}" class="img-fluid rounded mb-4 w-100" style="object-fit: cover; max-height: 450px;">
            @endif

            <div class="content text-muted" style="line-height: 1.8; font-size: 1.1rem; text-align: justify;">
                {!! nl2br(e($artikel->konten)) !!}
            </div>
        </div>
    </div>
</div>
@endsection