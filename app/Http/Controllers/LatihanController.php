<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LatihanController extends Controller
{
    public function index()
    {
        // Data mata kuliah sederhana
        $matkul = [
            'Pemrograman Web Lanjut',
            'Framework Laravel', 
            'Basis Data Lanjut',
            'Proyek Perangkat Lunak',
            'Mobile Programming'
        ];
        
        // Data fitur untuk bagian yang error
        $fitur = [
            [
                'icon' => 'fas fa-laptop-code', 
                'title' => 'Belajar Online',
                'description' => 'Akses materi kapan saja dan di mana saja'
            ],
            [
                'icon' => 'fas fa-chalkboard-teacher', 
                'title' => 'Dosen Berpengalaman',
                'description' => 'Didampingi oleh dosen profesional di bidangnya'
            ],
            [
                'icon' => 'fas fa-book-open', 
                'title' => 'Materi Update',
                'description' => 'Materi selalu diperbarui sesuai perkembangan teknologi'
            ],
            [
                'icon' => 'fas fa-certificate', 
                'title' => 'Sertifikat',
                'description' => 'Dapatkan sertifikat setelah menyelesaikan pembelajaran'
            ],
            [
                'icon' => 'fas fa-users', 
                'title' => 'Komunitas',
                'description' => 'Bergabung dengan komunitas belajar yang aktif'
            ],
            [
                'icon' => 'fas fa-project-diagram', 
                'title' => 'Proyek Nyata',
                'description' => 'Belajar melalui proyek nyata dan studi kasus'
            ],
        ];
        
        // Data tambahan untuk view
        $data = [
            'nama' => 'Mahasiswa STMIK IKMI',
            'nim' => '2023123456',
            'semester' => '5',
            'prodi' => 'Teknik Informatika',
            'tahun_akademik' => '2024/2025',
            'matkul' => $matkul,
            'fitur' => $fitur,
            'welcome_message' => 'Selamat datang di Portal Akademik Mahasiswa',
            'total_sks' => 20,
            'ipk' => 3.45,
        ];
        
        // Kirim semua data ke view
        return view('welcome_mahasiswa', $data);
    }
    
    public function detail($id)
    {
        // Contoh method lain jika diperlukan
        return "Detail mahasiswa dengan ID: " . $id;
    }
}