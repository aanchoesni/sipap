<?php

class PelayaransController extends \BaseController
{

    /**
     * Display a listing of pelayarans
     *
     * @return Response
     */
    public function index()
    {
        $pelayarans = Pelayaran::all();

        return View::make('pelayarans.index', compact('pelayarans'))->withTitle('Mitra Pelayaran');
    }

    /**
     * Show the form for creating a new pelayaran
     *
     * @return Response
     */
    public function create()
    {
        return View::make('pelayarans.create')->withTitle('Tambah Mitra Pelayaran');
    }

    /**
     * Store a newly created pelayaran in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make($data = Input::all(), Pelayaran::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $pelayaran = Pelayaran::create($data);

        return Redirect::route('admin.pelayarans.index')->with("successMessage", "Berhasil menyimpan $pelayaran->nama ");
    }

    /**
     * Display the specified pelayaran.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $pelayaran = Pelayaran::findOrFail($id);

        return View::make('pelayarans.show', compact('pelayaran'));
    }

    /**
     * Show the form for editing the specified pelayaran.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $pelayaran = Pelayaran::find(Crypt::decrypt($id));

        return View::make('pelayarans.edit', compact('pelayaran'))->withTitle("Ubah $pelayaran->nama");
    }

    /**
     * Update the specified pelayaran in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $pelayaran = Pelayaran::findOrFail($id);

        $validator = Validator::make($data = Input::all(), Pelayaran::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $pelayaran->update($data);

        return Redirect::route('admin.pelayarans.index')->with("successMessage", "Berhasil mengubah $pelayaran->nama ");
    }

    /**
     * Remove the specified pelayaran from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Pelayaran::destroy($id);

        return Redirect::route('admin.pelayarans.index')->with("successMessage", "Berhasil menghapus mitra pelayaran");
    }

}
