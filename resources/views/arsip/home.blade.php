@extends('layouts.app')

@section('content')
<style>
    /* CSS Khusus untuk Halaman Beranda */
    .welcome-section {
        padding: 100px 0 40px; 
        background-color: #fffcf5;
    }

    /* Styling Slideshow (Carousel) Full Width */
    .carousel-item {
        height: 65vh; 
        min-height: 500px;
    }
    .carousel-item img {
        object-fit: cover;
        height: 100%;
        width: 100%;
    }
    .carousel-overlay {
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        /* Gradasi gelap dari bawah agar teks selalu terbaca */
        background: linear-gradient(to top, rgba(0, 0, 0, 0.85) 0%, rgba(0, 0, 0, 0.2) 100%);
        z-index: 1;
    }
    
    /* Caption dibuat full width, tapi isinya dibatasi container */
    .carousel-caption {
        bottom: 8%;
        left: 0;
        right: 0;
        z-index: 2;
        text-align: left; 
    }
</style>

    <!-- ============================================== -->
    <!-- BAGIAN 1: UCAPAN SELAMAT DATANG -->
    <!-- ============================================== -->
    <section class="welcome-section text-center">
        <div class="container">
            <h1 class="display-5 fw-bold text-success mb-3">Selamat Datang di Website Resmi Desa Wiramastra</h1>
            <p class="lead text-secondary mb-0">Pusat Informasi, Pelayanan, dan Potensi Desa Wiramastra.</p>
        </div>
    </section>

    <!-- ============================================== -->
    <!-- BAGIAN 2: SLIDESHOW KEGIATAN & SUASANA DESA -->
    <!-- ============================================== -->
    <div id="heroCarousel" class="carousel slide carousel-fade w-100 mb-5" data-bs-ride="carousel">
        
        <div class="carousel-indicators z-3">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner">
            <!-- SLIDE 1: Pemandangan / Suasana -->
            <div class="carousel-item active" data-bs-interval="5000">
                <img src="https://images.unsplash.com/photo-1596404392429-23c8a35625ff?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" class="d-block w-100" alt="Pesona Desa">
                <div class="carousel-overlay"></div>
                <div class="carousel-caption">
                    <div class="container">
                        <h2 class="display-4 fw-bold mb-2 text-warning">Pesona Alam Asri</h2>
                        <p class="fs-5 mb-0 d-none d-md-block text-light" style="max-width: 600px;">Lingkungan yang sejuk dan menenangkan, selalu dijaga kelestariannya untuk kenyamanan warga dan keindahan desa.</p>
                    </div>
                </div>
            </div>
            
            <!-- SLIDE 2: Pertanian / Usaha Warga -->
            <div class="carousel-item" data-bs-interval="5000">
                <img src="https://images.unsplash.com/photo-1592982537447-6f23f14064fb?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" class="d-block w-100" alt="Potensi Alam">
                <div class="carousel-overlay"></div>
                <div class="carousel-caption">
                    <div class="container">
                        <h2 class="display-4 fw-bold mb-2 text-warning">Kekayaan Pertanian</h2>
                        <p class="fs-5 mb-0 d-none d-md-block text-light" style="max-width: 600px;">Hasil bumi yang melimpah menjadi tulang punggung perekonomian dan ketahanan pangan bagi masyarakat kami.</p>
                    </div>
                </div>
            </div>

            <!-- SLIDE 3: Kegiatan / Gotong Royong -->
            <div class="carousel-item" data-bs-interval="5000">
                <img src="https://images.unsplash.com/photo-1589578228447-e1a4e481c6c8?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" class="d-block w-100" alt="Kegiatan Warga">
                <div class="carousel-overlay"></div>
                <div class="carousel-caption">
                    <div class="container">
                        <h2 class="display-4 fw-bold mb-2 text-warning">Semangat Gotong Royong</h2>
                        <p class="fs-5 mb-0 d-none d-md-block text-light" style="max-width: 600px;">Tradisi kebersamaan yang terus hidup dalam setiap kegiatan masyarakat, membangun desa dengan kerukunan dan rasa kekeluargaan.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tombol Navigasi -->
        <button class="carousel-control-prev z-3" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Sebelumnya</span>
        </button>
        <button class="carousel-control-next z-3" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Selanjutnya</span>
        </button>
    </div>

    <!-- ============================================== -->
    <!-- BAGIAN POTENSI UNGGULAN -->
    <!-- ============================================== -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title">Potensi Unggulan</h2>
                <p class="text-muted mb-5">Kekayaan alam dan budaya yang menjadi kebanggaan desa kami.</p>
            </div>
            
            <div class="row g-4 justify-content-center">
                @forelse ($potensiUnggulan as $potensi)
                    <div class="col-md-4">
                        <div class="card card-custom h-100 shadow-sm border-0">
                            @if($potensi->gambar)
                                <img src="{{ Storage::url($potensi->gambar) }}" class="card-img-top" alt="{{ $potensi->nama_potensi }}" style="height: 220px; object-fit: cover;">
                            @else
                                <div class="bg-light text-muted d-flex align-items-center justify-content-center" style="height: 220px;">
                                    <i class="fa-solid fa-image fa-3x"></i>
                                </div>
                            @endif
                            <div class="card-body p-4">
                                <h5 class="card-title fw-bold text-success">{{ $potensi->nama_potensi }}</h5>
                                <p class="card-text text-secondary">{{ Str::limit($potensi->deskripsi, 100) }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted">
                        <p>Belum ada data potensi unggulan.</p>
                    </div>
                @endforelse
            </div>
            
            <div class="text-center mt-5">
                 <a href="{{ route('potensi-desa') }}" class="btn btn-outline-success rounded-pill px-4">Lihat Semua Potensi</a>
            </div>
        </div>
    </section>

    <!-- ============================================== -->
    <!-- BAGIAN KABAR DESA TERBARU -->
    <!-- ============================================== -->
    <section class="py-5" style="background-color: #f8f9fa;">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title">Kabar Desa Terbaru</h2>
                <p class="text-muted mb-5">Informasi terkini dan pengumuman penting untuk warga.</p>
            </div>

            <div class="row g-4 justify-content-center">
                @forelse ($artikelTerbaru as $artikel)
                    <div class="col-md-4">
                        <div class="card card-custom h-100 shadow-sm border-0">
                            @if($artikel->gambar)
                                <img src="{{ Storage::url($artikel->gambar) }}" class="card-img-top" alt="{{ $artikel->judul }}" style="height: 220px; object-fit: cover;">
                            @else
                                <div class="bg-light text-muted d-flex align-items-center justify-content-center" style="height: 220px;">
                                    <i class="fa-solid fa-newspaper fa-3x"></i>
                                </div>
                            @endif
                            <div class="card-body p-4">
                                <div class="mb-2 text-muted small">
                                    <i class="fa-regular fa-calendar me-1"></i> {{ $artikel->created_at->format('d M Y') }}
                                </div>
                                <h5 class="card-title fw-bold">{{ $artikel->judul }}</h5>
                                <p class="card-text text-secondary">{!! Str::limit(strip_tags($artikel->konten), 90) !!}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted">
                        <p>Belum ada artikel terbaru.</p>
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-5">
                 <a href="{{ route('artikel') }}" class="btn btn-outline-success rounded-pill px-4">Baca Berita Lainnya</a>
            </div>
        </div>
    </section>
@endsection