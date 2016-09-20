@extends('layouts.master')

@section('title')
  {{ $title }}
@stop

@section('asset')
  {{HTML::style("template/admin/assets/advanced-datatable/media/css/demo_page.css")}}
  {{HTML::style("template/admin/assets/advanced-datatable/media/css/demo_table.css")}}
  {{HTML::style("template/admin/assets/data-tables/DT_bootstrap.css")}}
  {{HTML::style("select2/select2-bootstrap.css")}}
  <link rel="stylesheet" href="{{ asset('packages/select2/select2.css')}}" />
@stop

@section('content')
<!-- page start-->
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <section class="panel">
                @if(Sentry::hasPermission('admin'))
                {{ Form::open(array('url' => route('admin.transaksis.cari'), 'method' => 'get','class'=>'form-inline', 'id' => 'cari')) }}
                @endif
                @if(Sentry::hasPermission('user'))
                {{ Form::open(array('url' => route('admin.transaksis.cariuser'), 'method' => 'get','class'=>'form-inline', 'id' => 'cari')) }}
                @endif
                <div class="panel-body"  style:"overflow: scroll;">
                  <div class="form-inline">
                    {{-- <div class="form-group">
                    {{ Form::label('tipe', 'Tipe Filter Berdasarkan') }}
                    {{ Form::select('tipe', array(''=>'', 'a'=>'Aktifitas, Bulan, Tahun', 'b'=>'Aktifitas, Provinsi', 'c'=>'Triwulan', 'd'=>'Aktifitas, Bulan, Tahun, Provinsi, Komoditi', 'e'=>'Semua'), null, array(
                            'id'=>'tipe',
                            'placeholder' => "Pilih Filter Bedasarkan",
                            'class'=>'form-control input-sm')) }}
                    </div> --}}
                    <div class="form-group">
                    {{ Form::label('tipe', 'Tipe Filter Berdasarkan') }}
                    {{ Form::select('tipe', array(''=>'', 'a'=>'Pencarian Berdasarkan Isian', 'b'=>'Triwulan', 'c'=>'Semua'), null, array(
                            'id'=>'tipe',
                            'placeholder' => "Pilih Filter Bedasarkan",
                            'class'=>'form-control input-sm')) }}
                    </div>
                    <br>
                    <div class="form-group">
                    {{ Form::label('aktifitas', 'Aktifitas') }}
                    {{ Form::select('aktifitas', array(''=>'', 'BONGKAR'=>'BONGKAR', 'MUAT'=>'MUAT'), null, array(
                            'id'=>'aktifitas',
                            'placeholder' => "Pilih aktifitas",
                            'class'=>'form-control input-sm')) }}
                    </div>
                    <div class="form-group">
                      {{ Form::label('bulan', 'Bulan') }}
                      {{ Form::select('bulan', array(''=>'',
                          '01'=>'Januari',
                          '02'=>'Februari',
                          '03'=>'Maret',
                          '04'=>'April',
                          '05'=>'Mei',
                          '06'=>'Juni',
                          '07'=>'Juli',
                          '08'=>'Agustus',
                          '09'=>'September',
                          '10'=>'Oktober',
                          '11'=>'November',
                          '12'=>'Desember'),
                              null, array(
                                  'id'=>'bulan',
                                  'placeholder' => "Pilih Bulan",
                                  'class'=>'select2-container form-control input-sm select2 select2-container-active')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('tahun', 'Tahun') }}
                        {{ Form::selectyear('tahun', 2015, 2020, null, array(
                        'id'=>'tahun',
                        'placeholder' => "Tahun",
                        'class' => 'form-control input-sm')) }}
                    </div>
                    <div class="form-group">
                      {{ Form::label('provinsi', 'Provinsi') }}
                      {{ Form::select('provinsi', array(''=>'')+Provinsi::orderBy('nama','ASC')->lists('nama','nama'), null, array(
                          'id'=>'provinsi',
                          'placeholder' => "Pilih Provinsi",
                          'class'=>'form-control input-sm')) }}
                    </div>
                    <div class="form-group">
                      {{ Form::label('triwulan', 'Triwulan') }}
                      {{ Form::select('triwulan', array(''=>'', 'Triwulan I'=>'Triwulan I', 'Triwulan II'=>'Triwulan II', 'Triwulan III'=>'Triwulan III', 'Triwulan IV'=>'Triwulan IV'), null, array(
                              'id'=>'triwulan',
                              'placeholder' => "Pilih Triwulan",
                              'class'=>'form-control input-sm')) }}
                    </div>
                    <div class="form-group">
                      {{ Form::label('komoditi', 'Komoditi') }}
                        {{ Form::select('komoditi', array(''=>'')+Komoditi::orderBy('nama','ASC')->lists('nama','nama'), null, array(
                            'id'=>'komoditi',
                            'placeholder' => "Pilih Komoditi",
                            'class'=>'form-control input-sm')) }}
                      </div>
                    </div>
                    <br>
                    <div class="form-group">
                      {{ Form::button('Cari', array('type'=>'submit','class'=>'btn btn-success')) }}
                    </div>
                  </div>
                {{ Form::close() }}
            </section>
            <header class="panel-heading">
                Daftar Transaksi<br>
                {{ HTML::buttonAdd() }}
				        <a class="btn btn-primary" href="{{URL::to('admin/import')}}">Import Excel</a>
            </header>
            <div class="panel-body"  style:"overflow: scroll;">
                <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="transaksi">
                      <thead>
                        <tr>
                            <th style="text-align:center;">No</th>
                            <th>Komoditi</th>
                            <th>Quantity</th>
                            <th>Satuan</th>
                            <th>Harga</th>
                            <th>Titik Pantau</th>
                            <th style="display:none;">Nama Angkutan</th>
                            <th style="display:none;">Provinsi Asal</th>
                            <th style="display:none;">Provinsi Tujuan</th>
                            <th style="display:none;">Aktifitas</th>
                            <th style="display:none;">*Jenis</th>
                            <th style="display:none;">*Asal</th>
                            <th style="display:none;">Waktu Berangkat</th>
                            <th style="display:none;">Waktu Tiba</th>
                            <th style="display:none;">Mitra Bisnis</th>
                            <th style="display:none;">Mitra Pelayaran</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1;?>
                        @foreach($transaksis as $value)
                          <tr>
                              <td style="text-align:center;"><?php echo $no ?></td>
                              <td>{{{ $value->komoditi }}}</td>
                              <td style="text-align:right;">{{{ $value->quantity }}}</td>
                              <td style="text-align:center;">{{{ $value->satuan }}}</td>
                              <td style="text-align:right;">Rp {{ number_format($value->nilai), 0 }}</td>
                              <td>{{{ $value->titikpantau }}}</td>
                              <td style="display:none;">{{{ $value->angkutan }}}</td>
                              <td style="display:none;">{{{ $value->asal }}}</td>
                              <td style="display:none;">{{{ $value->tujuan }}}</td>
                              <td style="display:none;">{{{ $value->aktifitas }}}</td>
                              <td style="display:none;">{{{ $value->jenisk }}}</td>
                              <td style="display:none;">{{{ $value->asalk }}}</td>
                              <td style="display:none;">{{{ $value->waktuber }}}</td>
                              <td style="display:none;">{{{ $value->waktutiba }}}</td>
                              <td style="display:none;">{{{ $value->penerima }}}</td>
                              <td style="display:none;">{{{ $value->pelayaran }}}</td>
                              <td style="text-align:center;">
                                <div class="btn-group">
                                  <a href="{{ route('admin.transaksis.edit', ['transaksis'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                  {{ Form::open(array('url'=>route('admin.transaksis.destroy',['transaksis'=>$value->id]),'method'=>'delete', 'style'=>'display:inline;')) }}
                                  {{ Form::button('<i class="fa fa-trash-o "></i>', array('type'=>'submit','class'=>'btn btn-danger btn-xs')) }}
                                  {{ Form::close() }}
                                </div>
                              </td>
                          <?php $no++;?>
                          </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- page end-->
@stop

@section('script')
 	{{HTML::script('template/admin/assets/advanced-datatable/media/js/jquery.js')}}
 	{{HTML::script('template/admin/assets/advanced-datatable/media/js/jquery.dataTables.js')}}
 	{{HTML::script('template/admin/assets/data-tables/DT_bootstrap.js')}}
  <script src="{{ asset('packages/select2/select2.min.js')}}"></script>
  <script src="{{ asset('packages/select2/select2_locale_id.js')}}"></script>
 	<script type="text/javascript" charset="utf-8">
	    $(document).ready(function() { $('#jnskomoditis').dataTable(); });
      $(document).ready(function() { $("#aktifitas").select2(); });
      $(document).ready(function() { $("#bulan").select2(); });
      $(document).ready(function() { $("#tahun").select2(); });
      $(document).ready(function() { $("#provinsi").select2({ dropdownAutoWidth : true }); });
      $(document).ready(function() { $("#tujuan").select2({ dropdownAutoWidth : true }); });
      $(document).ready(function() { $("#triwulan").select2({ dropdownAutoWidth : true }); });
      $(document).ready(function() { $("#tipe").select2({ dropdownAutoWidth : true }); });
      $(document).ready(function() { $("#komoditi").select2({ dropdownAutoWidth : true }); });
	</script>
	<script type="text/javascript">
      /* Formating function for row details */
      function fnFormatDetails ( oTable, nTr )
      {
          var aData = oTable.fnGetData( nTr );
          var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
          sOut += '<tr><td>Mitra Pelayaran:</td><td>'+aData[16]+'</td></tr>';
          sOut += '<tr><td>Nama Angkutan:</td><td>'+aData[7]+'</td></tr>';
          sOut += '<tr><td>Mitra Bisnis:</td><td>'+aData[15]+'</td></tr>';
          sOut += '<tr><td>Provinsi Asal:</td><td>'+aData[8]+'</td></tr>';
          sOut += '<tr><td>Provinsi Tujuan:</td><td>'+aData[9]+'</td></tr>';
          sOut += '<tr><td>Aktifitas:</td><td>'+aData[10]+'</td></tr>';
          sOut += '<tr><td>Jenis Kayu:</td><td>'+aData[11]+'</td></tr>';
          sOut += '<tr><td>Asal Kayu:</td><td>'+aData[12]+'</td></tr>';
          sOut += '<tr><td>Waktu Berangkat:</td><td>'+aData[13]+'</td></tr>';
          sOut += '<tr><td>Waktu Tiba:</td><td>'+aData[14]+'</td></tr>';
          sOut += '</table>';

          return sOut;
      }

      $(document).ready(function() {
          /*
           * Insert a 'details' column to the table
           */
          var nCloneTh = document.createElement( 'th' );
          var nCloneTd = document.createElement( 'td' );
          nCloneTd.innerHTML = '{{ HTML::image("template/admin/assets/advanced-datatable/examples/examples_support/details_open.png") }}';
          nCloneTd.className = "center";

          $('#transaksi thead tr').each( function () {
              this.insertBefore( nCloneTh, this.childNodes[0] );
          } );

          $('#transaksi tbody tr').each( function () {
              this.insertBefore(  nCloneTd.cloneNode( true ), this.childNodes[0] );
          } );

          /*
           * Initialse DataTables, with no sorting on the 'details' column
           */
          var oTable = $('#transaksi').dataTable( {
              "aoColumnDefs": [
                  { "bSortable": false, "aTargets": [ 0 ] }
              ],
              "aaSorting": [[1, 'asc']]
          });

          /* Add event listener for opening and closing details
           * Note that the indicator for showing which row is open is not controlled by DataTables,
           * rather it is done here
           */
          $('#transaksi tbody td img').live('click', function () {
              var nTr = $(this).parents('tr')[0];
              if ( oTable.fnIsOpen(nTr) )
              {
                  /* This row is already open - close it */
                  this.src = "../template/admin/assets/advanced-datatable/examples/examples_support/details_open.png";
                  oTable.fnClose( nTr );
              }
              else
              {
                  /* Open this row */
                  this.src = "../template/admin/assets/advanced-datatable/examples/examples_support/details_close.png";
                  oTable.fnOpen( nTr, fnFormatDetails(oTable, nTr), 'details' );
              }
          } );
      } );
  </script>
@stop