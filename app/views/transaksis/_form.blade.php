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
