@extends('layouts.master')

@section('title')
	{{ $title }}
@stop

@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Mitra Pelayaran Baru
            </header>
            <div class="panel-body">
            	{{ Form::open(array('url' => route('admin.pelayarans.store'), 'method' => 'post', 'id' => 'pelayarans', 'class'=>'cmxform form-horizontal tasi-form')) }}
            		@include('pelayarans._form')
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
@stop
