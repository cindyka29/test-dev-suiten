@extends('layouts.app')

@section('title', 'Tambah Data Pegawai')

@section('content')
<div class="card">
    <div class="card-body">

        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="mb-0">Tambah Data Pegawai</h5>
            <div class="d-flex gap-2">
                <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Batal</a>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmModal">
                    Simpan
                </button>
            </div>
        </div>

        
        <form id="formPegawai" action="{{ route('pegawai.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label>Nama Pegawai</label>
                    <input type="text" name="nama" class="form-control">

                    <label>Bagian</label>
                    <input type="text" name="bagian" class="form-control">

                    <label>Nomor Telepon</label>
                    <input type="text" name="nomor_telepon" class="form-control">

                    <label>Nomor Rekening</label>
                    <input type="text" name="nomor_rekening" class="form-control">

                    <label>Nama Rekening</label>
                    <input type="text" name="nama_rekening" class="form-control">

                    <label>Bank</label>
                    <input type="text" name="bank" class="form-control">

                    <label>Shift</label>
                    <input type="text" name="shift" class="form-control">
                </div>

                <div class="col-md-6">
                    <label>Gaji Pokok</label>
                    <input type="number" step="0.01" name="gaji_pokok" class="form-control">

                    <label>Periode Gajian</label>
                    <select name="periode_gajian" class="form-control">
                        <option value="2 Minggu">2 Minggu</option>
                        <option value="1 Bulan">1 Bulan</option>
                    </select>

                    <label>Gaji Harian</label>
                    <input type="number" step="0.01" name="gaji_harian" class="form-control">

                    <label>Uang Makan</label>
                    <input type="number" step="0.01" name="uang_makan" class="form-control">

                    <label>Uang Makan (tanggal merah)</label>
                    <input type="number" step="0.01" name="uang_makan_merah" class="form-control">

                    <label>Rate Lembur</label>
                    <input type="number" step="0.01" name="rate_lembur" class="form-control">

                    <label>Rate Lembur (tanggal merah)</label>
                    <input type="number" step="0.01" name="rate_lembur_merah" class="form-control">
                </div>
            </div>
        </form>

        
        <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Simpan Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Anda akan menyimpan data yang sudah dibuat kedalam aplikasi ini.
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-primary" onclick="document.getElementById('formPegawai').submit();">Iya</button>
              </div>
            </div>
          </div>
        </div>

    </div>
</div>
@endsection
