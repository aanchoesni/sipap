<?php

class Penerima extends \Eloquent
{

    // Add your validation rules here
    public static $rules = [
        'nama'   => 'required',
        'alamat' => 'required',
        'kota'   => 'required',
    ];

    // Don't forget to fill this array
    protected $fillable = ['nama', 'alamat', 'kota'];

}
