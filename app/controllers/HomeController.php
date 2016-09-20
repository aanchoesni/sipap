<?php

class HomeController extends BaseController
{

    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |    Route::get('/', 'HomeController@showWelcome');
    |
     */

    public function showWelcome()
    {
        return View::make('hello');
    }

    public function authenticate()
    {
        // Ambil credentials dari $_POST variable
        $credentials = array(
            'email'    => Input::get('email'),
            'password' => Input::get('password'),
        );

        try {
            // authentikasi user
            $user = Sentry::authenticate($credentials, false);
            // Redirect user ke dashboard
            return Redirect::intended('dashboard'); // yang mambuat tidak bisa diakses apabila tidak login (inteded)
        } catch (Cartalyst\Sentry\Users\WrongPasswordException $e) {
            return Redirect::back()->with('errorMessage', 'Password yang Anda masukan salah.')->withInput(Input::except('password'));
        } catch (Exception $e) {
            return Redirect::back()->with('errorMessage', trans('Akun dengan email tersebut tidak ditemukan di sistem kami.'))->withInput(Input::except('password'));
        } catch (Cartalyst\Sentry\Users\UserNotActivatedException $e) {
            return Redirect::back()->with('errorMessage', trans('Akun dengan email tersebut belum aktif mohon cek email.'))->withInput(Input::except('password'));
        }
    }

    public function index()
    {
        if (Sentry::getUser()->hasPermission('admin')) {
            $cdata = DB::table('transaksis')
                ->select(DB::raw(
                    'CASE WHEN MONTH(IF(aktifitas="BONGKAR", waktutiba, waktuber)) = 1 THEN "1 (Januari)"
                WHEN MONTH(IF(aktifitas="BONGKAR", waktutiba, waktuber)) = 2 THEN "2 (Februari)"
                WHEN MONTH(IF(aktifitas="BONGKAR", waktutiba, waktuber)) = 3 THEN "3 (Maret)"
                WHEN MONTH(IF(aktifitas="BONGKAR", waktutiba, waktuber)) = 4 THEN "4 (April)"
                WHEN MONTH(IF(aktifitas="BONGKAR", waktutiba, waktuber)) = 5 THEN "5 (Mei)"
                WHEN MONTH(IF(aktifitas="BONGKAR", waktutiba, waktuber)) = 6 THEN "6 (Juni)"
                WHEN MONTH(IF(aktifitas="BONGKAR", waktutiba, waktuber)) = 7 THEN "7 (Juli)"
                WHEN MONTH(IF(aktifitas="BONGKAR", waktutiba, waktuber)) = 8 THEN "8 (Agustus)"
                WHEN MONTH(IF(aktifitas="BONGKAR", waktutiba, waktuber)) = 9 THEN "9 (September)"
                WHEN MONTH(IF(aktifitas="BONGKAR", waktutiba, waktuber)) = 10 THEN "10 (Oktober)"
                WHEN MONTH(IF(aktifitas="BONGKAR", waktutiba, waktuber)) = 11 THEN "11 (November)"
                WHEN MONTH(IF(aktifitas="BONGKAR", waktutiba, waktuber)) = 12 THEN "12 (Desembar)"
                 END as bulan,
                SUM(IF (aktifitas="BONGKAR",nilai,0)) AS bongkar,
                SUM(IF(aktifitas="MUAT",nilai,0)) AS muat,
                SUM(IF (aktifitas="MUAT",nilai,0)) - SUM(IF(aktifitas="BONGKAR",nilai,0)) AS selisih'))
                ->where(DB::raw('YEAR(IF(aktifitas="BONGKAR", waktutiba, waktuber))'), [Date('Y')])
                ->groupBy('bulan')
                ->orderBy('bulan')
                ->get();

            $cbongkar = DB::table('transaksis')
                ->select(DB::raw(
                    'CASE WHEN MONTH(waktutiba) = 1 THEN "1 (Januari)"
                WHEN MONTH(waktutiba) = 2 THEN "2 (Februari)"
                WHEN MONTH(waktutiba) = 3 THEN "3 (Maret)"
                WHEN MONTH(waktutiba) = 4 THEN "4 (April)"
                WHEN MONTH(waktutiba) = 5 THEN "5 (Mei)"
                WHEN MONTH(waktutiba) = 6 THEN "6 (Juni)"
                WHEN MONTH(waktutiba) = 7 THEN "7 (Juli)"
                WHEN MONTH(waktutiba) = 8 THEN "8 (Agustus)"
                WHEN MONTH(waktutiba) = 9 THEN "9 (September)"
                WHEN MONTH(waktutiba) = 10 THEN "10 (Oktober)"
                WHEN MONTH(waktutiba) = 11 THEN "11 (November)"
                WHEN MONTH(waktutiba) = 12 THEN "12 (Desembar)"
                 END as bulan,
                SUM(IF (aktifitas="BONGKAR",nilai,0)) AS bongkar'))
                ->where('aktifitas', 'BONGKAR')
                ->where(DB::raw('YEAR(waktutiba)'), [date('Y')])
                ->groupBy('bulan')
                ->get();

            $cmuat = DB::table('transaksis')
                ->select('aktifitas', DB::raw(
                    'CASE WHEN MONTH(waktuber) = 1 THEN "1 (Januari)"
                WHEN MONTH(waktuber) = 2 THEN "2 (Februari)"
                WHEN MONTH(waktuber) = 3 THEN "3 (Maret)"
                WHEN MONTH(waktuber) = 4 THEN "4 (April)"
                WHEN MONTH(waktuber) = 5 THEN "5 (Mei)"
                WHEN MONTH(waktuber) = 6 THEN "6 (Juni)"
                WHEN MONTH(waktuber) = 7 THEN "7 (Juli)"
                WHEN MONTH(waktuber) = 8 THEN "8 (Agustus)"
                WHEN MONTH(waktuber) = 9 THEN "9 (September)"
                WHEN MONTH(waktuber) = 10 THEN "10 (Oktober)"
                WHEN MONTH(waktuber) = 11 THEN "11 (November)"
                WHEN MONTH(waktuber) = 12 THEN "12 (Desembar)"
                 END as bulan,
                SUM(IF(aktifitas="MUAT",nilai,0)) AS muat'))
                ->where('aktifitas', 'MUAT')
                ->where(DB::raw('YEAR(waktuber)'), [date('Y')])
                ->groupBy('bulan')
                ->get();

            if (Sentry::getUser()->hasPermission('admin')) {
                return View::make('dashboard.index')
                    ->with('cbongkar', $cbongkar)
                    ->with('cmuat', $cmuat)
                    ->with('cdata', $cdata)
                    ->withtitle("Dashboard Admin");
            }
        }

        if (Sentry::getUser()->hasPermission('user')) {
            $cdata = DB::table('transaksis')
                ->select(DB::raw(
                    'CASE WHEN MONTH(IF(aktifitas="BONGKAR", waktutiba, waktuber)) = 1 THEN "1 (Januari)"
                WHEN MONTH(IF(aktifitas="BONGKAR", waktutiba, waktuber)) = 2 THEN "2 (Februari)"
                WHEN MONTH(IF(aktifitas="BONGKAR", waktutiba, waktuber)) = 3 THEN "3 (Maret)"
                WHEN MONTH(IF(aktifitas="BONGKAR", waktutiba, waktuber)) = 4 THEN "4 (April)"
                WHEN MONTH(IF(aktifitas="BONGKAR", waktutiba, waktuber)) = 5 THEN "5 (Mei)"
                WHEN MONTH(IF(aktifitas="BONGKAR", waktutiba, waktuber)) = 6 THEN "6 (Juni)"
                WHEN MONTH(IF(aktifitas="BONGKAR", waktutiba, waktuber)) = 7 THEN "7 (Juli)"
                WHEN MONTH(IF(aktifitas="BONGKAR", waktutiba, waktuber)) = 8 THEN "8 (Agustus)"
                WHEN MONTH(IF(aktifitas="BONGKAR", waktutiba, waktuber)) = 9 THEN "9 (September)"
                WHEN MONTH(IF(aktifitas="BONGKAR", waktutiba, waktuber)) = 10 THEN "10 (Oktober)"
                WHEN MONTH(IF(aktifitas="BONGKAR", waktutiba, waktuber)) = 11 THEN "11 (November)"
                WHEN MONTH(IF(aktifitas="BONGKAR", waktutiba, waktuber)) = 12 THEN "12 (Desembar)"
                 END as bulan,
                SUM(IF (aktifitas="BONGKAR",nilai,0)) AS bongkar,
                SUM(IF(aktifitas="MUAT",nilai,0)) AS muat,
                SUM(IF (aktifitas="MUAT",nilai,0)) - SUM(IF(aktifitas="BONGKAR",nilai,0)) AS selisih'))
                ->where(DB::raw('YEAR(IF(aktifitas="BONGKAR", waktutiba, waktuber))'), [Date('Y')])
                ->where('iuser', Sentry::getUser()->id)
                ->groupBy('bulan')
                ->orderBy('bulan')
                ->get();

            $cbongkar = DB::table('transaksis')
                ->select(DB::raw(
                    'CASE WHEN MONTH(waktutiba) = 1 THEN "1 (Januari)"
                WHEN MONTH(waktutiba) = 2 THEN "2 (Februari)"
                WHEN MONTH(waktutiba) = 3 THEN "3 (Maret)"
                WHEN MONTH(waktutiba) = 4 THEN "4 (April)"
                WHEN MONTH(waktutiba) = 5 THEN "5 (Mei)"
                WHEN MONTH(waktutiba) = 6 THEN "6 (Juni)"
                WHEN MONTH(waktutiba) = 7 THEN "7 (Juli)"
                WHEN MONTH(waktutiba) = 8 THEN "8 (Agustus)"
                WHEN MONTH(waktutiba) = 9 THEN "9 (September)"
                WHEN MONTH(waktutiba) = 10 THEN "10 (Oktober)"
                WHEN MONTH(waktutiba) = 11 THEN "11 (November)"
                WHEN MONTH(waktutiba) = 12 THEN "12 (Desembar)"
                 END as bulan,
                SUM(IF (aktifitas="BONGKAR",nilai,0)) AS bongkar'))
                ->where('aktifitas', 'BONGKAR')
                ->where('iuser', Sentry::getUser()->id)
                ->where(DB::raw('YEAR(waktutiba)'), [date('Y')])
                ->groupBy('bulan')
                ->get();

            $cmuat = DB::table('transaksis')
                ->select('aktifitas', DB::raw(
                    'CASE WHEN MONTH(waktuber) = 1 THEN "1 (Januari)"
                WHEN MONTH(waktuber) = 2 THEN "2 (Februari)"
                WHEN MONTH(waktuber) = 3 THEN "3 (Maret)"
                WHEN MONTH(waktuber) = 4 THEN "4 (April)"
                WHEN MONTH(waktuber) = 5 THEN "5 (Mei)"
                WHEN MONTH(waktuber) = 6 THEN "6 (Juni)"
                WHEN MONTH(waktuber) = 7 THEN "7 (Juli)"
                WHEN MONTH(waktuber) = 8 THEN "8 (Agustus)"
                WHEN MONTH(waktuber) = 9 THEN "9 (September)"
                WHEN MONTH(waktuber) = 10 THEN "10 (Oktober)"
                WHEN MONTH(waktuber) = 11 THEN "11 (November)"
                WHEN MONTH(waktuber) = 12 THEN "12 (Desembar)"
                 END as bulan,
                SUM(IF(aktifitas="MUAT",nilai,0)) AS muat'))
                ->where('aktifitas', 'MUAT')
                ->where('iuser', Sentry::getUser()->id)
                ->where(DB::raw('YEAR(waktuber)'), [date('Y')])
                ->groupBy('bulan')
                ->get();

            if (Sentry::getUser()->hasPermission('user')) {
                return View::make('dashboard.index')
                    ->with('cbongkar', $cbongkar)
                    ->with('cmuat', $cmuat)
                    ->with('cdata', $cdata)
                    ->withtitle("Dashboard Admin");
            }
        }
    }
    public function chard()
    {
        $mode     = Input::get('aktifitas');
        $provinsi = Input::get('provinsi');
        $komoditi = Input::get('komoditi');
        $bulan    = Input::get('bulan');
        $tahun    = Input::get('tahun');

        if ($mode == 'BONGKAR' or $mode == '') {
            $chdata = DB::table('transaksis')
                ->select(DB::raw(
                    'MONTH(waktutiba) as bulan,
                SUM(nilai) AS harga,
                DATE(waktutiba) as tgl'))
                ->where('aktifitas', $mode)
                ->where('asal', $provinsi)
                ->where('komoditi', $komoditi)
                ->where(DB::raw('MONTH(waktutiba)'), [$bulan])
                ->where(DB::raw('YEAR(waktutiba)'), [$tahun])
                ->groupBy('tgl')
                ->get();
        }
        if ($mode == 'MUAT') {
            $chdata = DB::table('transaksis')
                ->select(DB::raw(
                    'MONTH(waktuber) as bulan,
                SUM(nilai) AS harga,
                DATE(waktuber) as tgl'))
                ->where('aktifitas', $mode)
                ->where('tujuan', $provinsi)
                ->where('komoditi', $komoditi)
                ->where(DB::raw('MONTH(waktuber)'), [$bulan])
                ->where(DB::raw('YEAR(waktuber)'), [$tahun])
                ->groupBy('tgl')
                ->get();
        }

        // dd($chdata);

        if (Sentry::getUser()->hasPermission('admin')) {
            return View::make('dashboard.chard')
                ->with('chdata', $chdata)
                ->with('mode', $mode)
                ->with('provinsi', $provinsi)
                ->with('komoditi', $komoditi)
                ->with('bulan', $bulan)
                ->with('tahun', $tahun)
                ->withtitle("Chard");
        }
    }
    public function logout()
    {
        // Logout user
        Sentry::logout();
        // Redirect user ke halaman login
        return Redirect::to('/')->with('successMessage', 'Anda berhasil logout.');
    }

}
