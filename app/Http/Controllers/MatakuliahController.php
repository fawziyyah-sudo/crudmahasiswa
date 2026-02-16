<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matakuliahs = Matakuliah::paginate(10);
        return view('matakuliah.index', compact('matakuliahs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('matakuliah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $validator = Validator::make($request->all(), [
            'kode_mk' => 'required|unique:matakuliahs,kode_mk|max:10',
            'nama_mk' => 'required|max:100',
            'sks' => 'required|integer|min:1|max:6',
            'semester' => 'required|integer|min:1|max:8',
        ], [
            'kode_mk.required' => 'Kode Mata Kuliah harus diisi!',
            'kode_mk.unique' => 'Kode Mata Kuliah sudah terdaftar!',
            'kode_mk.max' => 'Kode Mata Kuliah maksimal 10 karakter!',
            'nama_mk.required' => 'Nama Mata Kuliah harus diisi!',
            'nama_mk.max' => 'Nama Mata Kuliah maksimal 100 karakter!',
            'sks.required' => 'SKS harus diisi!',
            'sks.integer' => 'SKS harus berupa angka!',
            'sks.min' => 'SKS minimal 1!',
            'sks.max' => 'SKS maksimal 6!',
            'semester.required' => 'Semester harus diisi!',
            'semester.integer' => 'Semester harus berupa angka!',
            'semester.min' => 'Semester minimal 1!',
            'semester.max' => 'Semester maksimal 8!',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Matakuliah::create($request->all());

        return redirect()->route('matakuliah.index')
            ->with('success', 'Data mata kuliah berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $kode_mk)
    {
        $matakuliah = Matakuliah::findOrFail($kode_mk);
        return view('matakuliah.show', compact('matakuliah'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $kode_mk)
    {
        $matakuliah = Matakuliah::findOrFail($kode_mk);
        return view('matakuliah.edit', compact('matakuliah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $kode_mk)
    {
        // Validasi data
        $validator = Validator::make($request->all(), [
            'nama_mk' => 'required|max:100',
            'sks' => 'required|integer|min:1|max:6',
            'semester' => 'required|integer|min:1|max:8',
        ], [
            'nama_mk.required' => 'Nama Mata Kuliah harus diisi!',
            'nama_mk.max' => 'Nama Mata Kuliah maksimal 100 karakter!',
            'sks.required' => 'SKS harus diisi!',
            'sks.integer' => 'SKS harus berupa angka!',
            'sks.min' => 'SKS minimal 1!',
            'sks.max' => 'SKS maksimal 6!',
            'semester.required' => 'Semester harus diisi!',
            'semester.integer' => 'Semester harus berupa angka!',
            'semester.min' => 'Semester minimal 1!',
            'semester.max' => 'Semester maksimal 8!',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $matakuliah = Matakuliah::findOrFail($kode_mk);
        $matakuliah->update([
            'nama_mk' => $request->nama_mk,
            'sks' => $request->sks,
            'semester' => $request->semester,
        ]);

        return redirect()->route('matakuliah.index')
            ->with('success', 'Data mata kuliah berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $kode_mk)
    {
        try {
            $matakuliah = Matakuliah::findOrFail($kode_mk);
            $matakuliah->delete();

            return redirect()->route('matakuliah.index')
                ->with('success', 'Data mata kuliah berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('matakuliah.index')
                ->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }

    /**
     * Search data mata kuliah
     */
    public function search(Request $request)
    {
        $keyword = $request->search;
        
        $matakuliahs = Matakuliah::where('kode_mk', 'like', "%" . $keyword . "%")
            ->orWhere('nama_mk', 'like', "%" . $keyword . "%")
            ->orWhere('sks', 'like', "%" . $keyword . "%")
            ->orWhere('semester', 'like', "%" . $keyword . "%")
            ->paginate(10);

        $matakuliahs->appends(['search' => $keyword]);

        return view('matakuliah.index', compact('matakuliahs'));
    }
}