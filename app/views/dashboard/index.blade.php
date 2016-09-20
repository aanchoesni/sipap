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
@if (Sentry::hasPermission('admin'))
<!-- page start-->
<div class="row">
	<div class="col-lg-12">
	     <section class="panel">
	         <header class="panel-heading">
	             Grafik BONGKAR - MUAT - SELISIH {{Date('Y')}}
	         </header>
	         <div class="panel-body">
	             <div id="cbongkarline" class="graph"></div>
	         </div>
	     </section>
	 </div>
</div>
{{-- <div id="morris"> --}}
	<div class="row">
	  <div class="col-lg-6">
	      <section class="panel">
	          <header class="panel-heading">
	              Grafik Bongkar {{Date('Y')}}
	          </header>
	          <div class="panel-body">
	              <div id="cbongkar" class="graph"></div>
	          </div>
	      </section>
	  </div>
	  <div class="col-lg-6">
	      <section class="panel">
	          <header class="panel-heading">
	              Grafik Muat {{Date('Y')}}
	          </header>
	          <div class="panel-body">
	              <div id="cmuat" class="graph"></div>
	          </div>
	      </section>
	  </div>
	</div>
</div>
<!-- page end-->
@endif
@if (Sentry::hasPermission('user'))
<div class="col-lg-12">
  <div style="font-family:'Lato'; text-align:center; font-size:65px;">Selamat Datang di Dashboard Admin Sistem Informasi Perdagangan Antar Pulau Jawa Timur</div>
</div>
@endif
@stop

@section('script')
{{HTML::script('template/admin/js/jquery.js')}}
{{HTML::script('template/admin/js/jquery-1.8.3.min.js')}}

<script src="template/admin/assets/morris.js-0.4.3/morris.min.js" type="text/javascript"></script>
<script src="template/admin/assets/morris.js-0.4.3/raphael-min.js" type="text/javascript"></script>
<script>
    var data = <?php echo json_encode($cdata); ?>;
	Morris.Line({
        element: 'cbongkarline',
        data: data,
        xkey: 'bulan',
        ykeys: ['bongkar', 'muat', 'selisih'],
        labels: ['Bongkar', 'Muat', 'Selisih'],
	    ymax: 'auto',
	    resize: 'true',
	    hideHover: true,
        hoverCallback :  function(index, options, content){
		   var row = options.data[index]
		   bulan = row.bulan
		   bongkar = 'Bongkar: ' + row.bongkar
		   muat = 'Muat: ' + row.muat
		   selisih = 'Selisih: ' + row.selisih
		   // if (row.bongkar < row.muat){
		   //   tmp = bongkar; bongkar = muat; muat = tmp;
		   // }
		   return [bulan, bongkar, muat, selisih].join('<br/>')
		} ,
        lineColors:['#EB2332','#6883a3', '#1C8814'],
        parseTime: false
      });
	Morris.Line({
        element: 'cbongkar',
        data: <?php echo json_encode($cbongkar); ?>,
        xkey: 'bulan',
        ykeys: ['bongkar'],
        labels: ['Nilai'],
        ymax: 'auto',
	    resize: 'true',
	    hideHover: true,
        hoverCallback :  function(index, options, content){
		   var row = options.data[index]
		   bulan = row.bulan
		   bongkar = 'Bongkar: ' + row.bongkar
		   return [bulan, bongkar].join('<br/>')
		} ,
        lineColors:['#EB2332'],
        parseTime: false
      });

	Morris.Line({
        element: 'cmuat',
        data: <?php echo json_encode($cmuat); ?>,
        xkey: 'bulan',
        ykeys: ['muat'],
        labels: ['Nilai'],
        ymax: 'auto',
	    resize: 'true',
	    hideHover: true,
        hoverCallback :  function(index, options, content){
		   var row = options.data[index]
		   bulan = row.bulan
		   muat = 'Muat: ' + row.muat
		   return [bulan, muat].join('<br/>')
		} ,
        lineColors:['#6883a3'],
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
