@extends('layouts.master')

@section('title')
	{{ $title }}
@stop

@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Import Excel
            </header>
            <div class="panel-body">
            	{{ Form::open(array('url' => route('admin.excelstore'), 'method' => 'post', 'id' => 'importexcel', 'class'=>'cmxform form-horizontal tasi-form', 'files'=>'true')) }}
            		<div class="form-group">
                        {{ Form::label('importexcel', 'Import File Excel', array('class' => 'control-label col-lg-2')) }}
                        <div class="col-lg-10">
                            {{ Form::file('importexcel', array('class'=>'default')) }}
                        </div>
                     </div>
                    <div class="box-footer">
                        {{Form::submit('Simpan', array('class'=>'btn btn-danger'))}}
                        <a href="{{ URL::to('admin/transaksis') }}" class="btn btn-default" type="button">Batal</a>
                    </div>
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
