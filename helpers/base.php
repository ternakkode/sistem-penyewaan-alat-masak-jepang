<?php

function menu_image_link($fileName) {
    return asset('storage/'.config('url.produk_foto').$fileName);
}

function format_angka($angka)
{
    return number_format($angka, 0, "", ".") . "";
}