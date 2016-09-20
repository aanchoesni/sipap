@extends('layouts.master')

@section('title')
	{{ $title }}
@stop

@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Ubah Mitra Pelayaran
            </header>
            <div class="panel-body">
        	{{ Form::model($pelayaran, array('url' => route('admin.pelayarans.update', ['pelayarans'=>$pelayaran->id]), 'method' => 'put', 'class'=>'cmxform form-horizontal tasi-form')) }}
        		@include('pelayarans._form')
        	{{ Form::close() }}
        	</div>
        </section>
    </div>
</div>
@stop

@section('script')
    {{HTML::script('template/admin/js/jquery.js')}}
@stop
