<?php

class Provinsi extends \Eloquent
{
    protected $table = 'provinsi';
    // Add your validation rules here
    public static $rules = [
        'nama' => 'required',
    ];

    // Don't forget to fill this array
    protected $fillable = ['nama'];

    public function kabupaten()
    {
        return $this->hasMany('Kabupaten', 'id_prov');
    }

    public function tipa()
    {
        return $this->hasMany('Tipa', 'provinsi');
    }

}
