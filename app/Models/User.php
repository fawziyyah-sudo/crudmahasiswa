<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $pageTitle = 'Portal Akademik STMIK KMU';
        $moduleTitle = 'Modul 1: Laravel 12';
        $subtitle = 'Pengembangan Web Kontemporer Menggunakan Framework Laravel Terkini';
        
        $features = [
            [
                'title' => 'Performa Teroptimasi',
                'description' => 'Laravel 12 menghadirkan peningkatan signifikan dalam hal kinerja platform pengembangan perangkat lunak dan aplikasi web.'
            ],
            [
                'title' => 'Arsitektur Kode yang Terstruktur',
                'description' => 'Kerangka kerja yang mengintegrasikan pola desain modern dengan penataan kode yang rapi dan mudah dipelihara.'
            ],
            [
                'title' => 'Pendekatan Kontemporer',
                'description' => 'Memanfaatkan perangkat lunak mutakhir untuk pengoptimalan performa dan pengalaman pengguna.'
            ]
        ];

        $technologies = [
            'Laravel 12',
            'Tailwind CSS',
            'MySQL',
            'RESTful API',
            'Git Version Control'
        ];

        return view('welcome', compact(
            'pageTitle',
            'moduleTitle',
            'subtitle',
            'features',
            'technologies'
        ));
    }
}