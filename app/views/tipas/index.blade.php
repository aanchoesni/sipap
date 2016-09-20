@extends('layouts.master')

@section('title')
  {{ $title }}
@stop

@section('asset')
  {{HTML::style("template/admin/assets/advanced-datatable/media/css/demo_page.css")}}
  {{HTML::style("template/admin/assets/advanced-datatable/media/css/demo_table.css")}}
  {{HTML::style("template/admin/assets/data-tables/DT_bootstrap.css")}}
@stop

@section('content')
<!-- page start-->
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Daftar Titik Pantau
                {{ HTML::buttonAdd() }}
            </header>
            <div class="panel-body"  style:"overflow: scroll;">
                  <div class="adv-table">
                      <table  class="display table table-bordered table-striped" id="komoditis">
                        <thead>
                          <tr>
                              <th style="text-align:center;">No</th>
                              <th>Provinsi</th>
                              <th>Kota</th>
                              <th>Kategori Titik Pantau</th>
                              <th>Nama</th>
                              <th style="text-align:center;">Aksi</th>
                          </tr>
                          </thead>
                          <tbody>
                          <?php $no = 1;?>
                          @foreach($tipas as $value)
                            <tr>
                                <td style="text-align:center;"><?php echo $no ?></td>
                                <td>{{{ $value->sprovinsi->nama }}}</td>
                                <td>{{{ $value->kota }}}</td>
                                <td>{{{ $value->kattipa }}}</td>
                                <td>{{{ $value->nama }}}</td>
                                <td style="text-align:center;">
                                  <div class="btn-group">
                                    <a href="{{ route('admin.tipas.edit', ['tipas'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                    {{ Form::open(array('url'=>route('admin.tipas.destroy',['tipas'=>$value->id]),'method'=>'delete', 'style'=>'display:inline;')) }}
                                    {{ Form::button('<i class="fa fa-trash-o "></i>', array('type'=>'submit','class'=>'btn btn-danger btn-xs')) }}
                                    {{ Form::close() }}
                                  </div>
                                </td>
                            <?php $no++;?>
                            </tr>
                            @endforeach
                          </tbody>
                      </table>
                  </div>
            </div>
        </section>
    </div>
</div>
<!-- page end-->
@stop

@section('script')
  {{HTML::script('template/admin/assets/advanced-datatable/media/js/jquery.js')}}
  {{HTML::script('template/admin/assets/advanced-datatable/media/js/jquery.dataTables.js')}}
  {{HTML::script('template/admin/assets/data-tables/DT_bootstrap.js')}}
  <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
            $('#komoditis').dataTable();
        } );
    </script>
@stop