<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventPulse</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Plus Jakarta Sans', sans-serif; }
        body {
            background: #f0f7ff;
            color: #1e293b;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }
        
        main, nav, footer { position: relative; z-index: 1; }
        .navbar {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(14, 165, 233, 0.2);
            box-shadow: 0 4px 30px rgba(0,0,0,0.05);
            padding: 14px 0;
        }
        .navbar-brand {
            font-weight: 900;
            font-size: 1.6rem;
            letter-spacing: 1px;
            background: linear-gradient(135deg, #0284c7, #38bdf8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .nav-link {
            color: #64748b !important;
            font-weight: 600;
            padding: 6px 14px !important;
            border-radius: 8px;
            transition: all 0.2s;
        }
        .nav-link:hover, .nav-link.active {
            color: #0ea5e9 !important;
            background: rgba(14, 165, 233, 0.1);
        }
        .card {
            background: #ffffff !important;
            border: 1px solid rgba(14, 165, 233, 0.1) !important;
            border-radius: 16px !important;
            box-shadow: 0 10px 25px rgba(0,0,0,0.02);
            transition: transform 0.3s, box-shadow 0.3s, border-color 0.3s;
            color: #1e293b;
        }
        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 40px rgba(14, 165, 233, 0.15) !important;
            border-color: rgba(14, 165, 233, 0.3) !important;
        }
        .card-footer {
            background: transparent !important;
            border-top: 1px solid rgba(226, 232, 240, 1) !important;
        }
        .btn-primary-gradient {
            background: linear-gradient(135deg, #0284c7, #38bdf8);
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s;
        }
        .btn-primary-gradient:hover {
            background: linear-gradient(135deg, #0369a1, #0ea5e9);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(14, 165, 233, 0.4);
            color: white;
        }
        .table { color: #1e293b !important; }
        .table-dark { background: rgba(14, 165, 233, 0.1) !important; color: #0284c7 !important; }
        .table td, .table th {
            border-color: rgba(226, 232, 240, 1) !important;
            padding: 14px !important;
        }
        .table tbody tr:hover { background: rgba(14, 165, 233, 0.05); }
        .form-control, .form-select {
            background: #ffffff !important;
            border: 1px solid rgba(203, 213, 225, 1) !important;
            color: #1e293b !important;
            border-radius: 10px !important;
        }
        .form-control:focus, .form-select:focus {
            background: #ffffff !important;
            border-color: #0ea5e9 !important;
            box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.2) !important;
            color: #1e293b !important;
        }
        .form-control::placeholder { color: #94a3b8 !important; }
        label { color: #475569 !important; font-weight: 600; margin-bottom: 6px; }
        h1, h2, h3, h4, h5 { color: #0f172a; font-weight: 700; }
        .text-muted { color: #64748b !important; }
        hr { border-color: rgba(203, 213, 225, 1); }
        .glass-box {
            background: rgba(255, 255, 255, 0.85);
            border: 1px solid rgba(14, 165, 233, 0.15);
            border-radius: 16px;
            backdrop-filter: blur(10px);
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.03);
        }
        /* GAYA FOOTER UTAMA */
        footer {
            background: #ffffff !important;
            border-top: 1px solid rgba(14, 165, 233, 0.15) !important;
            color: #64748b !important;
            padding-top: 4rem !important;
            padding-bottom: 2rem !important;
            box-shadow: 0 -15px 40px rgba(14, 165, 233, 0.05) !important;
            position: relative;
            z-index: 10;
        }

        /* Salinan Gaya Logo Utama */
        .footer-brand {
            font-weight: 900;
            font-size: 1.6rem;
            letter-spacing: 1px;
            background: linear-gradient(135deg, #0284c7, #38bdf8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
        }
        
        .footer-brand:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }

        /* Judul Kolom Footer */
        .footer-title {
            color: #0f172a !important;
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 8px;
        }
        
        .footer-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 35px;
            height: 3px;
            background: linear-gradient(135deg, #0284c7, #38bdf8);
            border-radius: 2px;
        }

        /* Tombol Navigasi Cepat */
        .footer-nav-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 14px;
            border-radius: 20px;
            background: rgba(14, 165, 233, 0.04);
            border: 1px solid rgba(14, 165, 233, 0.08);
            color: #64748b !important;
            font-size: 0.85rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            width: auto;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.01);
        }

        .footer-nav-btn:hover {
            background: linear-gradient(135deg, #0284c7, #38bdf8);
            color: #ffffff !important;
            border-color: transparent;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(14, 165, 233, 0.2);
        }

        .footer-nav-btn i {
            color: #0ea5e9;
            font-size: 1.05rem;
            transition: all 0.3s ease;
        }

        .footer-nav-btn:hover i {
            color: #ffffff !important;
            transform: scale(1.15);
        }

        /* Kontak Item */
        .footer-contact-item {
            color: #64748b !important;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 0.75rem;
            padding: 10px 14px;
            border-radius: 12px;
            background: rgba(14, 165, 233, 0.03);
            border: 1px solid rgba(14, 165, 233, 0.08);
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .footer-contact-item.address {
            align-items: flex-start;
        }

        .footer-contact-item i {
            color: #0ea5e9;
            font-size: 1.15rem;
            transition: all 0.3s ease;
        }
        
        .footer-contact-item:hover {
            color: #0284c7 !important;
            background: rgba(14, 165, 233, 0.08);
            border-color: rgba(14, 165, 233, 0.15);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(14, 165, 233, 0.08);
        }
        
        .footer-contact-item:hover i {
            transform: scale(1.15);
            color: #0284c7;
        }

        /* Barisan Ikon Sosial Media */
        .social-icons-wrapper {
            display: flex;
            gap: 12px;
            margin-top: 1.5rem;
        }
        
        /* Tombol Sosial Media */
        .social-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: #ffffff;
            color: #64748b;
            border: 1px solid rgba(14, 165, 233, 0.1);
            font-size: 1.25rem;
            text-decoration: none;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }
        
        /* Efek Hover Sosial Media */
        .social-btn:hover {
            color: #ffffff !important;
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(14, 165, 233, 0.25), 0 4px 6px -2px rgba(14, 165, 233, 0.15);
            border-color: transparent;
        }
        
        .social-btn.whatsapp:hover {
            background: linear-gradient(135deg, #25D366, #128C7E);
        }
        
        .social-btn.instagram:hover {
            background: linear-gradient(135deg, #833AB4, #FD1D1D, #F56040);
        }
        
        .social-btn.github:hover {
            background: linear-gradient(135deg, #24292e, #0f1419);
        }
        
        .social-btn.email:hover {
            background: linear-gradient(135deg, #EA4335, #C5221F);
        }
        
        .social-btn.location:hover {
            background: linear-gradient(135deg, #4285F4, #34A853);
        }

        /* Garis Pembatas */
        .footer-divider {
            height: 1px;
            background: linear-gradient(to right, rgba(14, 165, 233, 0.05), rgba(14, 165, 233, 0.2), rgba(14, 165, 233, 0.05));
            margin: 2rem 0 1.5rem 0;
            border: none;
            opacity: 1;
        }

        /* Bagian Bawah Footer */
        .footer-bottom {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            font-size: 0.85rem;
            color: #64748b;
            gap: 16px;
            flex-wrap: wrap;
        }
        
        .footer-credits {
            text-align: right;
        }

        /* Navigasi di baris bawah */
        .footer-nav-bottom {
            display: flex;
            align-items: center;
            gap: 6px;
            flex-wrap: wrap;
        }

        .footer-nav-bottom a {
            color: #64748b;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 600;
            transition: color 0.2s;
        }

        .footer-nav-bottom a:hover {
            color: #0ea5e9;
        }

        .footer-nav-bottom .sep {
            color: #cbd5e1;
            font-size: 0.75rem;
            user-select: none;
        }
        
        @media (max-width: 768px) {
            .footer-bottom {
                flex-direction: column;
                gap: 10px;
                text-align: center;
            }
            .footer-credits {
                text-align: center;
            }
            .footer-nav-bottom {
                justify-content: center;
            }
        }
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f0f7ff; }
        ::-webkit-scrollbar-thumb { background: #0ea5e9; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #0284c7; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="bi bi-lightning-charge-fill" style="color: #0ea5e9;"></i> EventPulse
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <div class="navbar-nav ms-auto align-items-center gap-1">
                    @if(session('role') === 'admin')
                        <a class="nav-link" href="/admin/home"><i class="bi bi-house"></i> Home</a>
                    @elseif(session('role') === 'penyelenggara')
                        <a class="nav-link" href="/penyelenggara/home"><i class="bi bi-house"></i> Home</a>
                    @else
                        <a class="nav-link" href="/"><i class="bi bi-house"></i> Home</a>
                    @endif
                    @if(session('id'))
                        @if(session('role') === 'admin')
                            <a class="nav-link" href="/admin/dashboard"><i class="bi bi-shield-check"></i> Admin</a>
                            <a class="nav-link" href="/events"><i class="bi bi-calendar-event"></i> Kelola Event</a>
                        @elseif(session('role') === 'penyelenggara')
                            <a class="nav-link" href="/penyelenggara/dashboard"><i class="bi bi-grid-fill"></i> Panel Penyelenggara</a>
                            <a class="nav-link" href="/events"><i class="bi bi-calendar-event"></i> Kelola Event</a>
                        @else
                            <a class="nav-link" href="/dashboard"><i class="bi bi-person-circle"></i> Dashboard</a>
                        @endif
                        <a class="nav-link text-danger" href="/logout"><i class="bi bi-box-arrow-right"></i> Logout</a>
                        <span class="badge ms-2" style="background: rgba(14, 165, 233, 0.15); border: 1px solid rgba(14, 165, 233, 0.3); color: #0284c7; padding: 8px 14px; border-radius: 20px;">
                            <i class="bi bi-person-fill"></i> {{ session('nama') }}
                        </span>
                    @else
                        <a class="nav-link" href="/login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                        <a href="/register" class="btn btn-primary-gradient btn-sm ms-2 px-3">
                            <i class="bi bi-person-plus"></i> Daftar
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <main class="py-4 container-fluid" style="max-width: 1400px;">
        @yield('content')
    </main>

    @yield('modals')

    <!-- BAGIAN FOOTER UTAMA -->
    <footer class="mt-5">
        <div class="container">
            <div class="row g-4">
                <!-- Kolom Informasi Brand -->
                <div class="col-lg-6 col-md-12">
                    <a class="footer-brand mb-3" href="/">
                        <i class="bi bi-lightning-charge-fill" style="color: #0ea5e9;"></i> EventPulse
                    </a>
                    <p class="mt-2 text-muted" style="font-size: 0.95rem; line-height: 1.6; font-style: italic;">
                        &ldquo;Detak Event Kampusmu dalam Satu Sentuhan. Menghubungkan Inspirasi, Menghidupkan Kolaborasi.&rdquo;
                    </p>
                    
                    <!-- Media Sosial Dan Kontak -->
                    <div class="social-icons-wrapper">
                        <!-- Link WhatsApp -->
                        <a href="https://wa.me/6281915961305" target="_blank" class="social-btn whatsapp" title="Hubungi kami melalui WhatsApp">
                            <i class="bi bi-whatsapp"></i>
                        </a>
                        <!-- Link Instagram -->
                        <a href="https://instagram.com/avaro.zu" target="_blank" class="social-btn instagram" title="Kunjungi Instagram kami">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <!-- Link GitHub -->
                        <a href="https://github.com/avarozufaru" target="_blank" class="social-btn github" title="Kunjungi GitHub kami">
                            <i class="bi bi-github"></i>
                        </a>
                        <!-- Link Email -->
                        <a href="mailto:f1d02410059@student.unram.ac.id" class="social-btn email" title="Kirim email kepada kami">
                            <i class="bi bi-envelope-fill"></i>
                        </a>
                        <!-- Link Google Maps -->
                        <a href="https://www.google.com/maps/search/?api=1&query=Universitas+Mataram+Jl.+Majapahit+No.62+Gomong+Kec.+Selaparang+Kota+Mataram+Nusa+Tenggara+Bar.+83115" target="_blank" class="social-btn location" title="Lihat lokasi kami di Google Maps">
                            <i class="bi bi-geo-alt-fill"></i>
                        </a>
                    </div>
                </div>

                <!-- Kolom Kontak Kami -->
                <div class="col-lg-6 col-md-12">
                    <h5 class="footer-title">Kontak Kami</h5>
                    
                    <!-- Informasi Alamat -->
                    <a href="https://www.google.com/maps/search/?api=1&query=Universitas+Mataram+Jl.+Majapahit+No.62+Gomong+Kec.+Selaparang+Kota+Mataram+Nusa+Tenggara+Bar.+83115" target="_blank" class="footer-contact-item address">
                        <i class="bi bi-geo-alt-fill"></i>
                        <span>
                            <strong>Universitas Mataram</strong><br>
                            <small class="text-muted" style="font-size: 0.85rem;">Jl. Majapahit No.62, Gomong, Selaparang, Mataram</small>
                        </span>
                    </a>
                    
                    <!-- Informasi Email -->
                    <a href="mailto:f1d02410059@student.unram.ac.id" class="footer-contact-item">
                        <i class="bi bi-envelope-fill"></i>
                        <span>E-mail</span>
                    </a>

                    <!-- Informasi WhatsApp -->
                    <a href="https://wa.me/6281915961305" target="_blank" class="footer-contact-item">
                        <i class="bi bi-whatsapp"></i>
                        <span>WhatsApp</span>
                    </a>
                </div>
            </div>

            <!-- Garis Pembatas -->
            <hr class="footer-divider">

            <!-- Hak Cipta Dan Kredit Kelompok -->
            <div class="footer-bottom">
                <div class="footer-copyright">
                    Copyright &copy; 2026 <strong>EVENTPULSE</strong>. All rights reserved.
                </div>

                <!-- Navigasi Cepat di Baris Bawah -->
                <nav class="footer-nav-bottom">
                    @if(session('role') === 'admin')
                        <a href="/admin/home">Beranda</a>
                        <span class="sep">·</span>
                        <a href="/admin/dashboard">Dashboard</a>
                        <span class="sep">·</span>
                        <a href="/events">Kelola Event</a>
                    @elseif(session('role') === 'penyelenggara')
                        <a href="/penyelenggara/home">Beranda</a>
                        <span class="sep">·</span>
                        <a href="/penyelenggara/dashboard">Panel</a>
                        <span class="sep">·</span>
                        <a href="/events">Kelola Event</a>
                    @elseif(session('id'))
                        <a href="/">Beranda</a>
                        <span class="sep">·</span>
                        <a href="/dashboard">Dashboard</a>
                    @else
                        <a href="/">Beranda</a>
                        <span class="sep">·</span>
                        <a href="/login">Masuk</a>
                        <span class="sep">·</span>
                        <a href="/register">Daftar</a>
                    @endif
                </nav>

                <div class="footer-credits">
                    Tugas Besar Pemrograman Web 2026 oleh <strong>Kelompok 4</strong><br>
                    Teknik Informatika, Universitas Mataram
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: "{{ session('success') }}",
            confirmButtonColor: '#0ea5e9',
            timer: 3000,
            timerProgressBar: true,
            background: '#ffffff',
            color: '#1e293b',
        });
    </script>
    @endif

    @if(session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops!',
            text: "{{ session('error') }}",
            confirmButtonColor: '#ef4444',
            background: '#ffffff',
            color: '#1e293b',
        });
    </script>
    @endif

</body>
</html>