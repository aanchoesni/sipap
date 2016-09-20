@extends('layouts.masteruser')

@section('title')
	{{ $title }}
@stop

@section('breadcrumb')
	<li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">@yield('title')</li>
@stop

@section('content')
{{ Form::open(array('url' => route('updatepassword'), 'method' => 'post', 'class'=>'cmxform form-horizontal tasi-form')) }}
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Ubah Password
            </header>
            <div class="panel-body">
                <div class="form-group">
                    {{ Form::label('oldpassword', 'Password Lama', array('class' => 'control-label col-lg-2')) }}
                    <div class="col-lg-10">
                    {{ Form::password('oldpassword', array('class' => 'form-control','placeholder'=>'**********')) }}
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    {{ Form::label('newpassword', 'Password Baru', array('class' => 'control-label col-lg-2')) }}
                    <div class="col-lg-10">
                    {{ Form::password('newpassword', array('class' => 'form-control','placeholder'=>'**********')) }}
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    {{ Form::label('newpassword_confirmation', 'Konfirmasi Password', array('class' => 'control-label col-lg-2')) }}
                    <div class="col-lg-10">
                    {{ Form::password('newpassword_confirmation', array('class' => 'form-control','placeholder'=>'**********')) }}
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="box-footer">
                    {{Form::submit('Simpan', array('class'=>'btn btn-primary'))}}
                </div>
            </div>
        </section>
    </div>
</div>
{{ Form::close() }}
@stop
