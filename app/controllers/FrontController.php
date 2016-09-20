<?php

class FrontController extends \BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $cbongkar = DB::table('transaksis')
            ->select('aktifitas', DB::raw(
                'CASE WHEN MONTH(created_at) = 1 THEN "Januari"
                WHEN MONTH(created_at) = 2 THEN "Februari"
                WHEN MONTH(created_at) = 3 THEN "Maret"
                WHEN MONTH(created_at) = 4 THEN "April"
                WHEN MONTH(created_at) = 5 THEN "Mei"
                WHEN MONTH(created_at) = 6 THEN "Juni"
                WHEN MONTH(created_at) = 7 THEN "Juli"
                WHEN MONTH(created_at) = 8 THEN "Agustus"
                WHEN MONTH(created_at) = 9 THEN "September"
                WHEN MONTH(created_at) = 10 THEN "Oktober"
                WHEN MONTH(created_at) = 11 THEN "November"
                WHEN MONTH(created_at) = 12 THEN "Desembar"
                 END as bulan'), DB::raw('sum(nilai) as jumlah'))
            ->where('aktifitas', 'BONGKAR')
            ->where(DB::raw('YEAR(created_at)'), [date('Y')])
            ->groupBy('bulan')
            ->get();

        $cmuat = DB::table('transaksis')
            ->select('aktifitas', DB::raw(
                'CASE WHEN MONTH(created_at) = 1 THEN "Januari"
                WHEN MONTH(created_at) = 2 THEN "Februari"
                WHEN MONTH(created_at) = 3 THEN "Maret"
                WHEN MONTH(created_at) = 4 THEN "April"
                WHEN MONTH(created_at) = 5 THEN "Mei"
                WHEN MONTH(created_at) = 6 THEN "Juni"
                WHEN MONTH(created_at) = 7 THEN "Juli"
                WHEN MONTH(created_at) = 8 THEN "Agustus"
                WHEN MONTH(created_at) = 9 THEN "September"
                WHEN MONTH(created_at) = 10 THEN "Oktober"
                WHEN MONTH(created_at) = 11 THEN "November"
                WHEN MONTH(created_at) = 12 THEN "Desembar"
                 END as bulan'), DB::raw('sum(nilai) as jumlah'))
            ->where('aktifitas', 'MUAT')
            ->where(DB::raw('YEAR(created_at)'), [date('Y')])
            ->groupBy('bulan')
            ->get();

        return View::make('front.index')
            ->with('cbongkar', $cbongkar)
            ->with('cmuat', $cmuat);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
