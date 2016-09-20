<?php

class Kattipa extends \Eloquent
{

    // Add your validation rules here
    public static $rules = [
        'nama' => 'required',
    ];

    // Don't forget to fill this array
    protected $fillable = ['nama'];

}
