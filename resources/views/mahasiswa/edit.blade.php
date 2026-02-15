@extends('layouts.app')

@section('title', 'Edit Data Mahasiswa')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="main-card animate__animated animate__fadeIn">
            <div class="card-header-gradient" style="background: linear-gradient(45deg, #f093fb, #f5576c);">
                <h4 class="mb-0"><i class="bi bi-pencil-fill me-2"></i> Edit Data Mahasiswa</h4>
                <small>Ubah data mahasiswa dengan benar</small>
            </div>
            
            <div class="card-body p-4">
                <form action="{{ route('mahasiswa.update', $mahasiswa->nim) }}" method="POST" id="editForm">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <!-- Info Alert -->
                        <div class="col-12 mb-4">
                            <div class="alert alert-info">
                                <i class="bi bi-info-circle-fill me-2"></i>
                                NIM tidak dapat diubah karena merupakan identitas unik mahasiswa.
                            </div>
                        </div>
                        
                        <div class="col-md-12 mb-4">
                            <div class="form-group">
                                <label class="form-label fw-bold">
                                    <i class="bi bi-qr-code me-1"></i> NIM
                                </label>
                                <input type="text" 
                                       class="form-control form-control-lg bg-light" 
                                       value="{{ $mahasiswa->nim }}" 
                                       readonly>
                                <small class="text-muted">NIM bersifat read-only</small>
                            </div>
                        </div>

                        <div class="col-md-12 mb-4">
                            <div class="form-group">
                                <label class="form-label fw-bold">
                                    <i class="bi bi-person-fill me-1"></i> Nama Lengkap <span class="text-danger">*</span>
                                </label>
                                <input type="text" 
                                       class="form-control form-control-lg @error('nama') is-invalid @enderror" 
                                       id="nama" 
                                       name="nama" 
                                       value="{{ old('nama', $mahasiswa->nama) }}" 
                                       placeholder="Masukkan nama lengkap"
                                       required>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="form-group">
                                <label class="form-label fw-bold">
                                    <i class="bi bi-building me-1"></i> Kelas <span class="text-danger">*</span>
                                </label>
                                <select class="form-select form-select-lg @error('kelas') is-invalid @enderror" 
                                        id="kelas" 
                                        name="kelas" 
                                        required>
                                    <option value="">Pilih Kelas</option>
                                    <option value="KA-REG-S1" {{ old('kelas', $mahasiswa->kelas) == 'KA-REG-S1' ? 'selected' : '' }}>KA-REG-S1</option>
                                    <option value="KA-REG-S2" {{ old('kelas', $mahasiswa->kelas) == 'KA-REG-S2' ? 'selected' : '' }}>KA-REG-S2</option>
                                    <option value="MI-REG-S1" {{ old('kelas', $mahasiswa->kelas) == 'MI-REG-S1' ? 'selected' : '' }}>MI-REG-S1</option>
                                    <option value="MI-REG-S2" {{ old('kelas', $mahasiswa->kelas) == 'MI-REG-S2' ? 'selected' : '' }}>MI-REG-S2</option>
                                    <option value="RPL-REG-S1" {{ old('kelas', $mahasiswa->kelas) == 'RPL-REG-S1' ? 'selected' : '' }}>RPL-REG-S1</option>
                                    <option value="RPL-REG-S2" {{ old('kelas', $mahasiswa->kelas) == 'RPL-REG-S2' ? 'selected' : '' }}>RPL-REG-S2</option>
                                    <option value="TI-REG-S1" {{ old('kelas', $mahasiswa->kelas) == 'TI-REG-S1' ? 'selected' : '' }}>TI-REG-S1</option>
                                    <option value="TI-REG-S2" {{ old('kelas', $mahasiswa->kelas) == 'TI-REG-S2' ? 'selected' : '' }}>TI-REG-S2</option>
                                </select>
                                @error('kelas')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="form-group">
                                <label class="form-label fw-bold">
                                    <i class="bi bi-book-fill me-1"></i> Mata Kuliah <span class="text-danger">*</span>
                                </label>
                                <select class="form-select form-select-lg @error('matakuliah') is-invalid @enderror" 
                                        id="matakuliah" 
                                        name="matakuliah" 
                                        required>
                                    <option value="">Pilih Mata Kuliah</option>
                                    <option value="Pemrograman Web" {{ old('matakuliah', $mahasiswa->matakuliah) == 'Pemrograman Web' ? 'selected' : '' }}>Pemrograman Web</option>
                                    <option value="Pemrograman Mobile" {{ old('matakuliah', $mahasiswa->matakuliah) == 'Pemrograman Mobile' ? 'selected' : '' }}>Pemrograman Mobile</option>
                                    <option value="Basis Data" {{ old('matakuliah', $mahasiswa->matakuliah) == 'Basis Data' ? 'selected' : '' }}>Basis Data</option>
                                    <option value="Jaringan Komputer" {{ old('matakuliah', $mahasiswa->matakuliah) == 'Jaringan Komputer' ? 'selected' : '' }}>Jaringan Komputer</option>
                                    <option value="Sistem Operasi" {{ old('matakuliah', $mahasiswa->matakuliah) == 'Sistem Operasi' ? 'selected' : '' }}>Sistem Operasi</option>
                                    <option value="Kecerdasan Buatan" {{ old('matakuliah', $mahasiswa->matakuliah) == 'Kecerdasan Buatan' ? 'selected' : '' }}>Kecerdasan Buatan</option>
                                    <option value="Rekayasa Perangkat Lunak" {{ old('matakuliah', $mahasiswa->matakuliah) == 'Rekayasa Perangkat Lunak' ? 'selected' : '' }}>Rekayasa Perangkat Lunak</option>
                                </select>
                                @error('matakuliah')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-12 mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="confirmData" required>
                                <label class="form-check-label" for="confirmData">
                                    Saya menyatakan bahwa data yang diubah adalah benar dan lengkap
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- TOMBOL ACTION -->
                    <div class="d-flex justify-content-between gap-3 mt-4">
                        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary btn-custom btn-lg">
                            <i class="bi bi-arrow-left me-2"></i>Kembali
                        </a>
                        <button type="submit" class="btn btn-warning btn-custom btn-lg" id="updateBtn">
                            <i class="bi bi-pencil-square me-2"></i>Update Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Update button animation
        $("#updateBtn").on("click", function() {
            $(this).html('<span class="spinner-border spinner-border-sm me-2"></span>Mengupdate...');
            $(this).prop("disabled", true);
            $("#editForm").submit();
        });

        // Form validation
        $("#editForm").on("submit", function(e) {
            var nama = $("#nama").val();
            var kelas = $("#kelas").val();
            var matakuliah = $("#matakuliah").val();
            
            if (!nama || !kelas || !matakuliah) {
                e.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Semua field harus diisi!',
                });
                
                // Enable button again
                $("#updateBtn").html('<i class="bi bi-pencil-square me-2"></i>Update Data');
                $("#updateBtn").prop("disabled", false);
            }
        });
    });
</script>
@endpush