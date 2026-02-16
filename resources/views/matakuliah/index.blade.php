@extends('layouts.app')

@section('title', 'Data Mata Kuliah')

@section('content')
<div class="main-card animate__animated animate__fadeIn">
    <div class="card-header-gradient" style="background: linear-gradient(45deg, #667eea, #764ba2);">
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div>
                <h4 class="mb-0"><i class="bi bi-book-fill me-2"></i> Data Mata Kuliah</h4>
                <small class="opacity-75">Kelola data mata kuliah</small>
            </div>
            <div class="d-flex gap-2 mt-2 mt-md-0">
                <a href="{{ route('matakuliah.create') }}" class="btn btn-light btn-custom">
                    <i class="bi bi-plus-circle me-2"></i>Tambah Mata Kuliah
                </a>
            </div>
        </div>
    </div>
    
    <div class="card-body p-4">
        
        <!-- Statistics -->
        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-icon bg-primary bg-opacity-10 text-primary">
                        <i class="bi bi-book-fill"></i>
                    </div>
                    <h3 class="mb-2">{{ \App\Models\Matakuliah::count() }}</h3>
                    <p class="text-muted mb-0">Total Mata Kuliah</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-icon bg-success bg-opacity-10 text-success">
                        <i class="bi bi-sort-numeric-up"></i>
                    </div>
                    @php
                        $totalSKS = \App\Models\Matakuliah::sum('sks');
                    @endphp
                    <h3 class="mb-2">{{ $totalSKS }}</h3>
                    <p class="text-muted mb-0">Total SKS</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-icon bg-info bg-opacity-10 text-info">
                        <i class="bi bi-layers-fill"></i>
                    </div>
                    @php
                        $totalSemester = \App\Models\Matakuliah::distinct('semester')->count('semester');
                    @endphp
                    <h3 class="mb-2">{{ $totalSemester }}</h3>
                    <p class="text-muted mb-0">Total Semester</p>
                </div>
            </div>
        </div>
        
        <!-- Search -->
        <div class="row mb-4">
            <div class="col-md-12">
                <form action="{{ route('matakuliah.search') }}" method="GET" class="d-flex gap-2">
                    <div class="position-relative flex-grow-1">
                        <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                        <input type="text" 
                               name="search" 
                               class="search-box ps-5 w-100" 
                               placeholder="Cari berdasarkan Kode, Nama, SKS, atau Semester..." 
                               value="{{ request()->search }}">
                    </div>
                    <button type="submit" class="btn btn-primary btn-custom">
                        <i class="bi bi-search me-2"></i>Cari
                    </button>
                    @if(request()->has('search') && request()->search != '')
                        <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary btn-custom">
                            <i class="bi bi-x-circle me-2"></i>Reset
                        </a>
                    @endif
                </form>
            </div>
        </div>
        
        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-custom table-hover">
                <thead>
                    <tr>
                        <th width="50">No</th>
                        <th>Kode MK</th>
                        <th>Nama Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Semester</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($matakuliahs as $index => $mk)
                    <tr>
                        <td>{{ $matakuliahs->firstItem() + $index }}</td>
                        <td>
                            <span class="badge bg-light text-dark p-2">
                                <i class="bi bi-qr-code me-1"></i>
                                {{ $mk->kode_mk }}
                            </span>
                        </td>
                        <td>
                            <strong>{{ $mk->nama_mk }}</strong>
                        </td>
                        <td>
                            <span class="badge" style="background: linear-gradient(45deg, #ff6b6b, #ee5253); color: white; padding: 5px 10px; border-radius: 50px;">
                                {{ $mk->sks }} SKS
                            </span>
                        </td>
                        <td>
                            <span class="badge" style="background: linear-gradient(45deg, #48dbfb, #0abde3); color: white; padding: 5px 10px; border-radius: 50px;">
                                Semester {{ $mk->semester }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('matakuliah.show', $mk->kode_mk) }}" class="btn btn-info btn-sm text-white" title="Detail">
                                    <i class="bi bi-eye-fill"></i>
                                </a>
                                <a href="{{ route('matakuliah.edit', $mk->kode_mk) }}" class="btn btn-warning btn-sm text-white" title="Edit">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-sm" 
                                        onclick="confirmDelete('{{ $mk->kode_mk }}', '{{ $mk->nama_mk }}')"
                                        title="Hapus">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                                <form id="delete-form-{{ $mk->kode_mk }}" 
                                      action="{{ route('matakuliah.destroy', $mk->kode_mk) }}" 
                                      method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5">
                            <img src="https://cdn-icons-png.flaticon.com/512/4076/4076478.png" width="150" style="opacity: 0.5;">
                            <h5 class="mt-3 text-muted">Belum ada data mata kuliah</h5>
                            <a href="{{ route('matakuliah.create') }}" class="btn btn-primary btn-custom mt-3">
                                <i class="bi bi-plus-circle me-2"></i>Tambah Data Pertama
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        @if($matakuliahs->hasPages())
        <div class="d-flex justify-content-between align-items-center mt-4">
            <div class="text-muted">
                <small>
                    Menampilkan {{ $matakuliahs->firstItem() }} - {{ $matakuliahs->lastItem() }} 
                    dari {{ $matakuliahs->total() }} data
                </small>
            </div>
            <div>
                {{ $matakuliahs->links() }}
            </div>
        </div>
        @endif
    </div>
</div>

<script>
    function confirmDelete(kode, nama) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: `Data mata kuliah "${nama}" akan dihapus permanen!`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + kode).submit();
            }
        });
    }
</script>
@endsection