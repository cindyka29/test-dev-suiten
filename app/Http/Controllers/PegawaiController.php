<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawais = Pegawai::paginate(10);
        return view('pegawai.index', compact('pegawais'));
    }

    public function create()
    {
        return view('pegawai.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'bagian' => 'required',
            'nomor_telepon' => 'required',
            'nomor_rekening' => 'required',
            'nama_rekening' => 'required',
            'bank' => 'required',
            'shift' => 'required',
            'gaji_pokok' => 'required|numeric',
            'periode_gajian' => 'required',
            'gaji_harian' => 'required|numeric',
            'uang_makan' => 'required|numeric',
            'uang_makan_merah' => 'required|numeric',
            'rate_lembur' => 'required|numeric',
            'rate_lembur_merah' => 'required|numeric',
        ]);

        Pegawai::create($request->all());

        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil ditambahkan.');
    }

    public function edit(Pegawai $pegawai)
    {
        return view('pegawai.edit', compact('pegawai'));
    }

    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate([
            'nama' => 'required',
            'bagian' => 'required',
            'nomor_telepon' => 'required',
            'nomor_rekening' => 'required',
            'nama_rekening' => 'required',
            'bank' => 'required',
            'shift' => 'required',
            'gaji_pokok' => 'required|numeric',
            'periode_gajian' => 'required',
            'gaji_harian' => 'required|numeric',
            'uang_makan' => 'required|numeric',
            'uang_makan_merah' => 'required|numeric',
            'rate_lembur' => 'required|numeric',
            'rate_lembur_merah' => 'required|numeric',
        ]);

        $pegawai->update($request->all());

        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil diperbarui.');
    }

    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil dihapus.');
    }
}
