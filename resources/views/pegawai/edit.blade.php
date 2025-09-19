@extends('layouts.app')

@section('title', 'Edit Data Pegawai')

@section('content')
<div class="card">
    <div class="card-body">
        <h5>Edit Data Pegawai</h5>

        <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <label>Nama Pegawai</label>
                    <input type="text" name="nama" class="form-control" value="{{ $pegawai->nama }}">

                    <label>Bagian</label>
                    <input type="text" name="bagian" class="form-control" value="{{ $pegawai->bagian }}">

                    <label>Nomor Telepon</label>
                    <input type="text" name="nomor_telepon" class="form-control" value="{{ $pegawai->nomor_telepon }}">

                    <label>Nomor Rekening</label>
                    <input type="text" name="nomor_rekening" class="form-control" value="{{ $pegawai->nomor_rekening }}">

                    <label>Nama Rekening</label>
                    <input type="text" name="nama_rekening" class="form-control" value="{{ $pegawai->nama_rekening }}">

                    <label>Bank</label>
                    <input type="text" name="bank" class="form-control" value="{{ $pegawai->bank }}">

                    <label>Shift</label>
                    <input type="text" name="shift" class="form-control" value="{{ $pegawai->shift }}">
                </div>

                <div class="col-md-6">
                    <label>Gaji Pokok</label>
                    <input type="number" step="0.01" name="gaji_pokok" class="form-control" value="{{ $pegawai->gaji_pokok }}">

                    <label>Periode Gajian</label>
                    <select name="periode_gajian" class="form-control">
                        <option value="2 Minggu" {{ $pegawai->periode_gajian == '2 Minggu' ? 'selected' : '' }}>2 Minggu</option>
                        <option value="1 Bulan" {{ $pegawai->periode_gajian == '1 Bulan' ? 'selected' : '' }}>1 Bulan</option>
                    </select>

                    <label>Gaji Harian</label>
                    <input type="number" step="0.01" name="gaji_harian" class="form-control" value="{{ $pegawai->gaji_harian }}">

                    <label>Uang Makan</label>
                    <input type="number" step="0.01" name="uang_makan" class="form-control" value="{{ $pegawai->uang_makan }}">

                    <label>Uang Makan (tanggal merah)</label>
                    <input type="number" step="0.01" name="uang_makan_merah" class="form-control" value="{{ $pegawai->uang_makan_merah }}">

                    <label>Rate Lembur</label>
                    <input type="number" step="0.01" name="rate_lembur" class="form-control" value="{{ $pegawai->rate_lembur }}">

                    <label>Rate Lembur (tanggal merah)</label>
                    <input type="number" step="0.01" name="rate_lembur_merah" class="form-control" value="{{ $pegawai->rate_lembur_merah }}">
                </div>
            </div>

            <div class="mt-3">
                <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
