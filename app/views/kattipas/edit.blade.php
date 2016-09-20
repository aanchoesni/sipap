@extends('layouts.master')

@section('title')
	{{ $title }}
@stop

@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Ubah Kategori Titik Pantau
            </header>
            <div class="panel-body">
        	{{ Form::model($kattipa, array('url' => route('admin.kattipas.update', ['kattipas'=>$kattipa->id]), 'method' => 'put', 'class'=>'cmxform form-horizontal tasi-form')) }}
        		@include('kattipas._form')
        	{{ Form::close() }}
        	</div>
        </section>
    </div>
</div>
@stop

@section('script')
    {{HTML::script('template/admin/js/jquery.js')}}
@stop
