<?php

class PenerimasController extends \BaseController
{

    /**
     * Display a listing of penerimas
     *
     * @return Response
     */
    public function index()
    {
        $penerimas = Penerima::all();

        return View::make('penerimas.index', compact('penerimas'))->withTitle('Mitra Bisnis');
    }

    /**
     * Show the form for creating a new penerima
     *
     * @return Response
     */
    public function create()
    {
        return View::make('penerimas.create')->withTitle('Tambah Mitra Bisnis');
    }

    /**
     * Store a newly created penerima in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make($data = Input::all(), Penerima::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $penerima = Penerima::create($data);

        return Redirect::route('admin.penerimas.index')->with("successMessage", "Berhasil menyimpan $penerima->nama ");
    }

    /**
     * Display the specified penerima.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $penerima = Penerima::findOrFail($id);

        return View::make('penerimas.show', compact('penerima'));
    }

    /**
     * Show the form for editing the specified penerima.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $penerima = Penerima::find(Crypt::decrypt($id));

        return View::make('penerimas.edit', compact('penerima'))->withTitle("Ubah $penerima->nama");
    }

    /**
     * Update the specified penerima in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $penerima = Penerima::findOrFail($id);

        $validator = Validator::make($data = Input::all(), Penerima::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $penerima->update($data);

        return Redirect::route('admin.penerimas.index')->with("successMessage", "Berhasil mengubah $penerima->nama ");
    }

    /**
     * Remove the specified penerima from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Penerima::destroy($id);

        return Redirect::route('admin.penerimas.index')->with("successMessage", "Berhasil menghapus mitra bisnis");
    }

}
