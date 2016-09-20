<?php

class User extends BaseModel
{

    // protected $table = 'users'; //mengambil nama tabel yang tidak sama dengan nama model
    // Add your validation rules here
    public static $rules = [
        // 'title' => 'required'
        'first_name' => 'required',
        'email'      => 'required|email:users,email,:id',
        'password'   => 'confirmed|required|min:5',
    ];

    // Don't forget to fill this array
    protected $fillable = ['first_name', 'last_name', 'email', 'password', 'activated'];
}
