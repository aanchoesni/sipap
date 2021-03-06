@extends('layouts.master')

@section('title')
	{{ $title }}
@stop

@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Kategori Titik Pantau Baru
            </header>
            <div class="panel-body">
            	{{ Form::open(array('url' => route('admin.kattipas.store'), 'method' => 'post', 'id' => 'kattipas', 'class'=>'cmxform form-horizontal tasi-form')) }}
            		@include('kattipas._form')
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
