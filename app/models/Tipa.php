<?php

class Tipa extends \Eloquent
{

    // Add your validation rules here
    public static $rules = [
        'provinsi' => 'required',
        'kota'     => 'required',
        'kattipa'  => 'required',
        'nama'     => 'required',
    ];

    // Don't forget to fill this array
    protected $fillable = ['provinsi', 'kota', 'kattipa', 'nama'];

    public function sprovinsi()
    {
        return $this->belongsTo('Provinsi', 'provinsi');
    }

}
