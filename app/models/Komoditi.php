<?php

class Komoditi extends \Eloquent
{

    // Add your validation rules here
    public static $rules = [
        'kode'  => 'required',
        'jenis' => 'required',
        'nama'  => 'required',
    ];

    // Don't forget to fill this array
    protected $fillable = ['kode', 'jenis', 'nama'];

}
