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
                Daftar Mitra Bisnis
                {{ HTML::buttonAdd() }}
            </header>
            <div class="panel-body"  style:"overflow: scroll;">
                  <div class="adv-table">
                      <table  class="display table table-bordered table-striped" id="penerimas">
                        <thead>
                          <tr>
                              <th style="text-align:center;" width="10%">No</th>
                              <th style="text-align:center;" width="30%">Nama Mitra Bisnis</th>
                              <th style="text-align:center;" width="30%">Alamat</th>
                              <th style="text-align:center;" width="20%">Kota</th>
                              <th style="text-align:center;" width="10%">Aksi</th>
                          </tr>
                          </thead>
                          <tbody>
                          <?php $no = 1;?>
                          @foreach($penerimas as $value)
                            <tr>
                                <td style="text-align:center;"><?php echo $no ?></td>
                                <td>{{{ $value->nama }}}</td>
                                <td>{{{ $value->alamat }}}</td>
                                <td>{{{ $value->kota }}}</td>
                                <td style="text-align:center;">
                                  <div class="btn-group">
                                    <a href="{{ route('admin.penerimas.edit', ['penerimas'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                    {{ Form::open(array('url'=>route('admin.penerimas.destroy',['penerimas'=>$value->id]),'method'=>'delete', 'style'=>'display:inline;')) }}
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
            $('#penerimas').dataTable();
        } );
    </script>
@stop