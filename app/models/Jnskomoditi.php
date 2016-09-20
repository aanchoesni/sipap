<?php

class Jnskomoditi extends \Eloquent
{

    // Add your validation rules here
    public static $rules = [
        'kode' => 'required',
        'nama' => 'required',
    ];

    // Don't forget to fill this array
    protected $fillable = ['kode', 'nama'];

}
