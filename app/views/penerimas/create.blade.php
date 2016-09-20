@extends('layouts.master')

@section('title')
	{{ $title }}
@stop

@section('asset')
    {{HTML::style("select2/select2-bootstrap.css")}}
    <link rel="stylesheet" href="{{ asset('packages/select2/select2.css')}}" />
@stop

@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Mitra Bisnis Baru
            </header>
            <div class="panel-body">
            	{{ Form::open(array('url' => route('admin.penerimas.store'), 'method' => 'post', 'id' => 'penerimas', 'class'=>'cmxform form-horizontal tasi-form')) }}
            		@include('penerimas._form')
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

    <script src="{{ asset('packages/select2/select2.min.js')}}"></script>
    <script src="{{ asset('packages/select2/select2_locale_id.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() { $("#kota").select2(); });
    </script>
@stop
