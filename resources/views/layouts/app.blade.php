<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Sistem Informasi Mahasiswa') - SIM</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px 0;
        }
        
        .main-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            overflow: hidden;
            animation: slideInDown 0.5s ease-out;
        }
        
        .card-header-gradient {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            border-bottom: none;
            padding: 25px 30px;
        }
        
        .btn-custom {
            padding: 10px 25px;
            border-radius: 50px;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
        }
        
        .btn-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        
        .btn-primary-custom {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
        }
        
        .table-custom {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        
        .table-custom thead {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
        }
        
        .table-custom th {
            font-weight: 500;
            text-transform: uppercase;
            font-size: 0.9rem;
            letter-spacing: 1px;
            border: none;
        }
        
        .table-custom td {
            vertical-align: middle;
            padding: 15px 10px;
        }
        
        .badge-custom {
            padding: 8px 15px;
            border-radius: 50px;
            font-weight: 500;
            font-size: 0.85rem;
        }
        
        .badge-kelas {
            background: linear-gradient(45deg, #ff6b6b, #ee5253);
            color: white;
        }
        
        .badge-matkul {
            background: linear-gradient(45deg, #48dbfb, #0abde3);
            color: white;
        }
        
        .action-buttons .btn {
            padding: 8px 15px;
            margin: 0 5px;
            border-radius: 50px;
            font-size: 0.85rem;
            transition: all 0.3s ease;
        }
        
        .action-buttons .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        
        .search-box {
            border-radius: 50px;
            padding: 12px 25px;
            border: 2px solid #e0e0e0;
            transition: all 0.3s ease;
            width: 300px;
        }
        
        .search-box:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
            outline: none;
        }
        
        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
        }
        
        .stat-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        }
        
        .stat-icon {
            width: 60px;
            height: 60px;
            line-height: 60px;
            text-align: center;
            border-radius: 15px;
            font-size: 30px;
            margin-bottom: 15px;
        }
        
        .footer {
            background: white;
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            margin-top: 30px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        
        @media (max-width: 768px) {
            .search-box {
                width: 100%;
                margin-top: 15px;
            }
            
            .action-buttons .btn {
                margin: 2px;
                padding: 5px 10px;
                font-size: 0.8rem;
            }
        }
        
        /* Loading animation */
        .loading {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255,255,255,0.9);
            z-index: 9999;
            display: none;
            justify-content: center;
            align-items: center;
        }
        
        .loading.active {
            display: flex;
        }
        
        .spinner {
            width: 50px;
            height: 50px;
            border: 5px solid #f3f3f3;
            border-top: 5px solid #667eea;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
    
    @stack('styles')
</head>
<body>
    
    <!-- Loading Spinner -->
    <div class="loading" id="loading">
        <div class="spinner"></div>
    </div>
    
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark mb-4" style="background: rgba(255,255,255,0.1); backdrop-filter: blur(10px);">
        <div class="container">
            <a class="navbar-brand" href="{{ route('mahasiswa.index') }}">
                <i class="bi bi-mortarboard-fill me-2"></i>
                <strong>Sistem Informasi Mahasiswa</strong>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('mahasiswa.index') }}">
                            <i class="bi bi-house-door-fill me-1"></i> Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('mahasiswa.create') }}">
                            <i class="bi bi-plus-circle-fill me-1"></i> Tambah Data
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Main Content -->
    <div class="container">
        @yield('content')
    </div>
    
    <!-- Footer -->
    <div class="container">
        <div class="footer">
            <p class="mb-0 text-muted">
                <i class="bi bi-c-circle me-1"></i>
                {{ date('Y') }} Sistem Informasi Mahasiswa. All rights reserved.
                <br>
                <small>Developed with <i class="bi bi-heart-fill text-danger"></i> by Fawziyyah</small>
            </p>
        </div>
    </div>
    
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        // Show loading
        $(document).ajaxStart(function() {
            $('#loading').addClass('active');
        }).ajaxStop(function() {
            $('#loading').removeClass('active');
        });
        
        // Auto hide alerts after 5 seconds
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 5000);
        
        // Confirm delete with SweetAlert
        function confirmDelete(nim, nama) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: `Data mahasiswa "${nama}" akan dihapus permanen!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + nim).submit();
                }
            });
        }
        
        // Show success message
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            });
        @endif
        
        // Show error message
        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ session('error') }}',
                showConfirmButton: true
            });
        @endif
    </script>
    
    @stack('scripts')
</body>
</html>