@extends('layouts.app')

@section('content')
<style>
    /* CSS Khusus Halaman Profil */
    .profil-header {
        background: url('https://www.transparenttextures.com/patterns/cubes.png'), linear-gradient(135deg, #198754, #146c43);
        color: white;
        padding: 80px 0;
        border-radius: 0 0 40px 40px;
        margin-bottom: -40px;
    }
    
    .team-card {
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        padding: 0 20px 30px;
        transition: transform 0.3s ease;
        position: relative;
        margin-top: 60px;
    }
    .team-card:hover {
        transform: translateY(-10px);
    }
    .team-card::before {
        content: "";
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 60px;
        background: #f8f9fa;
        z-index: 1;
        border-bottom: 3px solid #ffc107;
    }
    .team-photo {
        width: 130px;
        height: 130px;
        margin: -65px auto 20px;
        position: relative;
        z-index: 2;
        border-radius: 50%;
        border: 6px solid #ffffff;
        box-shadow: 0 5px 15px rgba(0,0,0,0.15);
        background-color: #e9ecef;
        overflow: hidden;
    }
    .team-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .team-photo .placeholder-icon {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #6c757d;
        color: white;
    }
</style>

    <!-- Filter Data Kepala Desa -->
    @php
        $kepalaDesa = $perangkat->filter(function($item) {
            return stripos($item->jabatan, 'kepala') !== false;
        })->first();

        $perangkatLain = $perangkat->filter(function($item) {
            return stripos($item->jabatan, 'kepala') === false;
        });
    @endphp

    <!-- Header Profil -->
    <div class="profil-header text-center shadow">
        <div class="container pb-5">
            <h1 class="display-4 fw-bold"><i class="fa-solid fa-landmark-flag me-3"></i>Profil {{ $profil->nama_desa ?? 'Desa' }}</h1>
            <p class="lead fs-4">Mewujudkan masyarakat sejahtera melalui visi dan misi yang nyata.</p>
        </div>
    </div>

    <div class="container mb-5 position-relative">
        
        <!-- BAGIAN 1: KEPALA DESA & VISI MISI -->
        <div class="row align-items-center bg-white p-4 p-md-5 rounded-4 shadow-lg mb-5">
            <div class="col-md-4 text-center mb-4 mb-md-0">
                <div class="mx-auto shadow-sm" style="width: 200px; height: 250px; border-radius: 15px; border: 5px solid #198754; overflow: hidden; background: #e9ecef;">
                    @if($kepalaDesa && $kepalaDesa->foto)
                        <img src="{{ Storage::url($kepalaDesa->foto) }}" alt="Kepala Desa" style="width: 100%; height: 100%; object-fit: cover;">
                    @else
                        <div class="w-100 h-100 d-flex align-items-center justify-content-center text-secondary">
                            <i class="fa-solid fa-user-tie fa-5x"></i>
                        </div>
                    @endif
                </div>
                <h4 class="fw-bold mt-4 mb-1 text-dark">{{ $kepalaDesa->nama ?? 'Nama Belum Diisi' }}</h4>
                <span class="badge bg-warning text-dark px-4 py-2 fs-6 rounded-pill">{{ $kepalaDesa->jabatan ?? 'Kepala Desa' }}</span>
            </div>
            
            <div class="col-md-8 ps-md-5">
                <h2 class="fw-bold text-success border-bottom pb-3 mb-4"><i class="fa-solid fa-bullseye me-2 text-warning"></i> Visi & Misi</h2>
                <div class="text-secondary fs-5" style="line-height: 1.8;">
                    {!! $profil->visi_misi ?? '<p class="text-muted fst-italic">Data visi dan misi belum ditambahkan ke dalam sistem.</p>' !!}
                </div>
            </div>
        </div>

        <!-- BAGIAN 2: SEJARAH DESA -->
        <div class="bg-white p-4 p-md-5 rounded-4 shadow-sm mb-5 border-top border-success border-5">
             <h3 class="fw-bold text-success mb-4 text-center"><i class="fa-solid fa-book-open me-2"></i> Sejarah Singkat Desa</h3>
             <div class="text-secondary lh-lg" style="text-align: justify; font-size: 1.1rem;">
                 {!! $profil->sejarah_singkat ?? '<p class="text-center">Belum ada data sejarah.</p>' !!}
             </div>
        </div>
    </div>

    <!-- BAGIAN 3: SUSUNAN PERANGKAT DESA -->
    <section class="py-5" style="background-color: #f4f6f9;">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-success" style="position: relative; display: inline-block;">
                    Aparatur Pemerintah Desa
                    <span style="position: absolute; bottom: -10px; left: 50%; transform: translateX(-50%); width: 60px; height: 4px; background-color: #ffc107; border-radius: 2px;"></span>
                </h2>
                <p class="text-muted mt-4">Susunan perangkat desa yang siap melayani masyarakat sepenuh hati.</p>
            </div>

            <div class="row justify-content-center g-4">
                @forelse ($perangkatLain as $p)
                    <div class="col-lg-3 col-md-4 col-sm-6 text-center">
                        <div class="team-card h-100">
                            <div class="team-photo">
                                @if($p->foto)
                                    <img src="{{ Storage::url($p->foto) }}" alt="{{ $p->nama }}">
                                @else
                                    <div class="placeholder-icon">
                                        <i class="fa-solid fa-user fa-3x"></i>
                                    </div>
                                @endif
                            </div>
                            <h5 class="fw-bold mb-1 text-dark">{{ $p->nama }}</h5>
                            <hr class="w-25 mx-auto my-2 border-secondary">
                            <span class="badge bg-success rounded-pill px-3 py-2 mt-2 shadow-sm fs-6">
                                {{ $p->jabatan }}
                            </span>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-4">
                        <p class="text-muted fs-5">Anggota perangkat desa lainnya belum ditambahkan.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection