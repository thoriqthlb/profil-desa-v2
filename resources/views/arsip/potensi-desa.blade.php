@extends('layouts.app')

@section('content')
<style>
    /* CSS Khusus untuk Halaman Potensi */
    .potensi-hero {
        background: linear-gradient(135deg, #198754, #20c997);
        color: white;
        padding: 60px 0;
        margin-bottom: 40px;
        border-radius: 0 0 30px 30px;
    }
    .potensi-card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        position: relative;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }
    .potensi-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.2);
    }
    .potensi-card img {
        width: 100%;
        height: 300px; /* Gambar dibuat lebih tinggi */
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    .potensi-card:hover img {
        transform: scale(1.1); /* Efek zoom gambar */
    }
    .potensi-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.9), rgba(0,0,0,0.4), transparent);
        padding: 40px 20px 20px;
        color: white;
    }
</style>

    <!-- Header Potensi -->
    <div class="potensi-hero text-center shadow-sm">
        <div class="container">
            <h1 class="display-5 fw-bold"><i class="fa-solid fa-leaf me-2"></i>Potensi Desa</h1>
            <p class="lead">Menjelajahi kekayaan alam, budaya, dan produk lokal kebanggaan kami.</p>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row g-4">
            @forelse ($potensis as $potensi)
                <div class="col-lg-4 col-md-6">
                    <div class="card potensi-card">
                        @if($potensi->gambar)
                            <img src="{{ Storage::url($potensi->gambar) }}" alt="{{ $potensi->nama_potensi }}">
                        @else
                            <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 300px;">
                                <i class="fa-solid fa-camera fa-3x"></i>
                            </div>
                        @endif
                        
                        <!-- Teks menumpuk di atas gambar (Overlay) -->
                        <div class="potensi-overlay">
                            <h4 class="fw-bold mb-1 text-warning">{{ $potensi->nama_potensi }}</h4>
                            <p class="mb-0 small text-light">{{ Str::limit($potensi->deskripsi, 80) }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="fa-regular fa-folder-open fa-4x text-muted mb-3"></i>
                    <h4 class="text-muted">Belum ada data potensi desa.</h4>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-5">
            {{ $potensis->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection