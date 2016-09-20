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
                {{ Form::open(array('url' => route('admin.exporttransaksi'), 'method' => 'get','class'=>'form-inline', 'id' => 'exporttransaksi')) }}
                    <div class="form-inline">
                      <div class="panel-body"  style:"overflow: scroll;">
                        <div class="form-inline">
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
                        {{ Form::button('Eksport', array('type'=>'submit','class'=>'btn btn-success')) }}
                      </div>
                    </div>
                {{ Form::close() }}
            </section>
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
@stop
