<?php

class TransaksisController extends \BaseController
{

    /**
     * Display a listing of transaksis
     *
     * @return Response
     */
    public function index()
    {
        if (Sentry::getUser()->hasPermission('admin')) {
            $transaksis = Transaksi::all();
        }
        if (Sentry::getUser()->hasPermission('user')) {
            $transaksis = Transaksi::where('iuser', Sentry::getUser()->id)->get();
        }
        return View::make('transaksis.index', compact('transaksis'))->withTitle('Transaksi');
    }

    public function cari()
    {
        $aktifitas = Input::get('aktifitas');
        $bulan     = Input::get('bulan');
        $tahun     = Input::get('tahun');
        $provinsi  = Input::get('provinsi');
        $triwulan  = Input::get('triwulan');
        $tipe      = Input::get('tipe');
        $komoditi  = Input::get('komoditi');

        if ($tipe == 'a') {
            if ($aktifitas == 'BONGKAR') {
                $transaksi = new Transaksi;
                $transaksi = $transaksi->where('aktifitas', 'BONGKAR');
                if ($bulan != null) {
                    $transaksi = $transaksi->where(DB::raw('MONTH(waktutiba)'), [$bulan]);
                }
                if ($tahun != null) {
                    $transaksi = $transaksi->where(DB::raw('YEAR(waktutiba)'), [$tahun]);
                }
                if ($provinsi != null) {
                    $transaksi = $transaksi->where('asal', $provinsi);
                }
                if ($komoditi != null) {
                    $transaksi = $transaksi->where('komoditi', $komoditi);
                }
                $transaksis = $transaksi->get();
                // dd($transaksis);
                // dd(DB::getQueryLog());
            }

            if ($aktifitas == 'MUAT') {
                $transaksi = new Transaksi;
                $transaksi = $transaksi->where('aktifitas', 'MUAT');
                if ($bulan != null) {
                    $transaksi = $transaksi->where(DB::raw('MONTH(waktuber)'), [$bulan]);
                }
                if ($tahun != null) {
                    $transaksi = $transaksi->where(DB::raw('YEAR(waktuber)'), [$tahun]);
                }
                if ($provinsi != null) {
                    $transaksi = $transaksi->where('tujuan', $provinsi);
                }
                if ($komoditi != null) {
                    $transaksi = $transaksi->where('komoditi', $komoditi);
                }
                $transaksis = $transaksi->get();
                // dd($transaksis);
                // dd(DB::getQueryLog());
            }
            // $aktifitas = Input::get('aktifitas');
            return View::make('transaksis.cari', compact('transaksis'))
                ->with('aktifitas', $aktifitas)
                ->with('bulan', $bulan)
                ->with('tahun', $tahun)
                ->with('provinsi', $provinsi)
                ->with('triwulan', $triwulan)
                ->with('komoditi', $komoditi)
                ->with('tipe', $tipe)
                ->withTitle('Transaksi');
        } else if ($tipe == 'b') {
            if ($triwulan == 'Triwulan I') {
                $bln1      = '01';
                $bln2      = '03';
                $triwulans = Input::get('triwulan');
            } else if ($triwulan == 'Triwulan II') {
                $bln1      = '04';
                $bln2      = '06';
                $triwulans = Input::get('triwulan');
            } else if ($triwulan == 'Triwulan III') {
                $bln1      = '07';
                $bln2      = '09';
                $triwulans = Input::get('triwulan');
            } else if ($triwulan == 'Triwulan IV') {
                $bln1      = '10';
                $bln2      = '12';
                $triwulans = Input::get('triwulan');
            }

            if ($aktifitas == 'BONGKAR') {
                $transaksi = new Transaksi;
                $transaksi = $transaksi->where('aktifitas', 'BONGKAR');
                if ($triwulan != null) {
                    $transaksi = $transaksi->whereBetween(DB::raw('MONTH(waktutiba)'), [$bln1, $bln2]);
                }
                if ($tahun != null) {
                    $transaksi = $transaksi->where(DB::raw('YEAR(waktutiba)'), [$tahun]);
                }
                if ($provinsi != null) {
                    $transaksi = $transaksi->where('asal', $provinsi);
                }
                if ($komoditi != null) {
                    $transaksi = $transaksi->where('komoditi', $komoditi);
                }
                $transaksis = $transaksi->get();
                // dd($transaksis);
                // dd(DB::getQueryLog());
            }

            if ($aktifitas == 'MUAT') {
                $transaksi = new Transaksi;
                $transaksi = $transaksi->where('aktifitas', 'MUAT');
                if ($triwulan != null) {
                    $transaksi = $transaksi->whereBetween(DB::raw('MONTH(waktuber)'), [$bln1, $bln2]);
                }
                if ($tahun != null) {
                    $transaksi = $transaksi->where(DB::raw('YEAR(waktuber)'), [$tahun]);
                }
                if ($provinsi != null) {
                    $transaksi = $transaksi->where('tujuan', $provinsi);
                }
                if ($komoditi != null) {
                    $transaksi = $transaksi->where('komoditi', $komoditi);
                }
                $transaksis = $transaksi->get();
                // dd($transaksis);
                // dd(DB::getQueryLog());
            }

            return View::make('transaksis.cari', compact('transaksis'))
                ->with('aktifitas', $aktifitas)
                ->with('bulan', $bulan)
                ->with('tahun', $tahun)
                ->with('provinsi', $provinsi)
                ->with('komoditi', $komoditi)
                ->with('triwulan', $triwulan)
                ->with('tipe', $tipe)
                ->withTitle('Transaksi');
        } else if ($tipe == 'c') {
            $transaksis = Transaksi::all();

            return View::make('transaksis.index', compact('transaksis'))->withTitle('Transaksi');
        }

        // $transaksis = Transaksi::where('aktifitas', $aktifitas)
        //     ->where(DB::raw('MONTH(created_at)'), [$bulan])
        //     ->where(DB::raw('YEAR(created_at)'), [$tahun])
        //     ->where('asal', $asal)
        //     ->where('tujuan', $tujuan)
        //     ->whereBetween(DB::raw('MONTH(created_at)'), [$bln1, $bln2])
        //     ->get();
        // dd(DB::getQueryLog());
    }

    public function cariuser()
    {
        $aktifitas = Input::get('aktifitas');
        $bulan     = Input::get('bulan');
        $tahun     = Input::get('tahun');
        $provinsi  = Input::get('provinsi');
        $triwulan  = Input::get('triwulan');
        $tipe      = Input::get('tipe');
        $komoditi  = Input::get('komoditi');

        if ($tipe == 'a') {
            if ($aktifitas == 'BONGKAR') {
                $transaksi = new Transaksi;
                $transaksi = $transaksi->where('aktifitas', 'BONGKAR');
                if ($bulan != null) {
                    $transaksi = $transaksi->where(DB::raw('MONTH(waktutiba)'), [$bulan]);
                }
                if ($tahun != null) {
                    $transaksi = $transaksi->where(DB::raw('YEAR(waktutiba)'), [$tahun]);
                }
                if ($provinsi != null) {
                    $transaksi = $transaksi->where('asal', $provinsi);
                }
                if ($komoditi != null) {
                    $transaksi = $transaksi->where('komoditi', $komoditi);
                }
                $transaksis = $transaksi->where('iuser', Sentry::getUser()->id)->get();
                // dd($transaksis);
                // dd(DB::getQueryLog());
            }

            if ($aktifitas == 'MUAT') {
                $transaksi = new Transaksi;
                $transaksi = $transaksi->where('aktifitas', 'MUAT');
                if ($bulan != null) {
                    $transaksi = $transaksi->where(DB::raw('MONTH(waktuber)'), [$bulan]);
                }
                if ($tahun != null) {
                    $transaksi = $transaksi->where(DB::raw('YEAR(waktuber)'), [$tahun]);
                }
                if ($provinsi != null) {
                    $transaksi = $transaksi->where('tujuan', $provinsi);
                }
                if ($komoditi != null) {
                    $transaksi = $transaksi->where('komoditi', $komoditi);
                }
                $transaksis = $transaksi->where('iuser', Sentry::getUser()->id)->get();
                // dd($transaksis);
                // dd(DB::getQueryLog());
            }
            // $aktifitas = Input::get('aktifitas');
            return View::make('transaksis.cari', compact('transaksis'))
                ->with('aktifitas', $aktifitas)
                ->with('bulan', $bulan)
                ->with('tahun', $tahun)
                ->with('provinsi', $provinsi)
                ->with('triwulan', $triwulan)
                ->with('komoditi', $komoditi)
                ->with('tipe', $tipe)
                ->withTitle('Transaksi');
        } else if ($tipe == 'b') {
            if ($triwulan == 'Triwulan I') {
                $bln1      = '01';
                $bln2      = '03';
                $triwulans = Input::get('triwulan');
            } else if ($triwulan == 'Triwulan II') {
                $bln1      = '04';
                $bln2      = '06';
                $triwulans = Input::get('triwulan');
            } else if ($triwulan == 'Triwulan III') {
                $bln1      = '07';
                $bln2      = '09';
                $triwulans = Input::get('triwulan');
            } else if ($triwulan == 'Triwulan IV') {
                $bln1      = '10';
                $bln2      = '12';
                $triwulans = Input::get('triwulan');
            }

            if ($aktifitas == 'BONGKAR') {
                $transaksi = new Transaksi;
                $transaksi = $transaksi->where('aktifitas', 'BONGKAR');
                if ($triwulan != null) {
                    $transaksi = $transaksi->whereBetween(DB::raw('MONTH(waktutiba)'), [$bln1, $bln2]);
                }
                if ($tahun != null) {
                    $transaksi = $transaksi->where(DB::raw('YEAR(waktutiba)'), [$tahun]);
                }
                if ($provinsi != null) {
                    $transaksi = $transaksi->where('asal', $provinsi);
                }
                if ($komoditi != null) {
                    $transaksi = $transaksi->where('komoditi', $komoditi);
                }
                $transaksis = $transaksi->where('iuser', Sentry::getUser()->id)->get();
                // dd($transaksis);
                // dd(DB::getQueryLog());
            }

            if ($aktifitas == 'MUAT') {
                $transaksi = new Transaksi;
                $transaksi = $transaksi->where('aktifitas', 'MUAT');
                if ($triwulan != null) {
                    $transaksi = $transaksi->whereBetween(DB::raw('MONTH(waktuber)'), [$bln1, $bln2]);
                }
                if ($tahun != null) {
                    $transaksi = $transaksi->where(DB::raw('YEAR(waktuber)'), [$tahun]);
                }
                if ($provinsi != null) {
                    $transaksi = $transaksi->where('tujuan', $provinsi);
                }
                if ($komoditi != null) {
                    $transaksi = $transaksi->where('komoditi', $komoditi);
                }
                $transaksis = $transaksi->where('iuser', Sentry::getUser()->id)->get();
                // dd($transaksis);
                // dd(DB::getQueryLog());
            }

            return View::make('transaksis.cari', compact('transaksis'))
                ->with('aktifitas', $aktifitas)
                ->with('bulan', $bulan)
                ->with('tahun', $tahun)
                ->with('provinsi', $provinsi)
                ->with('komoditi', $komoditi)
                ->with('triwulan', $triwulan)
                ->with('tipe', $tipe)
                ->withTitle('Transaksi');
        } else if ($tipe == 'c' or $tipe == '') {
            $transaksis = Transaksi::where('iuser', Sentry::getUser()->id)->get();

            return View::make('transaksis.index', compact('transaksis'))->withTitle('Transaksi');
        }

        // $transaksis = Transaksi::where('aktifitas', $aktifitas)
        //     ->where(DB::raw('MONTH(created_at)'), [$bulan])
        //     ->where(DB::raw('YEAR(created_at)'), [$tahun])
        //     ->where('asal', $asal)
        //     ->where('tujuan', $tujuan)
        //     ->whereBetween(DB::raw('MONTH(created_at)'), [$bln1, $bln2])
        //     ->get();
        // dd(DB::getQueryLog());
    }

    /**
     * Show the form for creating a new transaksi
     *
     * @return Response
     */
    public function create()
    {
        return View::make('transaksis.create')->withTitle('Tambah Transaksi');
    }

    public function import()
    {
        return View::make('transaksis.import')->withTitle('Import Excel Transaksi');
    }

    /**
     * Store a newly created transaksi in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make($data = Input::all(), Transaksi::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $data['iuser'] = Sentry::getUser()->id;
        Transaksi::create($data);

        return Redirect::route('admin.transaksis.index')->with("successMessage", "Berhasil menambahkan data");
    }

    public function excelstore()
    {
        $date = \Carbon\Carbon::now();
        try
        {
            Excel::load(Input::file('importexcel'), function ($reader) {
                foreach ($reader->toObject() as $row) {
                    $transaksis              = new Transaksi;
                    $transaksis->komoditi    = $row->komoditi;
                    $transaksis->asal        = $row->provinsi_asal;
                    $transaksis->tujuan      = $row->provinsi_tujuan;
                    $transaksis->aktifitas   = $row->aktifitas;
                    $transaksis->quantity    = $row->quantity;
                    $transaksis->satuan      = $row->satuan;
                    $transaksis->pelayaran   = $row->mitra_pelayaran;
                    $transaksis->angkutan    = $row->angkutan;
                    $transaksis->jenisk      = $row->jenis_kayu;
                    $transaksis->asalk       = $row->asal_kayu;
                    $transaksis->nilai       = $row->nilai;
                    $transaksis->titikpantau = $row->titik_pantau;
                    $transaksis->waktuber    = $row->waktu_berangkat;
                    $transaksis->waktutiba   = $row->waktu_tiba;
                    $transaksis->penerima    = $row->mitra_bisnis;
                    $transaksis->penerima    = Sentry::getUser()->id;
                    $transaksis->save();
                }
            });
            return Redirect::route('admin.transaksis.index')->with("successMessage", "Import File Excel Berhasil di Upload");
        } catch (\Exception $e) {
            return Redirect::route('admin.transaksis.index')->with("errorMessage", "Import File Excel Gagl di Upload ( " . $e->getMessage() . " )");
        }
    }

    /**
     * Display the specified transaksi.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        return View::make('transaksis.show', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified transaksi.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $transaksi = Transaksi::find(Crypt::decrypt($id));

        return View::make('transaksis.edit', compact('transaksi'))->withTitle('Ubah Transaksi');
    }

    /**
     * Update the specified transaksi in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        $validator = Validator::make($data = Input::all(), Transaksi::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $transaksi->update($data);

        return Redirect::route('admin.transaksis.index')->with("successMessage", "Transaksi berhasil di ubah");
    }

    /**
     * Remove the specified transaksi from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Transaksi::destroy($id);

        return Redirect::route('admin.transaksis.index')->with("successMessage", "Transaksi berhasil dihapus");
    }

    public function exportindex()
    {
        return View::make('transaksis.indexexport')->withTitle('Export Transaksi');
    }

    public function export()
    {
        Session::put('aktifitas', Input::get('aktifitas'));
        Session::put('bulan', Input::get('bulan'));
        Session::put('tahun', Input::get('tahun'));
        Session::put('provinsi', Input::get('provinsi'));
        Session::put('triwulan', Input::get('triwulan'));
        Session::put('tipe', Input::get('tipe'));
        Session::put('komoditi', Input::get('komoditi'));
        $aktifitas = Input::get('aktifitas');
        $bulan     = Input::get('bulan');
        $tahun     = Input::get('tahun');
        $provinsi  = Input::get('provinsi');
        $triwulan  = Input::get('triwulan');
        $tipe      = Input::get('tipe');
        $komoditi  = Input::get('komoditi');

        if ($tipe == 'a') {
            if ($aktifitas == 'BONGKAR') {
                $transaksi = new Transaksi;
                $transaksi = $transaksi->where('aktifitas', 'BONGKAR');
                if ($bulan != null) {
                    $transaksi = $transaksi->where(DB::raw('MONTH(waktutiba)'), [$bulan]);
                }
                if ($tahun != null) {
                    $transaksi = $transaksi->where(DB::raw('YEAR(waktutiba)'), [$tahun]);
                }
                if ($provinsi != null) {
                    $transaksi = $transaksi->where('asal', $provinsi);
                }
                if ($komoditi != null) {
                    $transaksi = $transaksi->where('komoditi', $komoditi);
                }
                $transaksis = $transaksi->get();
                // dd($transaksis);
                // dd(DB::getQueryLog());
            }

            if ($aktifitas == 'MUAT') {
                $transaksi = new Transaksi;
                $transaksi = $transaksi->where('aktifitas', 'MUAT');
                if ($bulan != null) {
                    $transaksi = $transaksi->where(DB::raw('MONTH(waktuber)'), [$bulan]);
                }
                if ($tahun != null) {
                    $transaksi = $transaksi->where(DB::raw('YEAR(waktuber)'), [$tahun]);
                }
                if ($provinsi != null) {
                    $transaksi = $transaksi->where('tujuan', $provinsi);
                }
                if ($komoditi != null) {
                    $transaksi = $transaksi->where('komoditi', $komoditi);
                }
                $transaksis = $transaksi->get();
                // dd($transaksis);
                // dd(DB::getQueryLog());
            }
            // $aktifitas = Input::get('aktifitas');
        } else if ($tipe == 'b') {
            if ($triwulan == 'Triwulan I') {
                $bln1      = '01';
                $bln2      = '03';
                $triwulans = Input::get('triwulan');
            } else if ($triwulan == 'Triwulan II') {
                $bln1      = '04';
                $bln2      = '06';
                $triwulans = Input::get('triwulan');
            } else if ($triwulan == 'Triwulan III') {
                $bln1      = '07';
                $bln2      = '09';
                $triwulans = Input::get('triwulan');
            } else if ($triwulan == 'Triwulan IV') {
                $bln1      = '10';
                $bln2      = '12';
                $triwulans = Input::get('triwulan');
            }

            if ($aktifitas == 'BONGKAR') {
                $transaksi = new Transaksi;
                $transaksi = $transaksi->where('aktifitas', 'BONGKAR');
                if ($triwulan != null) {
                    $transaksi = $transaksi->whereBetween(DB::raw('MONTH(waktutiba)'), [$bln1, $bln2]);
                }
                if ($tahun != null) {
                    $transaksi = $transaksi->where(DB::raw('YEAR(waktutiba)'), [$tahun]);
                }
                if ($provinsi != null) {
                    $transaksi = $transaksi->where('asal', $provinsi);
                }
                if ($komoditi != null) {
                    $transaksi = $transaksi->where('komoditi', $komoditi);
                }
                $transaksis = $transaksi->get();
                // dd($transaksis);
                // dd(DB::getQueryLog());
            }

            if ($aktifitas == 'MUAT') {
                $transaksi = new Transaksi;
                $transaksi = $transaksi->where('aktifitas', 'MUAT');
                if ($triwulan != null) {
                    $transaksi = $transaksi->whereBetween(DB::raw('MONTH(waktuber)'), [$bln1, $bln2]);
                }
                if ($tahun != null) {
                    $transaksi = $transaksi->where(DB::raw('YEAR(waktuber)'), [$tahun]);
                }
                if ($provinsi != null) {
                    $transaksi = $transaksi->where('tujuan', $provinsi);
                }
                if ($komoditi != null) {
                    $transaksi = $transaksi->where('komoditi', $komoditi);
                }
                $transaksis = $transaksi->get();
                // dd($transaksis);
                // dd(DB::getQueryLog());
            }
        } else if ($tipe == 'c') {
            $transaksis = Transaksi::all();
        }
        return $this->exportExcel($transaksis);
    }

    private function exportExcel($transaksis)
    {
        $name = 'rekap_data_sipap ' . Session::get('tipe');
        Excel::create($name, function ($excel) use ($transaksis) {
            // Set the properties
            $name = 'rekap_data_sipap ' . Session::get('tipe');
            $excel->setTitle($name)
                ->setCreator('Atletik Unesa ' . date('Y')); $excel->sheet($name, function ($sheet) use ($transaksis) {

                $sheet->mergeCells('A1:O1')
                    ->row(1, array('Rekap Data SIPAP '));
                $row = 3;

                $sheet->row($row, array(
                    'Komoditi',
                    'Provinsi Asal',
                    'Provinsi Tujuan',
                    'Aktifitas',
                    'Quantity',
                    'Satuan',
                    'Mitra Pelayaran',
                    'Angkutan',
                    'Jenis Kayu',
                    'Asal Kayu',
                    'Harga',
                    'Titik Pantau',
                    'Waktu Berangkat',
                    'Waktu Tiba',
                    'Mitra Bisnis',
                ));
                foreach ($transaksis as $value) {
                    $sheet->row(++$row, array(
                        $value->komoditi,
                        $value->asal,
                        $value->tujuan,
                        $value->aktifitas,
                        $value->quantity,
                        $value->satuan,
                        $value->pelayaran,
                        $value->angkutan,
                        $value->jenisk,
                        $value->asalk,
                        $value->nilai,
                        $value->titikpantau,
                        $value->waktuber,
                        $value->waktutiba,
                        $value->penerima,
                    ));
                }
            });
        })->export('xls');
    }

}
