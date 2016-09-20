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
                Titik Pantau
            </header>
            <div class="panel-body">
            	{{ Form::open(array('url' => route('admin.tipas.store'), 'method' => 'post', 'id' => 'tipas', 'class'=>'cmxform form-horizontal tasi-form')) }}
            		@include('tipas._form')
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
        $(document).ready(function() { $("#provinsi").select2(); });
        $(document).ready(function() { $("#kota").select2(); });
        $(document).ready(function() { $("#kattipa").select2(); });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
      $('#provinsi').on('change', function(){
          $('#kota').select2("val","");
          $.post('{{ URL::to('admin/provdata') }}', {type: 'provinsi', id: $('#provinsi').val()}, function(e){
              $('#kota').html(e);
          });
      });
    });
    </script>
@stop
