<?php

class TipasController extends \BaseController
{

    /**
     * Display a listing of tipas
     *
     * @return Response
     */
    public function index()
    {
        $tipas = Tipa::all();

        return View::make('tipas.index', compact('tipas'))->withTitle('Titik Pantau');
    }

    /**
     * Show the form for creating a new tipa
     *
     * @return Response
     */
    public function create()
    {
        return View::make('tipas.create')->withTitle('Tambah Titik Pantau');
    }

    /**
     * Store a newly created tipa in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make($data = Input::all(), Tipa::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $tipa = Tipa::create($data);

        return Redirect::route('admin.tipas.index')->with("successMessage", "Berhasil menyimpan $tipa->nama ");
    }

    /**
     * Display the specified tipa.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $tipa = Tipa::findOrFail($id);

        return View::make('tipas.show', compact('tipa'));
    }

    /**
     * Show the form for editing the specified tipa.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $tipa = Tipa::find(Crypt::decrypt($id));

        return View::make('tipas.edit', compact('tipa'))->withTitle('Ubah Titik Pantau');
    }

    /**
     * Update the specified tipa in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $tipa = Tipa::findOrFail($id);

        $validator = Validator::make($data = Input::all(), Tipa::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $tipa->update($data);

        return Redirect::route('admin.tipas.index')->with("successMessage", "Berhasil mengubah $tipa->nama ");
    }

    /**
     * Remove the specified tipa from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Tipa::destroy($id);

        return Redirect::route('admin.tipas.index')->with("successMessage", "Berhasil menghapus titik pantau");
    }

    public function postDatakota()
    {
        switch (Input::get('type')):
    case 'provinsi':
        $return = '<option value=""></option>';
        foreach (Kabupaten::where('id_prov', Input::get('id'))->orderBy('nama')->get() as $row) {
                $return .= "<option value='$row->nama'>$row->nama</option>";
        }

        return $return;
        break;
        endswitch;
    }

}
