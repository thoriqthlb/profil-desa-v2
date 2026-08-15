@extends('layouts.app')

@section('content')
<style>
    /* CSS Khusus untuk Halaman Artikel */
    .artikel-header {
        border-bottom: 3px solid #198754;
        padding-bottom: 10px;
        margin-bottom: 30px;
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
    }
    .article-horizontal-card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        background: white;
        transition: all 0.3s ease;
        overflow: hidden;
    }
    .article-horizontal-card:hover {
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        transform: translateX(5px); /* Efek geser ke kanan sedikit saat di-hover */
        border-left: 5px solid #ffc107; /* Muncul garis kuning di kiri */
    }
    .article-img {
        width: 100%;
        height: 100%;
        min-height: 220px;
        object-fit: cover;
    }
    .date-badge {
        background-color: #ffc107;
        color: #212529;
        font-weight: 700;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 0.85rem;
        display: inline-block;
        margin-bottom: 15px;
    }
    /* Agar gambar melengkung sempurna di versi mobile maupun desktop */
    @media (max-width: 767.98px) {
        .article-img {
            min-height: 200px;
        }
    }
</style>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                
                <div class="artikel-header">
                    <h2 class="fw-bold mb-0 text-success"><i class="fa-regular fa-newspaper me-2"></i>Kabar Desa</h2>
                    <span class="text-muted d-none d-md-inline">Pusat informasi dan transparansi</span>
                </div>

                @forelse ($artikels as $artikel)
                    <div class="card article-horizontal-card mb-4">
                        <div class="row g-0">
                            <!-- Bagian Gambar di Kiri -->
                            <div class="col-md-4">
                                @if($artikel->gambar)
                                    <img src="{{ Storage::url($artikel->gambar) }}" class="article-img" alt="{{ $artikel->judul }}">
                                @else
                                    <div class="bg-light d-flex align-items-center justify-content-center article-img text-muted">
                                        <i class="fa-regular fa-image fa-3x"></i>
                                    </div>
                                @endif
                            </div>
                            <!-- Bagian Teks di Kanan -->
                            <div class="col-md-8">
                                <div class="card-body p-4 d-flex flex-column h-100">
                                    <div>
                                        <span class="date-badge">
                                            <i class="fa-regular fa-calendar-days me-1"></i> 
                                            {{ $artikel->created_at->translatedFormat('d F Y') }}
                                        </span>
                                        <h4 class="card-title fw-bold mb-3">{{ $artikel->judul }}</h4>
                                        <p class="card-text text-secondary mb-4">
                                            {!! Str::limit(strip_tags($artikel->konten), 180) !!}
                                        </p>
                                    </div>
                                    <div class="mt-auto">
                                        <button class="btn btn-outline-success btn-sm rounded-pill px-3">Baca Selengkapnya <i class="fa-solid fa-angle-right ms-1"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-5">
                        <i class="fa-solid fa-pen-nib fa-4x text-muted mb-3"></i>
                        <h4 class="text-muted">Belum ada artikel yang dipublikasikan.</h4>
                    </div>
                @endforelse

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-5">
                    {{ $artikels->links('pagination::bootstrap-5') }}
                </div>

            </div>
        </div>
    </div>
@endsection