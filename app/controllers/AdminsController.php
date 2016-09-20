<?php

class AdminsController extends \BaseController
{

    /**
     * Display a listing of admins
     *
     * @return Response
     */
    public function index()
    {
        $admins = User::all();

        return View::make('admins.index', compact('admins'))->withTitle('User');
    }

    /**
     * Show the form for creating a new admin
     *
     * @return Response
     */
    public function create()
    {
        return View::make('admins.create')->withTitle('Tambah User');
    }

    /**
     * Store a newly created admin in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make($data = Input::all(), User::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        // Register User tanpa diaktivasi
        $user = Sentry::register(array(
            'email'      => Input::get('email'),
            'password'   => Input::get('password'),
            'first_name' => Input::get('first_name'),
            'last_name'  => Input::get('last_name'),
            'activated'  => 1,
        ), false);

        $tipe = Input::get('last_name');

        if ($tipe == 'admin') {
            // Cari grup user
            $regularGroup = Sentry::findGroupByName('admin');
        }

        if ($tipe == 'user') {
            // Cari grup user
            $regularGroup = Sentry::findGroupByName('user');
        }

        // Masukkan user ke grup user
        $user->addGroup($regularGroup);

        // Persiapkan activation code untuk dikirim ke email
        $data = [
            'email'          => $user->email,
            // Generate kode aktivasi
            'activationCode' => $user->getActivationCode(),
        ];

        return Redirect::route('admin.admins.index')->with("successMessage", "Berhasil disimpan.");
    }

    /**
     * Display the specified admin.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $admin = Admin::findOrFail($id);

        return View::make('admins.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified admin.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $admin = User::find(Crypt::decrypt($id));

        return View::make('admins.edit', compact('admin'))->withTitle("Ubah $admin->first_name");
    }

    /**
     * Update the specified admin in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $admin = User::findOrFail($id);

        $validator = Validator::make($data = Input::all(), User::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        // $data['password'] = Crypt::encrypt(Input::get('password'));
        $data['password'] = attemptResetPassword(Input::get('password'));
        $admin->update($data);

        return Redirect::route('admin.admins.index')->with("successMessage", "Berhasil mengubah $admin->first_name ");
    }

    /**
     * Remove the specified admin from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return Redirect::route('admin.admins.index')->with("successMessage", "Berhasil menghapus user");
    }

}
