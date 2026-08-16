<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Desa Wiramastra</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* --- CSS Kustom untuk Tampilan Kreatif --- */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9fbfd;
        }

        /* Navbar Styling */
        .navbar {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        .navbar-brand {
            font-weight: 700;
            letter-spacing: 1px;
        }
        .nav-link {
            font-weight: 500;
            transition: color 0.3s ease;
        }
        .nav-link:hover {
            color: #ffc107 !important;
        }

        /* Card Hover Effect */
        .card-custom {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background-color: white;
        }
        .card-custom:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }

        /* Section Styling */
        .section-title {
            position: relative;
            display: inline-block;
            margin-bottom: 40px;
            font-weight: 700;
            color: #198754;
        }
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 3px;
            background-color: #ffc107;
        }

        /* Footer */
        .footer-custom {
            background-color: #212529;
            color: #ced4da;
        }
        .footer-custom a {
            color: #ffc107;
            text-decoration: none;
        }
        .footer-custom a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- URUTAN 1: NAVBAR (HEADER HIJAU DI ATAS) -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fa-solid fa-tree-city me-2"></i>Desa Wiramastra
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link px-3" href="{{ route('home') }}"><i class="fa-solid fa-house me-1"></i> Beranda</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="{{ route('profil') }}"><i class="fa-solid fa-circle-info me-1"></i> Profil Desa</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="{{ route('potensi-desa') }}"><i class="fa-solid fa-seedling me-1"></i> Potensi Desa</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="{{ route('artikel') }}"><i class="fa-solid fa-newspaper me-1"></i> Berita</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- URUTAN 2: KONTEN UTAMA (DI TENGAH) -->
    <main class="flex-grow-1">
        @yield('content')
    </main>

    <!-- URUTAN 3: FOOTER (GELAP DI BAWAH) -->
    <footer class="footer-custom pt-5 pb-3 mt-auto">
        <!-- Mengambil data profil untuk footer -->
        @php
            $profilFooter = \App\Models\ProfilDesa::first();
        @endphp

        <div class="container">
            <div class="row mb-4">
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0 text-center text-md-start">
                    <h5 class="text-warning fw-bold mb-3"><i class="fa-solid fa-tree-city me-2"></i>Desa Wiramastra</h5>
                    <p class="small text-light" style="line-height: 1.8;">
                        Website resmi pemerintah desa Wiramastra, Kecamatan Bawang, Kabupaten Banjarnegara, Jawa Tengah, Indonesia, dengan kode pos 53471.
                    </p>
                </div>

                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0 text-center text-md-start">
                    <h5 class="text-warning fw-bold mb-3"><i class="fa-solid fa-map-location-dot me-2"></i>Lokasi Kantor</h5>
                    <p class="small text-light mb-0" style="line-height: 1.8;">
                        {{ $profilFooter->alamat_lengkap ?? 'Alamat kantor desa belum diatur di dalam sistem.' }}
                    </p>
                </div>

                <div class="col-lg-4 col-md-12 text-center text-lg-start">
                    <h5 class="text-warning fw-bold mb-3"><i class="fa-solid fa-headset me-2"></i>Hubungi Kami</h5>
                    <div class="small text-light mb-2">
                        <i class="fa-solid fa-phone me-2 text-success"></i> 
                        {{ $profilFooter->kontak ?? 'Belum ada kontak' }}
                    </div>
                    <div class="small text-light">
                        <i class="fa-solid fa-envelope me-2 text-danger"></i>
                        pemdes@wiramastra.desa.id
                    </div>
                </div>
            </div>
            
            <hr class="border-secondary my-4">
            
            <div class="text-center pt-2">
                <p class="mb-1 small text-light">&copy; {{ date('Y') }} Desa Wiramastra. Mengabdi untuk Warga.</p>
                <p class="small mb-0 text-secondary">Dikembangkan oleh <a href="#" class="text-warning text-decoration-none">Tim IT KKN UNNES</a></p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>