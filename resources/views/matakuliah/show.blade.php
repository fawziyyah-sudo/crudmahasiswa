@extends('layouts.app')

@section('title', 'Detail Mata Kuliah')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="main-card animate__animated animate__fadeIn">
            <div class="card-header-gradient" style="background: linear-gradient(45deg, #11998e, #38ef7d);">
                <h4 class="mb-0"><i class="bi bi-book-fill me-2"></i> Detail Mata Kuliah</h4>
                <small>Informasi lengkap mata kuliah</small>
            </div>
            <div class="card-body p-4">
                
                <!-- Icon -->
                <div class="text-center mb-4">
                    <div class="rounded-circle bg-primary bg-opacity-10 p-4 d-inline-block mb-3">
                        <i class="bi bi-journal-bookmark-fill text-primary" style="font-size: 80px;"></i>
                    </div>
                    <h3 class="fw-bold">{{ $matakuliah->nama_mk }}</h3>
                    <span class="badge bg-primary p-2 px-3">
                        <i class="bi bi-qr-code me-1"></i>{{ $matakuliah->kode_mk }}
                    </span>
                </div>
                
                <!-- Info Detail -->
                <div class="card bg-light border-0 mb-4">
                    <div class="card-body">
                        <table class="table table-borderless mb-0">
                            <tr>
                                <td width="150" class="fw-bold">Kode MK</td>
                                <td width="20">:</td>
                                <td>{{ $matakuliah->kode_mk }}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Nama MK</td>
                                <td>:</td>
                                <td>{{ $matakuliah->nama_mk }}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Jumlah SKS</td>
                                <td>:</td>
                                <td>
                                    <span class="badge" style="background: linear-gradient(45deg, #ff6b6b, #ee5253); color: white; padding: 8px 15px; border-radius: 50px;">
                                        <i class="bi bi-sort-numeric-up me-1"></i>{{ $matakuliah->sks }} SKS
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Semester</td>
                                <td>:</td>
                                <td>
                                    <span class="badge" style="background: linear-gradient(45deg, #48dbfb, #0abde3); color: white; padding: 8px 15px; border-radius: 50px;">
                                        <i class="bi bi-layers-fill me-1"></i>Semester {{ $matakuliah->semester }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Dibuat Pada</td>
                                <td>:</td>
                                <td>
                                    <i class="bi bi-calendar me-1"></i>
                                    {{ $matakuliah->created_at ? $matakuliah->created_at->format('d/m/Y H:i:s') : '-' }}
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Diupdate Pada</td>
                                <td>:</td>
                                <td>
                                    <i class="bi bi-clock me-1"></i>
                                    {{ $matakuliah->updated_at ? $matakuliah->updated_at->format('d/m/Y H:i:s') : '-' }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <!-- Action Buttons -->
                <div class="d-flex justify-content-between">
                    <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary btn-custom">
                        <i class="bi bi-arrow-left me-2"></i>Kembali
                    </a>
                    <div>
                        <a href="{{ route('matakuliah.edit', $matakuliah->kode_mk) }}" class="btn btn-warning btn-custom me-2">
                            <i class="bi bi-pencil me-2"></i>Edit
                        </a>
                        <button type="button" class="btn btn-danger btn-custom" 
                                onclick="confirmDelete('{{ $matakuliah->kode_mk }}', '{{ $matakuliah->nama_mk }}')">
                            <i class="bi bi-trash me-2"></i>Hapus
                        </button>
                        <form id="delete-form-{{ $matakuliah->kode_mk }}" 
                              action="{{ route('matakuliah.destroy', $matakuliah->kode_mk) }}" 
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
    function confirmDelete(kode, nama) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: `Data mata kuliah "${nama}" akan dihapus permanen!`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + kode).submit();
            }
        });
    }
</script>
@endpush