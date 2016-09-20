<div class="form-group">
	{{ Form::label('nama', 'Nama kategori titik pantau', array('class' => 'control-label col-lg-2')) }}
	<div class="col-lg-10">
		{{ Form::text('nama', null, array('class' => 'form-control','placeholder'=>'masukkan kategori titik pantau')) }}
	</div>
</div>
<div class="box-footer">
	{{Form::submit('Simpan', array('class'=>'btn btn-danger'))}}
	<a href="{{ URL::to('admin/kattipas') }}" class="btn btn-default" type="button">Batal</a>
</div>
