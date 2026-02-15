@extends('layouts.app')

@section('title', 'Data Mahasiswa')

@section('content')
<div class="main-card animate__animated animate__fadeIn">
    <div class="card-header-gradient d-flex justify-content-between align-items-center flex-wrap">
        <div>
            <h4 class="mb-0"><i class="bi bi-people-fill me-2"></i> Data Mahasiswa</h4>
            <small class="opacity-75">Kelola data mahasiswa dengan mudah</small>
        </div>
        <div class="d-flex gap-2 mt-2 mt-md-0">
            <a href="{{ route('mahasiswa.create') }}" class="btn btn-light btn-custom">
                <i class="bi bi-plus-circle me-2"></i>Tambah Mahasiswa
            </a>
            <button class="btn btn-outline-light btn-custom" onclick="window.print()">
                <i class="bi bi-printer me-2"></i>Cetak
            </button>
        </div>
    </div>
    
    <div class="card-body p-4">
        
        <!-- Statistics Cards -->
        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-icon bg-primary bg-opacity-10 text-primary">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <h3 class="mb-2">{{ \App\Models\Mahasiswa::count() }}</h3>
                    <p class="text-muted mb-0">Total Mahasiswa</p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-icon bg-success bg-opacity-10 text-success">
                        <i class="bi bi-book-fill"></i>
                    </div>
                    @php
                        $totalMatkul = \App\Models\Mahasiswa::distinct('matakuliah')->count('matakuliah');
                    @endphp
                    <h3 class="mb-2">{{ $totalMatkul }}</h3>
                    <p class="text-muted mb-0">Total Mata Kuliah</p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-icon bg-info bg-opacity-10 text-info">
                        <i class="bi bi-building"></i>
                    </div>
                    @php
                        $totalKelas = \App\Models\Mahasiswa::distinct('kelas')->count('kelas');
                    @endphp
                    <h3 class="mb-2">{{ $totalKelas }}</h3>
                    <p class="text-muted mb-0">Total Kelas</p>
                </div>
            </div>
        </div>
        
        <!-- Search Box -->
        <div class="row mb-4">
            <div class="col-md-12">
                <form action="{{ route('mahasiswa.search') }}" method="GET" class="d-flex gap-2">
                    <div class="position-relative flex-grow-1">
                        <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                        <input type="text" 
                               name="search" 
                               class="search-box ps-5 w-100" 
                               placeholder="Cari berdasarkan NIM, Nama, Kelas, atau Mata Kuliah..." 
                               value="{{ request()->search }}">
                    </div>
                    <button type="submit" class="btn btn-primary btn-custom">
                        <i class="bi bi-search me-2"></i>Cari
                    </button>
                    @if(request()->has('search') && request()->search != '')
                        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary btn-custom">
                            <i class="bi bi-x-circle me-2"></i>Reset
                        </a>
                    @endif
                </form>
            </div>
        </div>
        
        <!-- Info Search -->
        @if(request()->has('search') && request()->search != '')
            <div class="alert alert-info mb-4">
                <i class="bi bi-info-circle-fill me-2"></i>
                Menampilkan hasil pencarian untuk: <strong>"{{ request()->search }}"</strong>
                ({{ $mahasiswas->total() }} data ditemukan)
            </div>
        @endif
        
        <!-- Tabel Data Mahasiswa -->
        <div class="table-responsive">
            <table class="table table-custom table-hover">
                <thead>
                    <tr>
                        <th width="50">No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Mata Kuliah</th>
                        <th width="200">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($mahasiswas as $index => $mahasiswa)
                    <tr>
                        <td>
                            <span class="fw-bold">{{ $mahasiswas->firstItem() + $index }}</span>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark p-2">
                                <i class="bi bi-qr-code me-1"></i>
                                {{ $mahasiswa->nim }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-primary bg-opacity-10 p-2 me-2">
                                    <i class="bi bi-person-circle text-primary"></i>
                                </div>
                                <div>
                                    <strong>{{ $mahasiswa->nama }}</strong>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge" style="background: linear-gradient(45deg, #ff6b6b, #ee5253); color: white; padding: 8px 15px; border-radius: 50px;">
                                <i class="bi bi-building me-1"></i>
                                {{ $mahasiswa->kelas }}
                            </span>
                        </td>
                        <td>
                            <span class="badge" style="background: linear-gradient(45deg, #48dbfb, #0abde3); color: white; padding: 8px 15px; border-radius: 50px;">
                                <i class="bi bi-book me-1"></i>
                                {{ $mahasiswa->matakuliah }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('mahasiswa.show', $mahasiswa->nim) }}" 
                                   class="btn btn-info btn-sm text-white" 
                                   data-bs-toggle="tooltip" 
                                   title="Lihat Detail">
                                    <i class="bi bi-eye-fill"></i>
                                </a>
                                <a href="{{ route('mahasiswa.edit', $mahasiswa->nim) }}" 
                                   class="btn btn-warning btn-sm text-white"
                                   data-bs-toggle="tooltip" 
                                   title="Edit Data">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <button type="button" 
                                        class="btn btn-danger btn-sm"
                                        onclick="confirmDelete('{{ $mahasiswa->nim }}', '{{ $mahasiswa->nama }}')"
                                        data-bs-toggle="tooltip" 
                                        title="Hapus Data">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                                <form id="delete-form-{{ $mahasiswa->nim }}" 
                                      action="{{ route('mahasiswa.destroy', $mahasiswa->nim) }}" 
                                      method="POST" 
                                      style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5">
                            <img src="https://cdn-icons-png.flaticon.com/512/4076/4076478.png" 
                                 alt="No Data" 
                                 style="width: 150px; opacity: 0.5;">
                            <h5 class="mt-3 text-muted">
                                @if(request()->has('search') && request()->search != '')
                                    Data tidak ditemukan untuk pencarian "{{ request()->search }}"
                                @else
                                    Belum ada data mahasiswa
                                @endif
                            </h5>
                            <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary btn-custom mt-3">
                                <i class="bi bi-plus-circle me-2"></i>
                                @if(request()->has('search') && request()->search != '')
                                    Tambah Data Baru
                                @else
                                    Tambah Data Pertama
                                @endif
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        @if($mahasiswas->hasPages())
        <div class="d-flex justify-content-between align-items-center mt-4">
            <div class="text-muted">
                <small>
                    Menampilkan {{ $mahasiswas->firstItem() }} - {{ $mahasiswas->lastItem() }} 
                    dari {{ $mahasiswas->total() }} data
                </small>
            </div>
            <div>
                {{ $mahasiswas->links() }}
            </div>
        </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script>
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
    
    $(document).ready(function() {
        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
        
        // Auto submit search after typing (optional)
        let searchTimer;
        $('#searchInput').on('keyup', function() {
            clearTimeout(searchTimer);
            searchTimer = setTimeout(() => {
                $(this).closest('form').submit();
            }, 1000);
        });
    });
</script>
@endpush