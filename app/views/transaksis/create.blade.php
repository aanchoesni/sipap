@extends('layouts.master')

@section('title')
	{{ $title }}
@stop

@section('asset')
    {{HTML::style("select2/select2-bootstrap.css")}}
    <link rel="stylesheet" href="{{ asset('packages/select2/select2.css')}}" />
    {{HTML::style("template/admin/assets/bootstrap-datepicker/css/datepicker.css")}}
    {{HTML::style("template/admin/assets/bootstrap-datetimepicker/css/datetimepicker.css")}}
@stop

@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Tambah Transaksi
            </header>
            <div class="panel-body">
            	{{ Form::open(array('url' => route('admin.transaksis.store'), 'method' => 'post', 'id' => 'transaksi', 'class'=>'cmxform form-horizontal tasi-form')) }}
            		@include('transaksis._form2')
            	{{ Form::close() }}
            </div>
        </section>
    </div>
</div>
@stop

@section('script')
    {{HTML::script('template/admin/js/jquery.js')}}
    {{HTML::script('template/admin/js/jquery.validate.min.js')}}
    <!--script for this page-->
    {{HTML::script('template/admin/js/form-validation-script.js')}}
    {{HTML::script('template/admin/assets/bootstrap-datepicker/js/bootstrap-datepicker.js')}}
    {{HTML::script('template/admin/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')}}
    {{HTML::script('template/admin/js/advanced-form-components.js')}}

    <script src="{{ asset('packages/select2/select2.min.js')}}"></script>
    <script src="{{ asset('packages/select2/select2_locale_id.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() { $("#komoditi").select2(); });
        $(document).ready(function() { $("#asal").select2(); });
        $(document).ready(function() { $("#tujuan").select2(); });
        $(document).ready(function() { $("#aktifitas").select2(); });
        $(document).ready(function() { $("#titikpantau").select2(); });
        $(document).ready(function() { $("#pelayaran").select2(); });
        $(document).ready(function() { $("#penerima").select2(); });
    </script>
@stop
