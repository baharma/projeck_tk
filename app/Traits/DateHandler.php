<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;

trait DateHandler
{

    public function formatTanggal($tanggal_dari_database)
    {
        $namaBulan = [
            '', // Bulan 0 tidak digunakan
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];
        // Konversi format tanggal dari database menjadi format timestamp UNIX
        $timestamp = strtotime($tanggal_dari_database);

        // Mendapatkan nilai bulan dari timestamp
        $bulan = date('n', $timestamp);

        // Mendapatkan nama bulan dari array
        $nama_bulan = $namaBulan[$bulan];

        // Formatkan tanggal
        $tanggal_bulan_tahun = date('d', $timestamp) . ' ' . $nama_bulan . ' ' . date('Y', $timestamp);

        return $tanggal_bulan_tahun;
    }

}
