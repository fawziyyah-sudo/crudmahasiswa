<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;

    protected $primaryKey = 'kode_mk';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'kode_mk',
        'nama_mk',
        'sks',
        'semester'
    ];

    // Relasi dengan Mahasiswa (opsional untuk tugas)
    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class, 'matakuliah', 'kode_mk');
    }
}