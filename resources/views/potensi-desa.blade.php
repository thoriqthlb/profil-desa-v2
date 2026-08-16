@extends('layouts.app')

@section('title', 'Potensi Desa — Desa Wiramastra')

@push('styles')
<style>
    .page-hero {
        padding: 170px 0 85px;
        background: #eef1eb;
    }

    .page-hero h1 {
        /* Diubah menjadi DM Sans agar selaras dengan Beranda dan Profil */
        font-family: 'DM Sans', sans-serif;
        font-weight: 700;
        letter-spacing: -.02em;
        font-size: clamp(3rem, 7vw, 5.5rem);
        line-height: .95;
    }

    .potensi-card {
        overflow: hidden;
        height: 100%;
        background: #fff;
        border: 1px solid var(--line);
        border-radius: 24px;
        box-shadow: var(--shadow);
        transition: .35s ease;
    }

    .potensi-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 25px 55px rgba(31,42,36,.13);
    }

    .potensi-img {
        height: 300px;
        width: 100%;
        object-fit: cover;
        transition: transform .6s ease;
    }

    .potensi-card:hover .potensi-img { transform: scale(1.045); }

    .potensi-placeholder {
        height: 300px;
        background: #e9eee8;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #94a097;
    }

    .potensi-body { padding: 25px; }

    .potensi-index {
        color: var(--sage);
        /* Diubah menjadi DM Sans */
        font-family: 'DM Sans', sans-serif;
        font-weight: 700;
        font-size: 1.4rem;
    }
</style>
@endpush

@section('content')
<!-- Ditambahkan text-center dan flex align-items-center agar posisinya ke tengah -->
<section class="page-hero text-center">
    <div class="container d-flex flex-column align-items-center">
        <div class="eyebrow mb-3">Eksplorasi Desa</div>
        <h1 class="mb-3">Potensi Wiramastra</h1>
        <p class="text-muted mb-0" style="max-width:620px; line-height:1.8;">
            Mengenal kekayaan alam, budaya, dan produk lokal yang tumbuh
            bersama masyarakat Desa Wiramastra.
        </p>
    </div>
</section>

<section class="page-section" style="background:#fff;">
    <div class="container">
        <div class="row g-4">
            @forelse ($potensis as $index => $potensi)
                <div class="col-lg-4 col-md-6">
                    <article class="potensi-card text-start">
                        @if($potensi->gambar)
                            <img src="{{ Storage::url($potensi->gambar) }}" class="potensi-img" alt="{{ $potensi->nama_potensi }}">
                        @else
                            <div class="potensi-placeholder"><i class="fa-solid fa-image fa-3x"></i></div>
                        @endif

                        <div class="potensi-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="potensi-index">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                <i class="fa-solid fa-arrow-up-right-from-square text-muted"></i>
                            </div>
                            <h4 class="mb-2" style="font-family: 'DM Sans', sans-serif; font-weight: 700; letter-spacing: -.02em;">{{ $potensi->nama_potensi }}</h4>
                            <p class="text-muted mb-0" style="line-height:1.75;">
                                {{ $potensi->deskripsi }}
                            </p>
                        </div>
                    </article>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="fa-regular fa-folder-open fa-3x text-muted mb-3"></i>
                    <h5>Belum ada data potensi desa.</h5>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-5">
            {{ $potensis->links('pagination::bootstrap-5') }}
        </div>
    </div>
</section>
@endsection