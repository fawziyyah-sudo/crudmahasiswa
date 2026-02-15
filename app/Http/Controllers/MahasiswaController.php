<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Menggunakan pagination untuk menghindari error links()
        $mahasiswas = Mahasiswa::paginate(10);
        
        // Menampilkan view index dengan data mahasiswa
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Menampilkan form tambah data mahasiswa
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi data input
        $validator = Validator::make($request->all(), [
            'nim' => 'required|unique:mahasiswas,nim|max:20',
            'nama' => 'required|max:100',
            'kelas' => 'required|max:50',
            'matakuliah' => 'required|max:100',
        ], [
            'nim.required' => 'NIM harus diisi!',
            'nim.unique' => 'NIM sudah terdaftar!',
            'nim.max' => 'NIM maksimal 20 karakter!',
            'nama.required' => 'Nama harus diisi!',
            'nama.max' => 'Nama maksimal 100 karakter!',
            'kelas.required' => 'Kelas harus diisi!',
            'kelas.max' => 'Kelas maksimal 50 karakter!',
            'matakuliah.required' => 'Mata Kuliah harus diisi!',
            'matakuliah.max' => 'Mata Kuliah maksimal 100 karakter!',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Simpan data ke database
        Mahasiswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'matakuliah' => $request->matakuliah,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     * 
     * @param  string  $nim
     * @return \Illuminate\Http\Response
     */
    public function show(string $nim)
    {
        // Mencari data mahasiswa berdasarkan NIM
        $mahasiswa = Mahasiswa::findOrFail($nim);
        
        // Menampilkan detail mahasiswa
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param  string  $nim
     * @return \Illuminate\Http\Response
     */
    public function edit(string $nim)
    {
        // Mencari data mahasiswa berdasarkan NIM
        $mahasiswa = Mahasiswa::findOrFail($nim);
        
        // Menampilkan form edit
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $nim
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $nim)
    {
        // Validasi data input
        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:100',
            'kelas' => 'required|max:50',
            'matakuliah' => 'required|max:100',
        ], [
            'nama.required' => 'Nama harus diisi!',
            'nama.max' => 'Nama maksimal 100 karakter!',
            'kelas.required' => 'Kelas harus diisi!',
            'kelas.max' => 'Kelas maksimal 50 karakter!',
            'matakuliah.required' => 'Mata Kuliah harus diisi!',
            'matakuliah.max' => 'Mata Kuliah maksimal 100 karakter!',
        ]);

        // Hapus validasi NIM karena NIM tidak boleh diubah

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Cari data mahasiswa dan update
        $mahasiswa = Mahasiswa::findOrFail($nim);
        $mahasiswa->update([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'matakuliah' => $request->matakuliah,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param  string  $nim
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $nim)
    {
        try {
            // Cari data mahasiswa dan hapus
            $mahasiswa = Mahasiswa::findOrFail($nim);
            $mahasiswa->delete();

            // Redirect dengan pesan sukses
            return redirect()->route('mahasiswa.index')
                ->with('success', 'Data mahasiswa berhasil dihapus!');
                
        } catch (\Exception $e) {
            // Jika terjadi error
            return redirect()->route('mahasiswa.index')
                ->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }

    /**
     * Search data mahasiswa
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $keyword = $request->search;
        
        // Gunakan pagination juga untuk search
        $mahasiswas = Mahasiswa::where('nim', 'like', "%" . $keyword . "%")
            ->orWhere('nama', 'like', "%" . $keyword . "%")
            ->orWhere('kelas', 'like', "%" . $keyword . "%")
            ->orWhere('matakuliah', 'like', "%" . $keyword . "%")
            ->paginate(10);

        // Pertahankan keyword di pagination links
        $mahasiswas->appends(['search' => $keyword]);

        return view('mahasiswa.index', compact('mahasiswas'));
    }
}