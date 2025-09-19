<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    // Sesuaikan dengan tabel di database
    protected $table = 'pegawais';

    // Field yang bisa diisi
    protected $fillable = [
        'nama',
        'bagian',
        'nomor_telepon',
        'nomor_rekening',
        'nama_rekening',
        'bank',
        'shift',
        'gaji_pokok',
        'periode_gajian',
        'gaji_harian',
        'uang_makan',
        'uang_makan_merah',
        'rate_lembur',
        'rate_lembur_merah',
    ];
}
