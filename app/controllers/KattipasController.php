<?php

class KattipasController extends \BaseController
{

    /**
     * Display a listing of kattipas
     *
     * @return Response
     */
    public function index()
    {
        $kattipas = Kattipa::all();

        return View::make('kattipas.index', compact('kattipas'))->withTitle('Kategori Titik Pantau');
    }

    /**
     * Show the form for creating a new kattipa
     *
     * @return Response
     */
    public function create()
    {
        return View::make('kattipas.create')->withTitle('Tambah Kategori Titik Pantau');
    }

    /**
     * Store a newly created kattipa in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make($data = Input::all(), Kattipa::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $kattipa = Kattipa::create($data);

        return Redirect::route('admin.kattipas.index')->with("successMessage", "Berhasil menyimpan $kattipa->nama ");
    }

    /**
     * Display the specified kattipa.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $kattipa = Kattipa::findOrFail($id);

        return View::make('kattipas.show', compact('kattipa'));
    }

    /**
     * Show the form for editing the specified kattipa.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $kattipa = Kattipa::find(Crypt::decrypt($id));

        return View::make('kattipas.edit', compact('kattipa'))->withTitle("Ubah $kattipa->nama");
    }

    /**
     * Update the specified kattipa in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $kattipa = Kattipa::findOrFail($id);

        $validator = Validator::make($data = Input::all(), Kattipa::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $kattipa->update($data);

        return Redirect::route('admin.kattipas.index')->with("successMessage", "Berhasil mengubah $kattipa->nama ");
    }

    /**
     * Remove the specified kattipa from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Kattipa::destroy($id);

        return Redirect::route('admin.kattipas.index')->with("successMessage", "Berhasil menghapus kategori titik pantau");
    }

}
