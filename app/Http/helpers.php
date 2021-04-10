<?php
use App\Berita;
use App\Galeri;
use App\Mitra;
use App\Dokumen;
function sumBerita()
{
    $sumBerita = Berita::count();
    return $sumBerita;
}

function sumGaleri()
{
    $sumGaleri = Galeri::count();
    return $sumGaleri;
}

function sumMitra()
{
    $sumMitra = Mitra::count();
    return $sumMitra;
}

function sumDokumen()
{
    $sumDokumen = Dokumen::count();
    return $sumDokumen;
}



