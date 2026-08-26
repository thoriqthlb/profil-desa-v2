@extends('layouts.app')

@section('title', 'Profil Desa — Desa Wiramastra')

@push('styles')
<style>
    .profile-hero {
        padding: 170px 0 110px;
        background:
            radial-gradient(circle at 80% 20%, rgba(169,184,163,.55), transparent 30%),
            #e4ffdb;
    }

    .profile-hero h1 {
        font-family: 'DM Sans', sans-serif;
        font-weight: 700;
        letter-spacing: -.02em;
        font-size: clamp(3.2rem, 7vw, 5.5rem);
        line-height: 1.1;
    }

    .profile-intro {
        margin-top: -55px;
        position: relative;
        z-index: 2;
    }

    .vision-box {
        padding: 42px;
    }

    .misi-list {
        list-style: none;
        counter-reset: misi-counter;
        padding-left: 0;
        margin: 0;
    }

    .misi-list li {
        counter-increment: misi-counter;
        position: relative;
        padding-left: 40px;
        margin-bottom: 16px;
        line-height: 1.75;
    }

    .misi-list li::before {
        content: counter(misi-counter);
        position: absolute;
        left: 0;
        top: 0;
        width: 26px;
        height: 26px;
        border-radius: 50%;
        background: var(--sage);
        color: #fff;
        font-weight: 700;
        font-size: .8rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .history-box {
        padding: 42px;
    }

    .history-photo {
        width: 100%;
        height: 100%;
        min-height: 320px;
        border-radius: 18px;
        overflow: hidden;
        background: #e8ece6;
    }

    .history-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .history-placeholder {
        width: 100%;
        height: 100%;
        min-height: 320px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #8d9890;
        background: #e8ece6;
        border-radius: 18px;
    }
</style>
@endpush

@section('content')

<section class="profile-hero text-center">
    <div class="container d-flex flex-column align-items-center">
        <div class="eyebrow mb-3">Tentang Desa</div>
        <h1 class="mb-4">Mengenal {{ $profil->nama_desa ?? 'Wiramastra' }}</h1>
        <p class="text-muted mb-0" style="max-width:650px; line-height:1.8;">
            Sejarah, visi misi, dan orang-orang yang menjalankan pelayanan
            pemerintahan Desa Wiramastra.
        </p>
    </div>
</section>

<section class="profile-intro page-section" style="background:#fff;">
    <div class="container">
        <!-- Visi Misi -->
        <div class="soft-card p-4 p-lg-5">
            <div class="vision-box">
                <div class="eyebrow mb-2 text-center">Arah Desa</div>
                <h2 class="serif mb-4 text-center">Visi & Misi</h2>

                <div class="mx-auto" style="max-width: 800px;">
                    <h5 class="fw-bold text-dark mb-2">Visi</h5>
                    <p class="text-muted mb-4" style="line-height:1.9; font-size:1.05rem;">{{ $profil->visi }}</p>

                    <h5 class="fw-bold text-dark mb-3">Misi</h5>
                    <ol class="misi-list text-muted" style="font-size:1.05rem;">
                        @foreach(preg_split('/\r\n|\r|\n/', trim($profil->misi ?? '')) as $baris)
                            @php $baris = trim(preg_replace('/^\d+\.\s*/', '', $baris)); @endphp
                            @if($baris !== '')
                                <li>{{ $baris }}</li>
                            @endif
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>

        <!-- Sejarah -->
        <div class="soft-card history-box mt-4">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5">
                    @if($profil->logo)
                        <div class="history-photo">
                            <img src="{{ Storage::url($profil->logo) }}" alt="{{ $profil->nama_desa }}">
                        </div>
                    @else
                        <div class="history-placeholder">
                            <i class="fa-solid fa-landmark fa-4x"></i>
                        </div>
                    @endif
                </div>
                <div class="col-lg-7">
                    <div class="eyebrow mb-2">Sejarah Desa</div>
                    <h3 class="mb-4" style="font-family: 'DM Sans', sans-serif; font-weight: 700; letter-spacing: -.02em;">Dari mana kami berasal.</h3>
                    <div class="text-muted" style="line-height:1.95;">
                        {!! $profil->sejarah_singkat ?? '<p>Belum ada data sejarah.</p>' !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pemerintahan Desa -->
<section class="page-section" style="background:#eef1eb;">
    <div class="container text-center">
        <div class="section-heading mx-auto mb-5">
            <div class="eyebrow mb-2">Pemerintahan Desa</div>
            <h2 class="mb-3" style="font-family: 'DM Sans', sans-serif; font-weight: 700; letter-spacing: -.02em;">Struktur Organisasi.</h2>
            <p class="text-muted mx-auto" style="max-width: 600px;">Susunan aparatur Desa Wiramastra yang siap melayani masyarakat.</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="soft-card p-4 bg-white" style="border-radius: 24px; box-shadow: var(--shadow);">
                    <img src="{{ asset('images/Struktur Organisasi DesaWiramastra.png') }}" alt="Struktur Organisasi Pemerintahan Desa Wiramastra" class="img-fluid" style="border-radius: 12px; width: 100%;">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="page-section" style="background:#eef1eb;">
    <div class="container">
        <div class="section-heading text-center mx-auto mb-5">
            <div class="eyebrow mb-2">Dokumen Resmi</div>
            <h2 style="font-family: 'DM Sans', sans-serif; font-weight: 700; letter-spacing: -.02em;">Buku Profil Desa</h2>
            <p class="text-muted mx-auto" style="max-width: 600px;">Jelajahi buku profil lengkap Desa Wiramastra secara digital.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="soft-card p-3 bg-white" style="border-radius: 24px; box-shadow: var(--shadow); overflow: hidden;">
                    <iframe allowfullscreen="allowfullscreen" allow="autoplay; fullscreen; clipboard-write" scrolling="no" class="fp-iframe" src="https://heyzine.com/flip-book/41fbfea263.html" style="border: 0; width: 100%; height: 500px; border-radius: 12px;"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Peta Lokasi Desa -->
<section class="page-section" style="background:#fff;">
    <div class="container">
        <div class="section-heading text-center mx-auto mb-5">
            <h2 style="font-family: 'DM Sans', sans-serif; font-weight: 700; letter-spacing: -.02em;">Peta Lokasi Desa</h2>
        </div>

        <div class="row g-4">
            <div class="col-lg-5">
                <div class="soft-card p-4 p-lg-5 h-100 d-flex flex-column justify-content-center">
                    <h5 class="fw-bold mb-4 text-dark">Batas Desa:</h5>
                    <div class="row mb-4">
                        <div class="col-6">
                            <div class="fw-bold text-dark mb-1">Utara</div>
                            <div class="text-uppercase text-muted" style="font-size: 0.9rem;">MAJALENGKA & KUTAYASA</div>
                        </div>
                        <div class="col-6">
                            <div class="fw-bold text-dark mb-1">Timur</div>
                            <div class="text-uppercase text-muted" style="font-size: 0.9rem;">MAJALENGKA & KEBONDALEM</div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-6">
                            <div class="fw-bold text-dark mb-1">Selatan</div>
                            <div class="text-uppercase text-muted" style="font-size: 0.9rem;">WANADRI</div>
                        </div>
                        <div class="col-6">
                            <div class="fw-bold text-dark mb-1">Barat</div>
                            <div class="text-uppercase text-muted" style="font-size: 0.9rem;">PUCUNG BEDUG</div>
                        </div>
                    </div>
                    <hr class="my-3" style="border-color: var(--line);">
                    <div class="d-flex justify-content-between align-items-center py-2">
                        <h5 class="fw-bold mb-0 text-dark">Luas Desa:</h5>
                        <div class="fs-6 text-dark" style="font-weight: 600;">2.784.932 m&sup2;</div>
                    </div>
                    <hr class="my-3" style="border-color: var(--line);">
                    <div class="d-flex justify-content-between align-items-center py-2">
                        <h5 class="fw-bold mb-0 text-dark">Jumlah Penduduk:</h5>
                        <div class="fs-6 text-dark" style="font-weight: 600;">3.066 Jiwa</div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="soft-card h-100 overflow-hidden p-0" style="min-height: 450px; border-radius: var(--radius);">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31649.0309193856!2d109.62061034444583!3d-7.449646581454179!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7aa0563fa156cd%3A0x5027a76e3569940!2sWiramastra%2C%20Bawang%2C%20Banjarnegara%20Regency%2C%20Central%20Java!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid"
                        width="100%"
                        height="100%"
                        style="border:0; min-height: 450px;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
