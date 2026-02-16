@extends('layouts.app')

@section('title', 'Edit Mata Kuliah')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="main-card animate__animated animate__fadeIn">
            <div class="card-header-gradient" style="background: linear-gradient(45deg, #f093fb, #f5576c);">
                <h4 class="mb-0"><i class="bi bi-pencil-fill me-2"></i> Edit Mata Kuliah</h4>
                <small>Ubah data mata kuliah dengan benar</small>
            </div>
            
            <div class="card-body p-4">
                
                <!-- Tampilkan error validasi -->
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show mb-4">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-exclamation-triangle-fill me-3 fs-4"></i>
                        <div>
                            <strong>Terjadi kesalahan!</strong> Periksa kembali input Anda.
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif
                
                <form action="{{ route('matakuliah.update', $matakuliah->kode_mk) }}" method="POST" id="editForm">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <!-- Info Alert -->
                        <div class="col-12 mb-4">
                            <div class="alert alert-info">
                                <i class="bi bi-info-circle-fill me-2"></i>
                                Kode Mata Kuliah tidak dapat diubah karena merupakan identitas unik.
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-4">
                            <div class="form-group">
                                <label class="form-label fw-bold">
                                    <i class="bi bi-qr-code me-1"></i> Kode Mata Kuliah
                                </label>
                                <input type="text" 
                                       class="form-control form-control-lg bg-light" 
                                       value="{{ $matakuliah->kode_mk }}" 
                                       readonly>
                                <small class="text-muted">Kode MK bersifat read-only</small>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="form-group">
                                <label class="form-label fw-bold">
                                    <i class="bi bi-book-fill me-1"></i> Nama Mata Kuliah <span class="text-danger">*</span>
                                </label>
                                <input type="text" 
                                       class="form-control form-control-lg @error('nama_mk') is-invalid @enderror" 
                                       id="nama_mk" 
                                       name="nama_mk" 
                                       value="{{ old('nama_mk', $matakuliah->nama_mk) }}" 
                                       placeholder="Contoh: Pemrograman Web"
                                       required>
                                @error('nama_mk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="form-group">
                                <label class="form-label fw-bold">
                                    <i class="bi bi-sort-numeric-up me-1"></i> Jumlah SKS <span class="text-danger">*</span>
                                </label>
                                <select class="form-select form-select-lg @error('sks') is-invalid @enderror" 
                                        id="sks" 
                                        name="sks" 
                                        required>
                                    <option value="">Pilih SKS</option>
                                    <option value="1" {{ old('sks', $matakuliah->sks) == '1' ? 'selected' : '' }}>1 SKS</option>
                                    <option value="2" {{ old('sks', $matakuliah->sks) == '2' ? 'selected' : '' }}>2 SKS</option>
                                    <option value="3" {{ old('sks', $matakuliah->sks) == '3' ? 'selected' : '' }}>3 SKS</option>
                                    <option value="4" {{ old('sks', $matakuliah->sks) == '4' ? 'selected' : '' }}>4 SKS</option>
                                    <option value="5" {{ old('sks', $matakuliah->sks) == '5' ? 'selected' : '' }}>5 SKS</option>
                                    <option value="6" {{ old('sks', $matakuliah->sks) == '6' ? 'selected' : '' }}>6 SKS</option>
                                </select>
                                @error('sks')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="form-group">
                                <label class="form-label fw-bold">
                                    <i class="bi bi-layers-fill me-1"></i> Semester <span class="text-danger">*</span>
                                </label>
                                <select class="form-select form-select-lg @error('semester') is-invalid @enderror" 
                                        id="semester" 
                                        name="semester" 
                                        required>
                                    <option value="">Pilih Semester</option>
                                    <option value="1" {{ old('semester', $matakuliah->semester) == '1' ? 'selected' : '' }}>Semester 1</option>
                                    <option value="2" {{ old('semester', $matakuliah->semester) == '2' ? 'selected' : '' }}>Semester 2</option>
                                    <option value="3" {{ old('semester', $matakuliah->semester) == '3' ? 'selected' : '' }}>Semester 3</option>
                                    <option value="4" {{ old('semester', $matakuliah->semester) == '4' ? 'selected' : '' }}>Semester 4</option>
                                    <option value="5" {{ old('semester', $matakuliah->semester) == '5' ? 'selected' : '' }}>Semester 5</option>
                                    <option value="6" {{ old('semester', $matakuliah->semester) == '6' ? 'selected' : '' }}>Semester 6</option>
                                    <option value="7" {{ old('semester', $matakuliah->semester) == '7' ? 'selected' : '' }}>Semester 7</option>
                                    <option value="8" {{ old('semester', $matakuliah->semester) == '8' ? 'selected' : '' }}>Semester 8</option>
                                </select>
                                @error('semester')
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

                    <div class="d-flex justify-content-between gap-3">
                        <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary btn-custom btn-lg">
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
    });
</script>
@endpush