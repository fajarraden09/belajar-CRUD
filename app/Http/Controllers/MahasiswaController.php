<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 1. Ambil semua data dari model mahasiwa
        $mahasiswas = Mahasiswa::all(); // 'Mahasiswa' merujuk ke model

        // 2. Kirim data ke view 'mahasiswa.index'
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // fungsinya hanya untuk menampilkan view form kosong
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)// $request adalah 'keranjang' berisi data form
    {
        //1. Validadi data yang masuk
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20|unique:mahasiswas',
            'jurusan' => 'required|string|max:100',
            'email' => 'required|email|unique:mahasiswas',
        ]);

        // 2. Jika validasi lolos,  simpan data ke database
        Mahasiswa::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'jurusan' => $request->jurusan,
            'email' => $request->email,
        ]);

        // 3. Alihkan (redirect) pengguna kembali ke halaman index
        // kirim juga pesan 'success'
        return redirect()->route('mahasiswa.index')
                        ->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)// Laravel otomatis mencari mahasiswa berdasarkan ID
    {
        // Kirim data mahasiswa yang mau diedit ke view
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        // 1. Validasi (mirip dengan 'store', tapi 'unique' perlu penyesuaian)
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20|unique:mahasiswas,nim,' .$mahasiswa->id,
            'jurusan' => 'required|string|max:100',
            'email' => 'required|email|unique:mahasiswas,email,' .$mahasiswa->id,
        ]);

        // 2. jika validasi lolos, update data didatabase
        $mahasiswa->update([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'jurusan' => $request->jurusan,
            'email' => $request->email,
        ]);

        // 3. redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('mahasiswa.index')
                        ->with('success', 'Data Mahasiswa berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        // 1. Hapus data dari database
        $mahasiswa->delete();

        // 2. Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('mahasiswa.index')
                        ->with('success', 'Data mahasiswa berhasi dihapus');
    }
}
