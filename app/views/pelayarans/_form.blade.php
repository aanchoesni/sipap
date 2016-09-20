<div class="form-group">
	{{ Form::label('nama', 'Nama mitra pelayaran', array('class' => 'control-label col-lg-2')) }}
	<div class="col-lg-10">
		{{ Form::text('nama', null, array('class' => 'form-control','placeholder'=>'masukkan nama mitra pelayaran')) }}
	</div>
</div>
<div class="box-footer">
	{{Form::submit('Simpan', array('class'=>'btn btn-danger'))}}
	<a href="{{ URL::to('admin/pelayarans') }}" class="btn btn-default" type="button">Batal</a>
</div>
