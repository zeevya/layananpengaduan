<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pengaduan;
use App\Models\Divisi;
use App\Models\KategoriPengaduan;

class PengaduanController extends Controller
{
    public function create()
    {
        $divisi = Divisi::all(); // Ambil semua data divisi
        $kategori = KategoriPengaduan::all(); // Ambil semua kategori dari database
        return view('form_pengaduan', compact('divisi', 'kategori'));
    }
    
    

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_user' => 'required|integer',
            'id_divisi' => 'required|integer',
            'id_kategori' => 'required|integer',
            'id_status' => 'required|integer',
            'nama_pengadu' => 'required|string|max:255',
            'tanggal_lahir_pengadu' => 'required|date',
            'alamat_pengadu' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'tanggal_pengaduan' => 'required|date',
            'deskripsi' => 'required|string',
            'status' => 'required|integer',
        ]);

        // Simpan data ke database
        Pengaduan::create([
            'id_user' => $request->id_user,
            'id_divisi' => $request->id_divisi,
            'id_kategori' => $request->id_kategori,
            'id_status' => $request->id_status,
            'nama_pengadu' => $request->nama_pengadu,
            'tanggal_lahir_pengadu' => $request->tanggal_lahir_pengadu,
            'alamat_pengadu' => $request->alamat_pengadu,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_pengaduan' => $request->tanggal_pengaduan,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
        ]);

        

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Pengaduan berhasil disimpan!');
    }
}