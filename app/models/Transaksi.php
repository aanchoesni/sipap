<?php

class Transaksi extends \Eloquent
{

    // Add your validation rules here
    public static $rules = [
        // 'title' => 'required'
    ];

    // Don't forget to fill this array
    protected $fillable = ['komoditi', 'asal', 'tujuan', 'aktifitas', 'quantity', 'satuan', 'jenisk', 'asalk', 'nilai', 'titikpantau', 'angkutan', 'waktuber', 'waktutiba', 'penerima', 'pelayaran', 'iuser'];

}
