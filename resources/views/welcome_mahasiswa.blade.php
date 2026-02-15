<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Mahasiswa - {{ $nama ?? 'STMIK IKMI' }}</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #9c27b0;
            --secondary-color: #e91e63;
            --accent-color: #f06292;
            --light-pink: #fce4ec;
            --soft-pink: #f8bbd9;
            --pink-gradient: linear-gradient(135deg, #e91e63 0%, #9c27b0 100%);
            --light-bg: #fff5f7;
            --card-bg: #ffffff;
            --text-dark: #4a4a4a;
            --text-light: #666;
            --success-color: #66bb6a;
            --warning-color: #ffa726;
            --card-shadow: 0 8px 30px rgba(233, 30, 99, 0.08);
            --hover-shadow: 0 15px 40px rgba(233, 30, 99, 0.12);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: var(--light-bg);
            color: var(--text-dark);
            line-height: 1.6;
            overflow-x: hidden;
        }
        
        /* Navigation */
        .navbar-custom {
            background: rgba(255, 255, 255, 0.98) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(233, 30, 99, 0.1);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            border-bottom: 1px solid var(--light-pink);
        }
        
        .navbar-brand {
            font-weight: 700;
            color: var(--secondary-color) !important;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .nav-link {
            color: #666 !important;
            font-weight: 500;
            padding: 0.5rem 1rem !important;
            border-radius: 8px;
            transition: all 0.3s ease;
            margin: 0 2px;
        }
        
        .nav-link:hover, .nav-link.active {
            background: var(--secondary-color);
            color: white !important;
            transform: translateY(-2px);
        }
        
        /* Header Section */
        .header-section {
            background: var(--pink-gradient);
            color: white;
            padding: 100px 0 60px;
            margin-bottom: 40px;
            position: relative;
            overflow: hidden;
        }
        
        .header-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E");
            opacity: 0.2;
        }
        
        .profile-avatar {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, #f06292, #e91e63);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
            color: white;
            margin: 0 auto;
            border: 5px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 10px 30px rgba(233, 30, 99, 0.3);
        }
        
        /* Badges */
        .badge-custom {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            color: white;
            padding: 8px 20px;
            border-radius: 50px;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
        }
        
        .badge-custom:hover {
            background: rgba(255, 255, 255, 0.35);
            transform: translateY(-2px);
        }
        
        /* Cards */
        .card-custom {
            background: var(--card-bg);
            border-radius: 20px;
            border: none;
            box-shadow: var(--card-shadow);
            transition: all 0.3s ease;
            overflow: hidden;
            height: 100%;
        }
        
        .card-custom:hover {
            transform: translateY(-10px);
            box-shadow: var(--hover-shadow);
        }
        
        .card-header-custom {
            background: var(--pink-gradient);
            color: white;
            padding: 20px;
            border-bottom: none;
        }
        
        /* Progress Bar */
        .progress-custom {
            height: 12px;
            border-radius: 10px;
            background: #f0f0f0;
            overflow: hidden;
        }
        
        .progress-custom .progress-bar {
            background: linear-gradient(90deg, var(--accent-color), var(--secondary-color));
            border-radius: 10px;
        }
        
        /* Stats Cards */
        .stats-card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: var(--card-shadow);
            text-align: center;
            transition: all 0.3s ease;
            border-top: 4px solid var(--secondary-color);
        }
        
        .stats-card:hover {
            transform: translateY(-5px);
        }
        
        .stats-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--secondary-color);
            line-height: 1;
        }
        
        .stats-label {
            color: #666;
            font-size: 0.9rem;
            margin-top: 10px;
        }
        
        /* Course List */
        .course-list {
            list-style: none;
            padding: 0;
        }
        
        .course-item {
            padding: 15px;
            margin-bottom: 10px;
            background: #fff9fb;
            border-radius: 10px;
            border-left: 4px solid var(--secondary-color);
            display: flex;
            align-items: center;
            gap: 15px;
            transition: all 0.3s ease;
        }
        
        .course-item:hover {
            background: #ffeef3;
            transform: translateX(5px);
        }
        
        .course-icon {
            width: 40px;
            height: 40px;
            background: var(--secondary-color);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }
        
        /* Quick Actions */
        .quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }
        
        .action-btn {
            background: white;
            border: 2px solid var(--light-pink);
            border-radius: 12px;
            padding: 20px 15px;
            text-align: center;
            color: var(--text-dark);
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .action-btn:hover {
            border-color: var(--secondary-color);
            background: var(--light-pink);
            color: var(--secondary-color);
            transform: translateY(-3px);
        }
        
        .action-btn i {
            font-size: 24px;
            margin-bottom: 10px;
            display: block;
        }
        
        /* Buttons */
        .btn-pink {
            background: var(--pink-gradient);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 25px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-pink:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(233, 30, 99, 0.2);
            color: white;
        }
        
        /* Footer */
        .footer {
            background: linear-gradient(135deg, #9c27b0 0%, #7b1fa2 100%);
            color: white;
            padding: 60px 0 30px;
            margin-top: 80px;
        }
        
        .footer-links {
            list-style: none;
            padding: 0;
        }
        
        .footer-links li {
            margin-bottom: 10px;
        }
        
        .footer-links a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer-links a:hover {
            color: white;
            transform: translateX(5px);
        }
        
        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }
        
        /* Pink Elements */
        .pink-bg {
            background: var(--light-pink);
        }
        
        .text-pink {
            color: var(--secondary-color);
        }
        
        .border-pink {
            border-color: var(--soft-pink);
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .header-section {
                padding: 80px 0 40px;
            }
            
            .quick-actions {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .stats-number {
                font-size: 2rem;
            }
        }
        
        @media (max-width: 576px) {
            .quick-actions {
                grid-template-columns: 1fr;
            }
            
            .profile-avatar {
                width: 100px;
                height: 100px;
                font-size: 40px;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-graduation-cap"></i>
                <span>Portal<span class="text-pink">Mahasiswa</span></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <i class="fas fa-bars text-pink"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <i class="fas fa-home me-2"></i>Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-calendar-alt me-2"></i>Jadwal
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-book me-2"></i>Materi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-chart-line me-2"></i>Nilai
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-user me-2"></i>Profil
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header Section -->
    <div class="header-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 fade-in-up">
                    <h1 class="display-5 fw-bold mb-3">
                        {{ $welcome_message ?? 'Selamat Datang di Portal Akademik' }}
                    </h1>
                    <p class="lead mb-4 opacity-90">
                        Sistem informasi terintegrasi untuk mengelola aktivitas akademik mahasiswa STMIK IKMI.
                        Akses mudah, informasi akurat, pengalaman belajar yang lebih baik.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <span class="badge-custom">
                            <i class="fas fa-user-graduate"></i>
                            {{ $nama ?? 'Mahasiswa' }}
                        </span>
                        <span class="badge-custom">
                            <i class="fas fa-layer-group"></i>
                            Semester {{ $semester ?? '1' }}
                        </span>
                        <span class="badge-custom">
                            <i class="fas fa-star"></i>
                            IPK: {{ $ipk ?? '0.00' }}
                        </span>
                    </div>
                </div>
                <div class="col-lg-4 text-center mt-4 mt-lg-0 fade-in-up" style="animation-delay: 0.2s">
                    <div class="profile-avatar">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <h4 class="mt-3 mb-1">{{ $nama ?? 'Mahasiswa' }}</h4>
                    <p class="mb-2 opacity-90">{{ $prodi ?? 'Program Studi' }}</p>
                    <small class="text-light">
                        <i class="fas fa-id-card me-1"></i>NIM: {{ $nim ?? '00000000' }}
                    </small>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <!-- Stats Overview -->
        <div class="row g-4 mb-5">
            <div class="col-md-3 col-sm-6">
                <div class="stats-card fade-in-up pink-bg">
                    <div class="stats-number">{{ $total_sks ?? '0' }}</div>
                    <div class="stats-label">Total SKS</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stats-card fade-in-up" style="animation-delay: 0.1s">
                    <div class="stats-number">{{ $ipk ?? '0.00' }}</div>
                    <div class="stats-label">IPK Semester</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stats-card fade-in-up pink-bg" style="animation-delay: 0.2s">
                    <div class="stats-number">{{ count($matkul ?? []) }}</div>
                    <div class="stats-label">Mata Kuliah</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stats-card fade-in-up" style="animation-delay: 0.3s">
                    <div class="stats-number">{{ $semester ?? '1' }}</div>
                    <div class="stats-label">Semester Aktif</div>
                </div>
            </div>
        </div>

        <!-- Main Dashboard -->
        <div class="row g-4">
            <!-- Left Column -->
            <div class="col-lg-8">
                <!-- Course Information -->
                <div class="card card-custom fade-in-up">
                    <div class="card-header-custom">
                        <h3 class="mb-0"><i class="fas fa-book-open me-2"></i>Mata Kuliah Semester Ini</h3>
                    </div>
                    <div class="card-body">
                        <ul class="course-list">
                            @if(isset($matkul) && count($matkul) > 0)
                                @foreach($matkul as $mk)
                                    <li class="course-item">
                                        <div class="course-icon">
                                            <i class="fas fa-book"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">{{ $mk }}</h6>
                                            <small class="text-muted">3 SKS • Senin 08:00-10:30</small>
                                        </div>
                                        <span class="badge bg-success">Aktif</span>
                                    </li>
                                @endforeach
                            @else
                                <li class="course-item">
                                    <div class="course-icon">
                                        <i class="fas fa-info-circle"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0 text-muted">Belum ada data mata kuliah</h6>
                                    </div>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="mt-4 fade-in-up" style="animation-delay: 0.2s">
                    <h4 class="mb-3 text-pink"><i class="fas fa-bolt me-2"></i>Akses Cepat</h4>
                    <div class="quick-actions">
                        <a href="#" class="action-btn">
                            <i class="fas fa-calendar-alt" style="color: #e91e63;"></i>
                            <span>Jadwal Kuliah</span>
                        </a>
                        <a href="#" class="action-btn">
                            <i class="fas fa-tasks" style="color: #66bb6a;"></i>
                            <span>Tugas & Quiz</span>
                        </a>
                        <a href="#" class="action-btn">
                            <i class="fas fa-file-alt" style="color: #ffa726;"></i>
                            <span>Materi Kuliah</span>
                        </a>
                        <a href="#" class="action-btn">
                            <i class="fas fa-chart-bar" style="color: #9c27b0;"></i>
                            <span>Nilai & IPK</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-lg-4">
                <!-- Academic Progress -->
                <div class="card card-custom fade-in-up" style="animation-delay: 0.1s">
                    <div class="card-header-custom">
                        <h3 class="mb-0"><i class="fas fa-chart-line me-2"></i>Progress Akademik</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="fw-medium">IPK Semester</span>
                                <span class="fw-bold text-pink">{{ $ipk ?? '0.00' }}</span>
                            </div>
                            <div class="progress-custom">
                                <div class="progress-bar" style="width: {{ ($ipk ?? 0) / 4 * 100 }}%"></div>
                            </div>
                            <small class="text-muted">Skala maksimum 4.00</small>
                        </div>
                        
                        <div class="mb-4">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="fw-medium">Kehadiran</span>
                                <span class="fw-bold text-pink">85%</span>
                            </div>
                            <div class="progress-custom">
                                <div class="progress-bar" style="width: 85%"></div>
                            </div>
                        </div>
                        
                        <div class="alert alert-info" style="background: #fce4ec; border-color: #f8bbd9; color: #9c27b0;">
                            <i class="fas fa-info-circle me-2"></i>
                            <strong>Status:</strong> Mahasiswa aktif semester {{ $semester ?? '1' }}
                        </div>
                    </div>
                </div>

                <!-- Upcoming Schedule -->
                <div class="card card-custom mt-4 fade-in-up" style="animation-delay: 0.3s">
                    <div class="card-header-custom">
                        <h3 class="mb-0"><i class="fas fa-clock me-2"></i>Jadwal Hari Ini</h3>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-calendar-day me-3 fs-4" style="color: #e91e63;"></i>
                            <div>
                                <h6 class="mb-0">Pemrograman Web</h6>
                                <small class="text-muted">08:00 - 10:30 • Ruang 301</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-calendar-day me-3 fs-4" style="color: #66bb6a;"></i>
                            <div>
                                <h6 class="mb-0">Basis Data</h6>
                                <small class="text-muted">13:00 - 15:30 • Lab. Komputer</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-calendar-day me-3 fs-4" style="color: #ffa726;"></i>
                            <div>
                                <h6 class="mb-0">Matematika Diskrit</h6>
                                <small class="text-muted">15:45 - 18:15 • Ruang 402</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <div class="row mt-5">
            <div class="col-12">
                <h3 class="mb-4 text-center text-pink fade-in-up">
                    <i class="fas fa-star me-2"></i>Fitur Unggulan Portal
                </h3>
            </div>
            
            @if(isset($fitur) && is_array($fitur) && count($fitur) > 0)
                @foreach($fitur as $index => $f)
                <div class="col-md-4 mb-4 fade-in-up" style="animation-delay: {{ $index * 0.1 }}s">
                    <div class="card card-custom h-100">
                        <div class="card-body text-center p-4">
                            <div class="mb-3">
                                <i class="{{ $f['icon'] ?? 'fas fa-star' }} fs-1" style="color: #e91e63;"></i>
                            </div>
                            <h5 class="mb-3">{{ $f['title'] ?? 'Fitur Mahasiswa' }}</h5>
                            <p class="text-muted">{{ $f['description'] ?? 'Deskripsi fitur akan ditampilkan di sini.' }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <!-- Default Features -->
                <div class="col-md-4 mb-4 fade-in-up">
                    <div class="card card-custom h-100">
                        <div class="card-body text-center p-4">
                            <div class="mb-3">
                                <i class="fas fa-video fs-1" style="color: #e91e63;"></i>
                            </div>
                            <h5 class="mb-3">E-Learning Terpadu</h5>
                            <p class="text-muted">Akses materi kuliah, video pembelajaran, dan diskusi online dalam satu platform.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 fade-in-up" style="animation-delay: 0.1s">
                    <div class="card card-custom h-100">
                        <div class="card-body text-center p-4">
                            <div class="mb-3">
                                <i class="fas fa-chart-pie fs-1" style="color: #9c27b0;"></i>
                            </div>
                            <h5 class="mb-3">Analisis Akademik</h5>
                            <p class="text-muted">Pantau perkembangan akademik dengan dashboard interaktif dan laporan detail.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 fade-in-up" style="animation-delay: 0.2s">
                    <div class="card card-custom h-100">
                        <div class="card-body text-center p-4">
                            <div class="mb-3">
                                <i class="fas fa-mobile-alt fs-1" style="color: #f06292;"></i>
                            </div>
                            <h5 class="mb-3">Akses Mobile</h5>
                            <p class="text-muted">Akses portal kapan saja melalui smartphone dengan interface yang responsif.</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h4 class="mb-3">
                        <i class="fas fa-graduation-cap me-2"></i>Portal Mahasiswa
                    </h4>
                    <p class="opacity-90">
                        Sistem informasi akademik terintegrasi untuk mendukung proses belajar mengajar di STMIK IKMI.
                    </p>
                </div>
                <div class="col-lg-4 mb-4">
                    <h5 class="mb-3">Tautan Cepat</h5>
                    <ul class="footer-links">
                        <li><a href="#"><i class="fas fa-chevron-right me-2"></i>Akademik</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right me-2"></i>Jadwal Kuliah</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right me-2"></i>Kalender Akademik</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right me-2"></i>Pengumuman</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 mb-4">
                    <h5 class="mb-3">Informasi Mahasiswa</h5>
                    <ul class="footer-links">
                        <li>
                            <i class="fas fa-user me-2"></i>
                            {{ $nama ?? 'Mahasiswa' }}
                        </li>
                        <li>
                            <i class="fas fa-id-card me-2"></i>
                            NIM: {{ $nim ?? '00000000' }}
                        </li>
                        <li>
                            <i class="fas fa-calendar me-2"></i>
                            {{ date('d F Y') }}
                        </li>
                    </ul>
                </div>
            </div>
            <hr class="opacity-25">
            <div class="row mt-4">
                <div class="col-md-6">
                    <p class="mb-0 opacity-90">
                        © {{ date('Y') }} STMIK IKMI. All rights reserved.
                    </p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0 opacity-90">
                        Dibangun dengan <i class="fas fa-heart text-pink"></i> menggunakan Laravel
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script>
        // Animasi scroll
        document.addEventListener('DOMContentLoaded', function() {
            // Animasi untuk elemen saat scroll
            const fadeElements = document.querySelectorAll('.fade-in-up');
            
            const fadeInOnScroll = function() {
                fadeElements.forEach(element => {
                    const elementTop = element.getBoundingClientRect().top;
                    const elementVisible = 150;
                    
                    if (elementTop < window.innerHeight - elementVisible) {
                        element.classList.add('visible');
                    }
                });
            };
            
            // Jalankan saat pertama kali dimuat
            fadeInOnScroll();
            
            // Jalankan saat scroll
            window.addEventListener('scroll', fadeInOnScroll);
            
            // Active state untuk navbar
            const currentLocation = window.location.href;
            const navLinks = document.querySelectorAll('.nav-link');
            
            navLinks.forEach(link => {
                if(link.href === currentLocation) {
                    link.classList.add('active');
                }
                
                // Hover effect
                link.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-2px)';
                });
                
                link.addEventListener('mouseleave', function() {
                    if(!this.classList.contains('active')) {
                        this.style.transform = 'translateY(0)';
                    }
                });
            });
            
            // Tambahkan efek hover pada card
            const cards = document.querySelectorAll('.card-custom, .stats-card');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.cursor = 'pointer';
                });
            });
            
            // Notification system dengan tema pink
            window.showNotification = function(message, type = 'info') {
                const alert = document.createElement('div');
                alert.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
                alert.style.cssText = `
                    top: 20px;
                    right: 20px;
                    z-index: 9999;
                    min-width: 300px;
                    box-shadow: 0 5px 20px rgba(233, 30, 99, 0.15);
                    border: none;
                    border-radius: 10px;
                    background: #fff9fb;
                    border-left: 4px solid #e91e63;
                    color: #9c27b0;
                `;
                
                const icons = {
                    success: 'check-circle',
                    warning: 'exclamation-triangle',
                    info: 'info-circle',
                    error: 'times-circle'
                };
                
                alert.innerHTML = `
                    <div class="d-flex align-items-center">
                        <i class="fas fa-${icons[type] || 'info-circle'} me-3 fs-4" style="color: #e91e63;"></i>
                        <div class="flex-grow-1">${message}</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                `;
                
                document.body.appendChild(alert);
                
                // Auto remove after 5 seconds
                setTimeout(() => {
                    if(alert.parentNode) {
                        alert.remove();
                    }
                }, 5000);
            };
            
            // Welcome notification dengan tema pink
            setTimeout(() => {
                if(!sessionStorage.getItem('welcomeShown')) {
                    const welcomeMessages = [
                        `Selamat datang, {{ $nama ?? 'Mahasiswa' }}! Semangat belajar di semester {{ $semester ?? '1' }}. 🌸`,
                        `Halo {{ $nama ?? 'Mahasiswa' }}! Portal akademik siap membantumu meraih prestasi terbaik! ✨`,
                        `Welcome back! Ayo pantau perkembangan akademikmu di portal ini. 📚`
                    ];
                    
                    const randomMessage = welcomeMessages[Math.floor(Math.random() * welcomeMessages.length)];
                    showNotification(randomMessage, 'success');
                    sessionStorage.setItem('welcomeShown', 'true');
                }
            }, 1000);
            
            // Tambahkan efek confetti saat klik logo
            const logo = document.querySelector('.navbar-brand');
            logo.addEventListener('click', function(e) {
                e.preventDefault();
                createPinkConfetti();
            });
            
            // Fungsi confetti pink
            function createPinkConfetti() {
                const colors = ['#e91e63', '#f06292', '#9c27b0', '#f8bbd9'];
                
                for (let i = 0; i < 50; i++) {
                    const confetti = document.createElement('div');
                    confetti.style.position = 'fixed';
                    confetti.style.width = '10px';
                    confetti.style.height = '10px';
                    confetti.style.background = colors[Math.floor(Math.random() * colors.length)];
                    confetti.style.borderRadius = '50%';
                    confetti.style.top = '60px';
                    confetti.style.left = Math.random() * window.innerWidth + 'px';
                    confetti.style.zIndex = '9998';
                    confetti.style.pointerEvents = 'none';
                    
                    document.body.appendChild(confetti);
                    
                    // Animasi
                    const animation = confetti.animate([
                        { transform: 'translateY(0) rotate(0deg)', opacity: 1 },
                        { transform: `translateY(${Math.random() * 200 + 100}px) rotate(${Math.random() * 360}deg)`, opacity: 0 }
                    ], {
                        duration: 1000 + Math.random() * 1000,
                        easing: 'cubic-bezier(0.215, 0.610, 0.355, 1)'
                    });
                    
                    animation.onfinish = () => confetti.remove();
                }
            }
        });
    </script>
</body>
</html>