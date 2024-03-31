<?php

use Illuminate\Http\UploadedFile;




function uploadImageHelper(UploadedFile $file,$path){
    $filename = uniqid() . '_' . $file->getClientOriginalName();
    $file->storeAs($path, $filename, 'images_local');
    $FilePath = '/assets/images/'.$path.'/'.$filename;
    return $FilePath;
}

function formatTanggal($tanggal_dari_database)
{
    // Konversi format tanggal dari database menjadi format timestamp UNIX
    $timestamp = strtotime($tanggal_dari_database);

    // Formatkan tanggal menggunakan strftime untuk bahasa Indonesia
    $tanggal_bulan_tahun = strftime('%d %B %Y', $timestamp);

    return $tanggal_bulan_tahun;
}
