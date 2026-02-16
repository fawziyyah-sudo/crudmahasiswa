@extends('layouts.app')

@section('title', 'Detail Mahasiswa')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="main-card animate__animated animate__fadeIn">
            <div class="card-header-gradient" style="background: linear-gradient(45deg, #11998e, #38ef7d);">
                <h4 class="mb-0"><i class="bi bi-person-badge-fill me-2"></i> Detail Mahasiswa</h4>
                <small>Informasi lengkap data mahasiswa</small>
            </div>
            <div class="card-body p-4">
                
                <!-- Profil Card -->
                <div class="text-center mb-4">
                    <div class="rounded-circle bg-primary bg-opacity-10 p-4 d-inline-block mb-3">
                        <i class="bi bi-person-circle text-primary" style="font-size: 80px;"></i>
                    </div>
                    <h3 class="fw-bold">{{ $mahasiswa->nama }}</h3>
                    <span class="badge bg-primary p-2 px-3">
                        <i class="bi bi-qr-code me-1"></i>{{ $mahasiswa->nim }}
                    </span>
                </div>
                
                <!-- Info Detail -->
                <div class="card bg-light border-0 mb-4">
                    <div class="card-body">
                        <table class="table table-borderless mb-0">
                            <tr>
                                <td width="120" class="fw-bold">NIM</td>
                                <td width="20">:</td>
                                <td>{{ $mahasiswa->nim }}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Nama</td>
                                <td>:</td>
                                <td>{{ $mahasiswa->nama }}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Kelas</td>
                                <td>:</td>
                                <td>
                                    <span class="badge" style="background: linear-gradient(45deg, #ff6b6b, #ee5253); color: white; padding: 8px 15px; border-radius: 50px;">
                                        <i class="bi bi-building me-1"></i>{{ $mahasiswa->kelas }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Mata Kuliah</td>
                                <td>:</td>
                                <td>
                                    <span class="badge" style="background: linear-gradient(45deg, #48dbfb, #0abde3); color: white; padding: 8px 15px; border-radius: 50px;">
                                        <i class="bi bi-book me-1"></i>{{ $mahasiswa->matakuliah }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Dibuat</td>
                                <td>:</td>
                                <td>
                                    <i class="bi bi-calendar me-1"></i>
                                    {{ $mahasiswa->created_at ? $mahasiswa->created_at->format('d/m/Y H:i') : '-' }}
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Diupdate</td>
                                <td>:</td>
                                <td>
                                    <i class="bi bi-clock me-1"></i>
                                    {{ $mahasiswa->updated_at ? $mahasiswa->updated_at->format('d/m/Y H:i') : '-' }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <!-- Action Buttons -->
                <div class="d-flex justify-content-between gap-3">
                    <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary btn-custom">
                        <i class="bi bi-arrow-left me-2"></i>Kembali ke Daftar
                    </a>
                    <div>
                        <a href="{{ route('mahasiswa.edit', $mahasiswa->nim) }}" class="btn btn-warning btn-custom me-2">
                            <i class="bi bi-pencil me-2"></i>Edit
                        </a>
                        <button type="button" class="btn btn-danger btn-custom" 
                                onclick="confirmDelete('{{ $mahasiswa->nim }}', '{{ $mahasiswa->nama }}')">
                            <i class="bi bi-trash me-2"></i>Hapus
                        </button>
                        <form id="delete-form-{{ $mahasiswa->nim }}" 
                              action="{{ route('mahasiswa.destroy', $mahasiswa->nim) }}" 
                              method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
</script>
@endpush