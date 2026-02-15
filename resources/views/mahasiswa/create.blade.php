@extends('layouts.app')

@section('title', 'Tambah Data Mahasiswa')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="main-card animate__animated animate__fadeIn">
            <div class="card-header-gradient">
                <h4 class="mb-0"><i class="bi bi-plus-circle-fill me-2"></i> Tambah Data Mahasiswa</h4>
                <small>Isi form berikut dengan lengkap dan benar</small>
            </div>
            
            <div class="card-body p-4">
                <form action="{{ route('mahasiswa.store') }}" method="POST" id="createForm">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <div class="form-group">
                                <label class="form-label fw-bold">
                                    <i class="bi bi-qr-code me-1"></i>NIM <span class="text-danger">*</span>
                                </label>
                                <input type="text" 
                                       class="form-control form-control-lg @error('nim') is-invalid @enderror" 
                                       id="nim" 
                                       name="nim" 
                                       value="{{ old('nim') }}" 
                                       placeholder="Masukkan NIM (contoh: 2023001)"
                                       required>
                                <small class="text-muted">NIM harus unik dan tidak dapat diubah setelah disimpan</small>
                                @error('nim')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12 mb-4">
                            <div class="form-group">
                                <label class="form-label fw-bold">
                                    <i class="bi bi-person-fill me-1"></i>Nama Lengkap <span class="text-danger">*</span>
                                </label>
                                <input type="text" 
                                       class="form-control form-control-lg @error('nama') is-invalid @enderror" 
                                       id="nama" 
                                       name="nama" 
                                       value="{{ old('nama') }}" 
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
                                    <i class="bi bi-building me-1"></i>Kelas <span class="text-danger">*</span>
                                </label>
                                <select class="form-select form-select-lg @error('kelas') is-invalid @enderror" 
                                        id="kelas" 
                                        name="kelas" 
                                        required>
                                    <option value="">Pilih Kelas</option>
                                    <option value="KA-REG-S1" {{ old('kelas') == 'KA-REG-S1' ? 'selected' : '' }}>KA-REG-S1</option>
                                    <option value="KA-REG-S2" {{ old('kelas') == 'KA-REG-S2' ? 'selected' : '' }}>KA-REG-S2</option>
                                    <option value="MI-REG-S1" {{ old('kelas') == 'MI-REG-S1' ? 'selected' : '' }}>MI-REG-S1</option>
                                    <option value="MI-REG-S2" {{ old('kelas') == 'MI-REG-S2' ? 'selected' : '' }}>MI-REG-S2</option>
                                    <option value="RPL-REG-S1" {{ old('kelas') == 'RPL-REG-S1' ? 'selected' : '' }}>RPL-REG-S1</option>
                                    <option value="RPL-REG-S2" {{ old('kelas') == 'RPL-REG-S2' ? 'selected' : '' }}>RPL-REG-S2</option>
                                    <option value="TI-REG-S1" {{ old('kelas') == 'TI-REG-S1' ? 'selected' : '' }}>TI-REG-S1</option>
                                    <option value="TI-REG-S2" {{ old('kelas') == 'TI-REG-S2' ? 'selected' : '' }}>TI-REG-S2</option>
                                </select>
                                @error('kelas')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="form-group">
                                <label class="form-label fw-bold">
                                    <i class="bi bi-book-fill me-1"></i>Mata Kuliah <span class="text-danger">*</span>
                                </label>
                                <select class="form-select form-select-lg @error('matakuliah') is-invalid @enderror" 
                                        id="matakuliah" 
                                        name="matakuliah" 
                                        required>
                                    <option value="">Pilih Mata Kuliah</option>
                                    <option value="Pemrograman Web" {{ old('matakuliah') == 'Pemrograman Web' ? 'selected' : '' }}>Pemrograman Web</option>
                                    <option value="Pemrograman Mobile" {{ old('matakuliah') == 'Pemrograman Mobile' ? 'selected' : '' }}>Pemrograman Mobile</option>
                                    <option value="Basis Data" {{ old('matakuliah') == 'Basis Data' ? 'selected' : '' }}>Basis Data</option>
                                    <option value="Jaringan Komputer" {{ old('matakuliah') == 'Jaringan Komputer' ? 'selected' : '' }}>Jaringan Komputer</option>
                                    <option value="Sistem Operasi" {{ old('matakuliah') == 'Sistem Operasi' ? 'selected' : '' }}>Sistem Operasi</option>
                                    <option value="Kecerdasan Buatan" {{ old('matakuliah') == 'Kecerdasan Buatan' ? 'selected' : '' }}>Kecerdasan Buatan</option>
                                    <option value="Rekayasa Perangkat Lunak" {{ old('matakuliah') == 'Rekayasa Perangkat Lunak' ? 'selected' : '' }}>Rekayasa Perangkat Lunak</option>
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
                                    Saya menyatakan bahwa data yang diisi adalah benar dan lengkap
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between gap-3">
                        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary btn-custom btn-lg">
                            <i class="bi bi-arrow-left me-2"></i>Kembali
                        </a>
                        <button type="submit" class="btn btn-primary btn-custom btn-lg" id="submitBtn">
                            <i class="bi bi-save me-2"></i>Simpan Data
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
        // Form validation
        $("#createForm").on("submit", function(e) {
            var nim = $("#nim").val();
            var nama = $("#nama").val();
            var kelas = $("#kelas").val();
            var matakuliah = $("#matakuliah").val();
            
            if (!nim || !nama || !kelas || !matakuliah) {
                e.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Semua field harus diisi!',
                });
            }
        });
        
        // Auto capitalize NIM
        $("#nim").on("input", function() {
            $(this).val($(this).val().toUpperCase());
        });
        
        // Submit button animation
        $("#submitBtn").on("click", function() {
            $(this).html('<span class="spinner-border spinner-border-sm me-2"></span>Menyimpan...');
            $(this).prop("disabled", true);
            $("#createForm").submit();
        });
    });
</script>
@endpush