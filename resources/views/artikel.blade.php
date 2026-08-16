@extends('layouts.app')

@section('title', 'Kabar Desa — Desa Wiramastra')

@push('styles')
<style>
    .page-hero {
        padding: 170px 0 75px;
        background: #eef1eb;
    }

    .page-hero h1 {
        /* Diubah menjadi DM Sans */
        font-family: 'DM Sans', sans-serif;
        font-weight: 700;
        letter-spacing: -.02em;
        font-size: clamp(3rem, 7vw, 5.5rem);
        line-height: .95;
    }

    .article-card {
        overflow: hidden;
        background: #fff;
        border: 1px solid var(--line);
        border-radius: 24px;
        box-shadow: 0 12px 35px rgba(31,42,36,.06);
        transition: .35s ease;
    }

    .article-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 22px 50px rgba(31,42,36,.11);
    }

    .article-img {
        width: 100%;
        height: 100%;
        min-height: 270px;
        object-fit: cover;
    }

    .article-placeholder {
        width: 100%;
        height: 100%;
        min-height: 270px;
        background: #e9eee8;
        color: #95a098;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .article-body { padding: 32px; }

    .article-date {
        color: var(--sage-dark);
        font-size: .76rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .1em;
    }

    .article-title {
        /* Diubah menjadi DM Sans */
        font-family: 'DM Sans', sans-serif;
        font-weight: 700;
        letter-spacing: -.02em;
        font-size: clamp(1.55rem, 3vw, 2.15rem);
        line-height: 1.15;
    }
</style>
@endpush

@section('content')
<!-- Ditambahkan text-center dan d-flex align-items-center agar posisinya ke tengah -->
<section class="page-hero text-center">
    <div class="container d-flex flex-column align-items-center">
        <div class="eyebrow mb-3">Cerita & Informasi</div>
        <h1 class="mb-3">Berita Desa</h1>
        <p class="text-muted mb-0" style="max-width:620px; line-height:1.8;">
            Ikuti informasi, kegiatan, dan cerita yang hadir dari Desa Wiramastra.
        </p>
    </div>
</section>

<section class="page-section" style="background:#fff;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                @forelse ($artikels as $artikel)
                    <article class="article-card mb-4 text-start">
                        <div class="row g-0">
                            <div class="col-md-5">
                                @if($artikel->gambar)
                                    <img src="{{ Storage::url($artikel->gambar) }}" class="article-img" alt="{{ $artikel->judul }}">
                                @else
                                    <div class="article-placeholder">
                                        <i class="fa-regular fa-newspaper fa-3x"></i>
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-7">
                                <div class="article-body h-100 d-flex flex-column">
                                    <div class="article-date mb-3">
                                        {{ $artikel->created_at->translatedFormat('d F Y') }}
                                    </div>

                                    <h2 class="article-title mb-3">{{ $artikel->judul }}</h2>

                                    <p class="text-muted mb-4" style="line-height:1.8;">
                                        {!! Str::limit(strip_tags($artikel->konten), 220) !!}
                                    </p>

                                    <div class="mt-auto">
                                        <button class="btn btn-village btn-sm">
                                            Baca selengkapnya
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="text-center py-5">
                        <i class="fa-regular fa-newspaper fa-3x text-muted mb-3"></i>
                        <h5>Belum ada artikel yang dipublikasikan.</h5>
                    </div>
                @endforelse

                <div class="d-flex justify-content-center mt-5">
                    {{ $artikels->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection