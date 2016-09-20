<?php

class KomoditisController extends \BaseController
{

    /**
     * Display a listing of komoditis
     *
     * @return Response
     */
    public function index()
    {
        $komoditis = Komoditi::all();

        return View::make('komoditis.index', compact('komoditis'))->withTitle('Komoditi');
    }

    /**
     * Show the form for creating a new komoditi
     *
     * @return Response
     */
    public function create()
    {
        return View::make('komoditis.create')->withTitle('Tambah Komoditi');
    }

    /**
     * Store a newly created komoditi in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make($data = Input::all(), Komoditi::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $komoditi = Komoditi::create($data);

        return Redirect::route('admin.komoditis.index')->with("successMessage", "Berhasil menyimpan $komoditi->nama ");
    }

    /**
     * Display the specified komoditi.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $komoditi = Komoditi::findOrFail($id);

        return View::make('komoditis.show', compact('komoditi'));
    }

    /**
     * Show the form for editing the specified komoditi.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $komoditi = Komoditi::find(Crypt::decrypt($id));

        return View::make('komoditis.edit', compact('komoditi'))->withTitle("Ubah $komoditi->nama");
    }

    /**
     * Update the specified komoditi in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $komoditi = Komoditi::findOrFail($id);

        $validator = Validator::make($data = Input::all(), Komoditi::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $komoditi->update($data);

        return Redirect::route('admin.komoditis.index')->with("successMessage", "Berhasil mengubah $komoditi->nama ");
    }

    /**
     * Remove the specified komoditi from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Komoditi::destroy($id);

        return Redirect::route('admin.komoditis.index')->with("successMessage", "Berhasil menghapus komoditi");
    }

}
