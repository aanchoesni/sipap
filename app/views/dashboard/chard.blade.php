@extends('layouts.master')

@section('title')
  {{ $title }}
@stop

@section('asset')
    <!--external css-->
    <link href="template/admin/assets/morris.js-0.4.3/morris.css" rel="stylesheet" />
    {{HTML::style("select2/select2-bootstrap.css")}}
    <link rel="stylesheet" href="{{ asset('packages/select2/select2.css')}}" />
@stop

@section('content')
<!-- page start-->
<div class="row">
	<div class="col-lg-9">
	     <section class="panel">
	         <header class="panel-heading">
	             Grafik {{$mode}} Komoditi {{$komoditi}} Tahun {{Date('Y')}}
	         </header>
	         <div class="panel-body">
	             <div id="chardline" class="graph"></div>
	         </div>
	     </section>
	 </div>
	 <div class="col-lg-3">
	     <section class="panel">
	         <header class="panel-heading">
	             Tentukan Pilihan
	         </header>
	         <div class="panel-body">
	         	{{ Form::open(array('url' => route('chard'), 'method' => 'get', 'id' => 'chard', 'class'=>'cmxform form-horizontal tasi-form')) }}
	         	<div class="form-group">
	         		<div class="col-lg-10">
	         			{{ Form::select('aktifitas', array(''=>'', 'BONGKAR'=>'BONGKAR', 'MUAT'=>'MUAT'), $mode, array(
	         			        'id'=>'aktifitas',
	         			        'placeholder' => "Pilih Jenis Aktifitas",
	         			        'class'=>'form-control input-sm')) }}
	         		</div>
	         	</div>
	         	<div class="form-group">
	       			<div class="col-lg-10">
	       				{{ Form::select('provinsi', array(''=>'')+Provinsi::orderBy('nama','ASC')->lists('nama','nama'), $provinsi, array(
	       						'id'=>'provinsi',
	       						'placeholder' => "Pilih Provinsi",
	       						'class'=>'form-control input-sm')) }}
	       			</div>
	       		</div>
	       		<div class="form-group">
	       			<div class="col-lg-10">
	       				{{ Form::select('komoditi', array(''=>'')+Komoditi::orderBy('nama','ASC')->lists('nama','nama'), $komoditi, array(
	       						'id'=>'komoditi',
	       						'placeholder' => "Pilih Komoditi",
	       						'class'=>'form-control input-sm')) }}
	       			</div>
	       		</div>
	       		<div class="form-group">
	       			<div class="col-lg-10">
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
	       		            $bulan, array(
	       		                'id'=>'bulan',
	       		                'placeholder' => "Pilih Bulan",
	       		                'class'=>'form-control input-sm')) }}
	       		    </div>
	       		</div>
	       		<div class="form-group">
	       			<div class="col-lg-10">
	       		    {{ Form::selectrange('tahun',2010,2020,$tahun,array('id'=>'tahun','class'=>'form-control input-sm'))}}
	       		    </div>
	       		</div>
	       		<div class="box-footer">
	       			{{Form::submit('Cari', array('class'=>'btn btn-success'))}}
	       		</div>
	         	{{ Form::close() }}
	         </div>
	     </section>
	 </div>
</div>
<!-- page end-->
@stop

@section('script')
{{HTML::script('template/admin/js/jquery.js')}}
{{HTML::script('template/admin/js/jquery-1.8.3.min.js')}}

<script src="template/admin/assets/morris.js-0.4.3/morris.min.js" type="text/javascript"></script>
<script src="template/admin/assets/morris.js-0.4.3/raphael-min.js" type="text/javascript"></script>
<script>
    var data = <?php echo json_encode($chdata); ?>;
	Morris.Line({
        element: 'chardline',
        data: data,
        xkey: 'tgl',
        ykeys: ['harga'],
        labels: ['Harga'],
        xlabel: ['tgl'],
	    ymax: 'auto',
	    resize: 'true',
	    hideHover: true,
        hoverCallback :  function(index, options, content){
		   var row = options.data[index]
		   tgl = row.tgl
		   harga = 'Harga: ' + row.harga
		   return [tgl, harga].join('<br/>')
		} ,
        lineColors:['#EB2332'],
        parseTime: false
      });
</script>
<script src="{{ asset('packages/select2/select2.min.js')}}"></script>
<script src="{{ asset('packages/select2/select2_locale_id.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() { $("#komoditi").select2(); });
    $(document).ready(function() { $("#provinsi").select2(); });
    $(document).ready(function() { $("#bulan").select2(); });
    $(document).ready(function() { $("#aktifitas").select2(); });
    $(document).ready(function() { $("#tahun").select2(); });
</script>
@stop
