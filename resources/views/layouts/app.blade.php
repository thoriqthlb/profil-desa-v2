<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#ffffff">
    <title>@yield('title', 'Desa Wiramastra')</title>
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --ink: #1f2a24;
            --muted: #718078;
            --cream: #f7f5ef;
            --paper: #ffffff;
            --sage: #a9b8a3;
            --sage-dark: #526b58;
            --green: #355c45;
            --accent: #d9a441;
            --line: #e7e9e3;
            --shadow: 0 18px 45px rgba(31, 42, 36, .08);
            --radius: 24px;
        }

        * { box-sizing: border-box; }

        html { scroll-behavior: smooth; }

        body {
            margin: 0;
            color: var(--ink);
            background: var(--cream);
            font-family: 'DM Sans', sans-serif;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6 {
            font-weight: 700;
            letter-spacing: -.02em;
        }

        a { color: inherit; }

        .serif { font-family: 'Playfair Display', serif; }

        /* NAVBAR */
        .site-nav {
            position: fixed;
            top: 18px;
            left: 0;
            right: 0;
            z-index: 1030;
        }

        .nav-shell {
            background: rgba(255,255,255,.82);
            border: 1px solid rgba(255,255,255,.9);
            box-shadow: 0 10px 35px rgba(31,42,36,.08);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border-radius: 999px;
            padding: 8px 10px 8px 18px;
        }

        .navbar-brand {
            color: var(--ink) !important;
            font-weight: 700;
            letter-spacing: -.02em;
        }

        .brand-mark {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: white;
            background: var(--green);
            margin-right: 9px;
        }

        .nav-link {
            color: #536057 !important;
            font-size: .9rem;
            font-weight: 600;
            border-radius: 999px;
            padding: 9px 15px !important;
            transition: .25s ease;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--green) !important;
            background: #eef2ec;
        }

        .navbar-toggler {
            border: 0;
            box-shadow: none !important;
        }

        /* COMMON */
        main { min-height: 70vh; }

        .page-section { padding: 90px 0; }

        .eyebrow {
            color: var(--sage-dark);
            font-size: .78rem;
            font-weight: 700;
            letter-spacing: .16em;
            text-transform: uppercase;
        }

        .section-heading {
            max-width: 680px;
        }

        .section-heading h2 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2rem, 4vw, 3.2rem);
            line-height: 1.05;
            margin: 8px 0 14px;
        }

        .section-heading p {
            color: var(--muted);
            margin: 0;
            line-height: 1.8;
        }

        .btn-village {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            background: var(--green);
            color: #fff !important;
            border: 1px solid var(--green);
            border-radius: 999px;
            padding: 12px 20px;
            font-weight: 600;
            transition: .25s ease;
        }

        .btn-village:hover {
            transform: translateY(-2px);
            background: #284936;
            border-color: #284936;
        }

        .btn-soft {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: 1px solid var(--line);
            background: #fff;
            color: var(--ink) !important;
            border-radius: 999px;
            padding: 11px 18px;
            font-weight: 600;
        }

        .soft-card {
            background: var(--paper);
            border: 1px solid var(--line);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
        }

        .reveal {
            opacity: 0;
            transform: translateY(24px);
            animation: reveal .8s ease forwards;
        }

        .delay-1 { animation-delay: .1s; }
        .delay-2 { animation-delay: .2s; }
        .delay-3 { animation-delay: .3s; }

        @keyframes reveal {
            to { opacity: 1; transform: translateY(0); }
        }

        .hover-lift {
            transition: transform .35s ease, box-shadow .35s ease;
        }

        .hover-lift:hover {
            transform: translateY(-7px);
            box-shadow: 0 22px 50px rgba(31,42,36,.12);
        }

        /* FOOTER */
        .site-footer {
            background: var(--ink);
            color: #dce2dc;
            padding: 65px 0 25px;
        }

        .site-footer h5 {
            color: #fff;
            margin-bottom: 16px;
        }

        .site-footer p,
        .site-footer .footer-info {
            color: #aeb9b0;
            line-height: 1.8;
        }

        .footer-brand {
            color: #fff;
            font-size: 1.2rem;
            font-weight: 700;
        }

        .footer-icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: rgba(255,255,255,.08);
            color: #fff;
            margin-right: 6px;
        }

        @media (max-width: 991.98px) {
            .site-nav { top: 10px; }
            .nav-shell { border-radius: 22px; padding: 8px 12px; }
            .navbar-collapse { padding: 12px 4px 6px; }
            .nav-link { margin: 3px 0; }
        }

        @media (max-width: 575.98px) {
            .page-section { padding: 65px 0; }
            .section-heading h2 { font-size: 2rem; }
        }
    </style>

    @stack('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg site-nav">
        <div class="container">
            <div class="nav-shell w-100">
                <div class="d-flex align-items-center">
                    <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/') }}">
                        <!-- Menggunakan gambar logo.png -->
                        <img src="{{ asset('images/logo.png') }}" alt="Logo Kabupaten Banjarnegara" style="width: 45px; height: auto;">
                        <span class="fw-bold text-dark">Desa Wiramastra</span>
                    </a>

                    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Buka navigasi">
                        <i class="fa-solid fa-bars"></i>
                    </button>

                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                        <ul class="navbar-nav align-items-lg-center gap-lg-1">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('profil') ? 'active' : '' }}" href="{{ route('profil') }}">Profil Desa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('potensi-desa') ? 'active' : '' }}" href="{{ route('potensi-desa') }}">Potensi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('artikel') ? 'active' : '' }}" href="{{ route('artikel') }}">Kabar Desa</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    @php
        $profilFooter = \App\Models\ProfilDesa::first();
    @endphp

    <footer class="site-footer">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-5">
                    <!-- LOGO DI FOOTER -->
                    <div class="footer-brand mb-3 d-flex align-items-center gap-3">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo Kabupaten Banjarnegara" style="width: 50px; height: auto;">
                        <div class="d-flex flex-column" style="line-height: 1.2;">
                            <span>Desa Wiramastra</span>
                            <small style="font-size: 0.8rem; font-weight: 500; color: #aeb9b0;">Kabupaten Banjarnegara</small>
                        </div>
                    </div>
                    
                    <p class="mb-0">
                        Website resmi Desa Wiramastra, Kecamatan Bawang, Kabupaten Banjarnegara,
                        Jawa Tengah. Ruang informasi, pelayanan, dan cerita desa.
                    </p>
                </div>

                <div class="col-lg-7 col-md-6">
                    <h5>Lokasi</h5>
                    <div class="footer-info">
                        <i class="fa-solid fa-location-dot me-2"></i>
                        {{ $profilFooter->alamat_lengkap ?? 'Alamat kantor desa belum diatur di dalam sistem.' }}
                    </div>
                </div>

            </div>

            <hr class="border-secondary opacity-25 my-5">

            <div class="d-flex flex-column flex-md-row justify-content-between gap-2 small">
                <span>&copy; {{ date('Y') }} Desa Wiramastra.</span>
                <span>Dikembangkan oleh Tim IT KKN UNNES.</span>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>