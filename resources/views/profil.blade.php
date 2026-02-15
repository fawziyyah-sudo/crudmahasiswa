<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Mahasiswa</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f2f4f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            background: #fff;
            padding: 30px 35px;
            width: 380px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            text-align: center;
        }

        .profile-img {
            width: 110px;
            height: 110px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
            border: 4px solid #f0f0f0;
        }

        .card h2 {
            margin-bottom: 25px;
            color: #333;
        }

        .item {
            margin-bottom: 12px;
            font-size: 14px;
            text-align: left;
        }

        .label {
            font-weight: 600;
            color: #555;
        }

        .value {
            color: #222;
        }
    </style>
</head>
<body>

<div class="card">
    <img src="{{ asset('images/profil.jpg') }}" class="profile-img" alt="Foto Mahasiswa">

    <h2>Profil Mahasiswa</h2>

    <div class="item">
        <span class="label">Nama Lengkap:</span>
        <span class="value"> Fawziyyah</span>
    </div>

    <div class="item">
        <span class="label">NIM:</span>
        <span class="value"> 32241621</span>
    </div>

    <div class="item">
        <span class="label">Program Studi:</span>
        <span class="value"> Komputerisasi Akuntansi</span>
    </div>

    <div class="item">
        <span class="label">Mata Kuliah:</span>
        <span class="value"> Pemrograman Web Lanjut</span>
    </div>

   <div class="item">
        <span class="label">Tahun Akademik:</span>
        <span class="value"> 2025/2026</span>
    </div>


</div>

</body>
</html>
