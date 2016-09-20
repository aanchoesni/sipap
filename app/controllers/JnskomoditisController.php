<?php

class JnskomoditisController extends \BaseController
{

    /**
     * Display a listing of jnskomoditis
     *
     * @return Response
     */
    public function index()
    {
        $jnskomoditis = Jnskomoditi::orderby('kode', 'ASC')->get();

        return View::make('jnskomoditis.index', compact('jnskomoditis'))->withTitle('Jenis Komoditi');
    }

    /**
     * Show the form for creating a new jnskomoditi
     *
     * @return Response
     */
    public function create()
    {
        return View::make('jnskomoditis.create')->withTitle('Tambah Jenis Komoditi');
    }

    /**
     * Store a newly created jnskomoditi in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make($data = Input::all(), Jnskomoditi::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $jnskomoditi = Jnskomoditi::create($data);

        return Redirect::route('admin.jnskomoditis.index')->with("successMessage", "Berhasil menyimpan $jnskomoditi->nama ");
    }

    /**
     * Display the specified jnskomoditi.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $jnskomoditi = Jnskomoditi::findOrFail($id);

        return View::make('admin.jnskomoditis.show', compact('jnskomoditi'));
    }

    /**
     * Show the form for editing the specified jnskomoditi.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $jnskomoditi = Jnskomoditi::find(Crypt::decrypt($id));

        return View::make('jnskomoditis.edit', compact('jnskomoditi'))->withTitle("Ubah $jnskomoditi->nama");
    }

    /**
     * Update the specified jnskomoditi in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $jnskomoditi = Jnskomoditi::findOrFail($id);

        $validator = Validator::make($data = Input::all(), Jnskomoditi::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $jnskomoditi->update($data);

        return Redirect::route('admin.jnskomoditis.index')->with("successMessage", "Berhasil mengubah $jnskomoditi->nama ");
    }

    /**
     * Remove the specified jnskomoditi from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Jnskomoditi::destroy($id);

        return Redirect::route('admin.jnskomoditis.index')->with("successMessage", "Berhasil menghapus jenis komoditi");
    }

}
