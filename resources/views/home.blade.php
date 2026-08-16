@extends('layouts.app')

@section('title', 'Beranda — Desa Wiramastra')

@push('styles')
<style>
    /* --- 1. HERO SECTION --- */
    .home-hero {
        min-height: 580px; 
        position: relative;
        display: flex;
        align-items: flex-end;
        overflow: hidden;
        background: #28382d;
    }

    .hero-carousel {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        z-index: 0;
    }
    
    .hero-carousel .carousel-inner, 
    .hero-carousel .carousel-item {
        height: 100%;
    }

    .hero-photo {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .hero-overlay {
        position: absolute;
        inset: 0;
        background:
            linear-gradient(90deg, rgba(20,31,24,.85) 0%, rgba(20,31,24,.5) 48%, rgba(20,31,24,.1) 100%),
            linear-gradient(0deg, rgba(20,31,24,.8) 0%, transparent 60%);
        z-index: 1;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        color: #fff;
        padding: 140px 0 80px; 
        max-width: 850px;
    }

    .hero-kicker {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        border: 1px solid rgba(255,255,255,.35);
        background: rgba(255,255,255,.11);
        backdrop-filter: blur(12px);
        border-radius: 999px;
        padding: 8px 14px;
        font-size: .85rem;
        font-weight: 600;
        margin-bottom: 20px;
    }

    .hero-content h1 {
        font-size: clamp(2.5rem, 6vw, 4rem); 
        font-weight: 700;
        line-height: 1.15;
        letter-spacing: -0.02em;
        margin-bottom: 20px;
    }

    .hero-content p {
        max-width: 650px;
        color: rgba(255,255,255,.9);
        font-size: 1.1rem;
        line-height: 1.7;
        margin-bottom: 30px;
    }

    .carousel-indicators {
        z-index: 3;
        margin-bottom: 30px;
    }
    .carousel-indicators [data-bs-target] {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background-color: rgba(255,255,255,0.5);
        border: none;
    }
    .carousel-indicators .active {
        background-color: #fff;
        transform: scale(1.2);
    }

    /* --- 2. TENTANG WIRAMASTRA --- */
    .intro-number { font-family: inherit; font-weight: bold; font-size: 3.5rem; color: #8fa896; line-height: 1; }
    
    .interactive-card { 
        display: block;
        text-decoration: none;
        padding: 28px; 
        height: 100%; 
        border-radius: 16px; 
        transition: all 0.3s ease; 
        box-shadow: 0 4px 6px rgba(0,0,0,0.02);
    }
    .interactive-card:hover { 
        transform: translateY(-8px); 
        box-shadow: 0 12px 24px rgba(40, 56, 45, 0.15);
        border-color: #28382d !important;
    }
    .feature-icon { width: 50px; height: 50px; border-radius: 12px; display: flex; align-items: center; justify-content: center; background: #eef2ec; color: #28382d; margin-bottom: 22px; font-size: 1.15rem; transition: background 0.3s ease; }
    .interactive-card:hover .feature-icon { background: #28382d; color: #fff; }

    /* --- 3 & 4. PETA & INFOGRAFIS --- */
    .map-container { width: 100%; height: 450px; border-radius: 12px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
    .stat-box { display: flex; border-radius: 8px; overflow: hidden; margin-bottom: 1rem; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
    .stat-num { background-color: #28382d; color: white; width: 40%; padding: 20px; font-size: 2.2rem; font-weight: 900; text-align: center; display: flex; align-items: center; justify-content: center; }
    .stat-label { background-color: #ffffff; border: 1px solid #eef2ec; border-left: none; color: #444; width: 60%; padding: 20px; font-size: 1.1rem; font-weight: 700; display: flex; align-items: center; justify-content: center; }

    /* --- 5 & 6. BERITA & POTENSI --- */
    .news-card { overflow: hidden; height: 100%; border-radius: 16px; background: #fff; transition: transform 0.3s ease, box-shadow 0.3s ease; }
    .news-card:hover { transform: translateY(-5px); box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
    .news-card img, .news-placeholder { width: 100%; height: 220px; object-fit: cover; }
    .news-placeholder { background: #eef0eb; display: flex; align-items: center; justify-content: center; color: #9aa49d; }
    .news-body { padding: 24px; }
    .date-text { color: #7a8b80; font-size: .8rem; font-weight: 700; text-transform: uppercase; letter-spacing: .08em; }
    .potensi-strip { background: #eef1eb; }

    /* --- 7. GALERI --- */
    .gallery-item { border-radius: 12px; overflow: hidden; height: 250px; box-shadow: 0 4px 10px rgba(0,0,0,0.08); }
    .gallery-item img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s ease; }
    .gallery-item:hover img { transform: scale(1.08); }
</style>
@endpush

@section('content')
<!-- 1. HERO SECTION DENGAN SLIDESHOW -->
<section class="home-hero">
    <div id="heroSlideshow" class="carousel slide carousel-fade hero-carousel" data-bs-ride="carousel" data-bs-pause="false" data-bs-interval="4000">
        
        <!-- Indikator Dinamis -->
        <div class="carousel-indicators">
            @forelse($artikelTerbaru->take(5) as $index => $artikel)
                <button type="button" data-bs-target="#heroSlideshow" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : 'false' }}"></button>
            @empty
                <button type="button" data-bs-target="#heroSlideshow" data-bs-slide-to="0" class="active" aria-current="true"></button>
            @endforelse
        </div>

        <!-- Gambar Carousel Dinamis -->
        <div class="carousel-inner">
            @forelse($artikelTerbaru->take(5) as $index => $artikel)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    @if($artikel->gambar)
                        <img src="{{ Storage::url($artikel->gambar) }}" class="hero-photo" alt="{{ $artikel->judul }}">
                    @else
                        <!-- Fallback jika artikel tidak memiliki gambar -->
                        <img src="{{ asset('images/logo.png') }}" class="hero-photo" alt="Logo Desa" style="object-fit: contain; background-color: #28382d; padding: 100px;">
                    @endif
                </div>
            @empty
                <!-- Fallback jika tidak ada artikel sama sekali di database -->
                <div class="carousel-item active">
                    <img src="{{ asset('images/sejarah.jpg') }}" class="hero-photo" alt="Desa Wiramastra">
                </div>
            @endforelse
        </div>
    </div>

    <div class="hero-overlay"></div>

    <div class="container hero-content">
        <div class="hero-kicker reveal">
            <i class="fa-solid fa-location-dot"></i>
            Desa Wiramastra · Banjarnegara
        </div>

        <h1 class="reveal delay-1">Selamat Datang di<br>Website Desa Wiramastra</h1>

        <p class="reveal delay-2 mb-0">
            Pusat layanan informasi publik, pemerintahan, dan pemberdayaan masyarakat. Mari bersama jelajahi ragam potensi alam, kekayaan budaya, serta berbagai kegiatan warga desa kami.
        </p>
    </div>
</section>

<!-- 2. TENTANG WIRAMASTRA -->
<section class="page-section py-5" style="background-color: #f2ffed;">
    <div class="container my-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5">
                <div class="mb-0">
                    <div class="eyebrow text-success fw-bold mb-2">TENTANG WIRAMASTRA</div>
                    <h2 class="fw-bold mb-3">Ruang digital untuk mengenal desa lebih dekat.</h2>
                    <p class="text-muted">
                        Website ini menjadi pintu gerbang utama untuk melihat profil desa, transparansi informasi pemerintahan,
                        potensi lokal, serta kabar terbaru yang berkembang di tengah masyarakat.
                    </p>
                </div>
                <div class="d-flex align-items-center gap-3 mt-4">
                    <span class="intro-number">01</span>
                    <div class="text-muted small" style="line-height:1.7;">
                        Informasi desa<br>
                        dalam satu tempat.
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="row g-3 justify-content-center">
                    <div class="col-sm-6">
                        <!-- Link diubah ke route profil -->
                        <a href="{{ route('profil') }}" class="border interactive-card bg-white">
                            <div class="feature-icon"><i class="fa-solid fa-landmark"></i></div>
                            <h5 class="fw-bold text-dark mb-1">Profil Desa</h5>
                            <p class="text-muted small mb-0">Kenali sejarah, visi misi, dan jajaran aparatur desa.</p>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <!-- Link diubah ke route potensi-desa -->
                        <a href="{{ route('potensi-desa') }}" class="border interactive-card bg-white">
                            <div class="feature-icon"><i class="fa-solid fa-seedling"></i></div>
                            <h5 class="fw-bold text-dark mb-1">Potensi Lokal</h5>
                            <p class="text-muted small mb-0">Temukan kekayaan alam dan produk warga desa.</p>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <!-- Link diubah ke route artikel -->
                        <a href="{{ route('artikel') }}" class="border interactive-card bg-white">
                            <div class="feature-icon"><i class="fa-regular fa-newspaper"></i></div>
                            <h5 class="fw-bold text-dark mb-1">Kabar Desa</h5>
                            <p class="text-muted small mb-0">Ikuti informasi dan pengumuman terbaru dari desa.</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 3. PETA DESA -->
<section class="page-section py-5" style="background-color: #ffffff;">
    <div class="container my-4">
        <!-- Judul dipaksa ke tengah secara absolut -->
        <div class="d-flex flex-column align-items-center text-center mb-4 mx-auto" style="max-width: 700px;">
            <div class="eyebrow text-success fw-bold mb-2">PETA WILAYAH</div>
            <h2 class="fw-bold mb-2">Peta Desa Wiramastra</h2>
            <p class="text-muted mb-0">
                Menampilkan letak geografis dan <i>Interest Point</i> Desa Wiramastra
            </p>
        </div>

        <div class="map-container mt-4">
            <iframe 
                src="https://maps.google.com/maps?q=Desa%20Wiramastra,%20Kecamatan%20Bawang,%20Kabupaten%20Banjarnegara,%20Jawa%20Tengah&t=&z=14&ie=UTF8&iwloc=&output=embed" 
                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</section>

<!-- 4. INFOGRAFIS KEPENDUDUKAN -->
<section class="page-section py-5" style="background-color: #f2ffed;">
    <div class="container my-4">
        <!-- Judul dipaksa ke tengah secara absolut -->
        <div class="d-flex flex-column align-items-center text-center mb-5 mx-auto" style="max-width: 700px;">
            <div class="eyebrow text-success fw-bold mb-2">DATA DESA</div>
            <h2 class="fw-bold mb-2">Administrasi Penduduk</h2>
            <p class="text-muted mb-0" style="font-size: 1.1rem;">
                Sistem digital yang berfungsi mempermudah pengelolaan data dan informasi terkait dengan kependudukan desa.
            </p>
        </div>

        <div class="row g-4 justify-content-center">
            <div class="col-lg-6 col-md-6"><div class="stat-box"><div class="stat-num">3.066</div><div class="stat-label">Total Penduduk</div></div></div>
            <div class="col-lg-6 col-md-6"><div class="stat-box"><div class="stat-num">955</div><div class="stat-label">Kepala Keluarga</div></div></div>
            <div class="col-lg-6 col-md-6"><div class="stat-box"><div class="stat-num">1.620</div><div class="stat-label">Laki-Laki</div></div></div>
            <div class="col-lg-6 col-md-6"><div class="stat-box"><div class="stat-num">1.446</div><div class="stat-label">Perempuan</div></div></div>
        </div>

        <!-- Keterangan update data -->
        <div class="text-center mt-4">
            <span class="text-muted small fst-italic">* Data per 11 Agustus 2026</span>
        </div>
    </div>
</section>

<!-- 5. KABAR / BERITA DESA -->
<section class="page-section py-5" style="background-color: #ffffff;">
    <div class="container my-4">
        <!-- Judul dipaksa ke tengah secara absolut -->
        <div class="d-flex flex-column align-items-center text-center mb-5 mx-auto" style="max-width: 700px;">
            <div class="eyebrow text-success fw-bold mb-2">DARI DESA</div>
            <h2 class="fw-bold mb-2">Kabar Terbaru</h2>
            <p class="text-muted mb-0">Informasi dan cerita terkini seputar kegiatan Desa Wiramastra.</p>
        </div>

        <div class="row g-4">
            @forelse ($artikelTerbaru as $artikel)
                <div class="col-md-4">
                    <article class="news-card border-0 shadow-sm">
                        @if($artikel->gambar)
                            <img src="{{ Storage::url($artikel->gambar) }}" alt="{{ $artikel->judul }}">
                        @else
                            <div class="news-placeholder"><i class="fa-regular fa-newspaper fa-2x"></i></div>
                        @endif
                        <div class="news-body">
                            <div class="date-text mb-2">{{ $artikel->created_at->translatedFormat('d F Y') }}</div>
                            <h5 class="fw-bold mb-2">{{ $artikel->judul }}</h5>
                            <p class="text-muted small mb-0">{!! Str::limit(strip_tags($artikel->konten), 100) !!}</p>
                        </div>
                    </article>
                </div>
            @empty
                <div class="col-12 text-center text-muted py-5">Belum ada kabar berita terbaru.</div>
            @endforelse
        </div>

        <div class="text-center mt-5">
            <a href="#" class="btn btn-outline-success rounded-pill px-4">Semua kabar <i class="fa-solid fa-arrow-right ms-1"></i></a>
        </div>
    </div>
</section>

<!-- 6. POTENSI DESA -->
<section class="page-section potensi-strip py-5"style="background-color: #f2ffed;">
    <div class="container my-4">
        <!-- Judul dipaksa ke tengah secara absolut -->
        <div class="d-flex flex-column align-items-center text-center mb-5 mx-auto" style="max-width: 700px;">
            <div class="eyebrow text-success fw-bold mb-2">YANG KAMI PUNYA</div>
            <h2 class="fw-bold mb-2">Potensi Unggulan</h2>
            <p class="text-muted mb-0">Hal-hal yang menjadi identitas dan kekuatan Desa Wiramastra.</p>
        </div>

        <div class="row g-4">
            @forelse ($potensiUnggulan as $potensi)
                <div class="col-md-4">
                    <div class="news-card border-0 shadow-sm">
                        @if($potensi->gambar)
                            <img src="{{ Storage::url($potensi->gambar) }}" alt="{{ $potensi->nama_potensi }}">
                        @else
                            <div class="news-placeholder"><i class="fa-solid fa-image fa-2x"></i></div>
                        @endif
                        <div class="news-body">
                            <h5 class="fw-bold mb-2">{{ $potensi->nama_potensi }}</h5>
                            <p class="text-muted small mb-0">{{ Str::limit($potensi->deskripsi, 105) }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted py-5">Belum ada data potensi unggulan.</div>
            @endforelse
        </div>

        <div class="text-center mt-5">
            <a href="#" class="btn btn-outline-success rounded-pill px-4">Lihat semua <i class="fa-solid fa-arrow-right ms-1"></i></a>
        </div>
    </div>
</section>

<!-- 7. GALERI DESA -->
<section class="page-section py-5" style="background-color: #ffffff;">
    <div class="container my-4">
        <!-- Judul dipaksa ke tengah secara absolut -->
        <div class="d-flex flex-column align-items-center text-center mb-5 mx-auto" style="max-width: 700px;">
            <div class="eyebrow text-success fw-bold mb-2">FOTO & DOKUMENTASI</div>
            <h2 class="fw-bold mb-2">Galeri Desa</h2>
            <p class="text-muted mb-0">
                Menampilkan potret kegiatan-kegiatan yang berlangsung di desa.
            </p>
        </div>

        <div class="row g-4">
            @php
                // Mengumpulkan gambar asli dari Potensi dan Artikel
                $galeriImages = collect();
                
                if(isset($potensiUnggulan)) {
                    foreach($potensiUnggulan as $p) { 
                        if($p->gambar) $galeriImages->push(['url' => Storage::url($p->gambar), 'title' => $p->nama_potensi]); 
                    }
                }
                
                if(isset($artikelTerbaru)) {
                    foreach($artikelTerbaru as $a) { 
                        if($a->gambar) $galeriImages->push(['url' => Storage::url($a->gambar), 'title' => $a->judul]); 
                    }
                }
            @endphp

            @forelse ($galeriImages->take(6) as $img)
                <div class="col-md-4 col-sm-6">
                    <div class="gallery-item">
                        <img src="{{ $img['url'] }}" alt="{{ $img['title'] }}">
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted py-5">
                    <i class="fa-solid fa-image fa-3x mb-3 text-light"></i>
                    <p>Belum ada foto galeri.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

@endsection