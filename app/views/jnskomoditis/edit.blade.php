@extends('layouts.master')

@section('title')
	{{ $title }}
@stop

@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Ubah Jenis Komoditi
            </header>
            <div class="panel-body">
        	{{ Form::model($jnskomoditi, array('url' => route('admin.jnskomoditis.update', ['jnskomoditis'=>$jnskomoditi->id]), 'method' => 'put', 'class'=>'cmxform form-horizontal tasi-form')) }}
        		@include('jnskomoditis._form')
        	{{ Form::close() }}
        	</div>
        </section>
    </div>
</div>
@stop

@section('script')
    {{HTML::script('template/admin/js/jquery.js')}}
@stop
