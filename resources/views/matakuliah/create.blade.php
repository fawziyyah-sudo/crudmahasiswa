@extends('layouts.app')

@section('title', 'Tambah Mata Kuliah')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="main-card animate__animated animate__fadeIn">
            <div class="card-header-gradient" style="background: linear-gradient(45deg, #11998e, #38ef7d);">
                <h4 class="mb-0"><i class="bi bi-plus-circle-fill me-2"></i> Tambah Mata Kuliah</h4>
                <small>Isi form berikut dengan lengkap dan benar</small>
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
                
                <form action="{{ route('matakuliah.store') }}" method="POST" id="createForm">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-group">
                                <label class="form-label fw-bold">
                                    <i class="bi bi-qr-code me-1"></i> Kode Mata Kuliah <span class="text-danger">*</span>
                                </label>
                                <input type="text" 
                                       class="form-control form-control-lg @error('kode_mk') is-invalid @enderror" 
                                       id="kode_mk" 
                                       name="kode_mk" 
                                       value="{{ old('kode_mk') }}" 
                                       placeholder="Contoh: MK101"
                                       required>
                                <small class="text-muted">Kode MK harus unik dan maksimal 10 karakter</small>
                                @error('kode_mk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
                                       value="{{ old('nama_mk') }}" 
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
                                    <option value="1" {{ old('sks') == '1' ? 'selected' : '' }}>1 SKS</option>
                                    <option value="2" {{ old('sks') == '2' ? 'selected' : '' }}>2 SKS</option>
                                    <option value="3" {{ old('sks') == '3' ? 'selected' : '' }}>3 SKS</option>
                                    <option value="4" {{ old('sks') == '4' ? 'selected' : '' }}>4 SKS</option>
                                    <option value="5" {{ old('sks') == '5' ? 'selected' : '' }}>5 SKS</option>
                                    <option value="6" {{ old('sks') == '6' ? 'selected' : '' }}>6 SKS</option>
                                </select>
                                <small class="text-muted">SKS antara 1-6</small>
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
                                    <option value="1" {{ old('semester') == '1' ? 'selected' : '' }}>Semester 1</option>
                                    <option value="2" {{ old('semester') == '2' ? 'selected' : '' }}>Semester 2</option>
                                    <option value="3" {{ old('semester') == '3' ? 'selected' : '' }}>Semester 3</option>
                                    <option value="4" {{ old('semester') == '4' ? 'selected' : '' }}>Semester 4</option>
                                    <option value="5" {{ old('semester') == '5' ? 'selected' : '' }}>Semester 5</option>
                                    <option value="6" {{ old('semester') == '6' ? 'selected' : '' }}>Semester 6</option>
                                    <option value="7" {{ old('semester') == '7' ? 'selected' : '' }}>Semester 7</option>
                                    <option value="8" {{ old('semester') == '8' ? 'selected' : '' }}>Semester 8</option>
                                </select>
                                <small class="text-muted">Semester antara 1-8</small>
                                @error('semester')
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
                        <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary btn-custom btn-lg">
                            <i class="bi bi-arrow-left me-2"></i>Kembali
                        </a>
                        <button type="submit" class="btn btn-success btn-custom btn-lg" id="submitBtn">
                            <i class="bi bi-save me-2"></i>Simpan Mata Kuliah
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
        // Auto uppercase untuk kode MK
        $("#kode_mk").on("input", function() {
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