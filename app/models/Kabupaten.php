<?php

class Kabupaten extends \Eloquent
{
    protected $table = 'kabupaten';
    // Add your validation rules here
    public static $rules = [
        'nama' => 'required',
    ];

    // Don't forget to fill this array
    protected $fillable = ['id_prov', 'nama'];

    public function provinsi()
    {
        return $this->belongsTo('Provinsi', 'id_prov');
    }
}
