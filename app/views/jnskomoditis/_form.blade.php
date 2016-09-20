<div class="form-group">
	{{ Form::label('kode', 'Kode jenis komoditi', array('class' => 'control-label col-lg-2')) }}
	<div class="col-lg-10">
		{{ Form::text('kode', null, array('class' => 'form-control','placeholder'=>'masukkan kode jenis komoditi')) }}
	</div>
</div>
<div class="form-group">
	{{ Form::label('nama', 'Nama jenis komoditi', array('class' => 'control-label col-lg-2')) }}
	<div class="col-lg-10">
		{{ Form::text('nama', null, array('class' => 'form-control','placeholder'=>'masukkan nama Jenis Komoditi')) }}
	</div>
</div>
<div class="box-footer">
	{{Form::submit('Simpan', array('class'=>'btn btn-danger'))}}
	<a href="{{ URL::to('admin/jnskomoditis') }}" class="btn btn-default" type="button">Batal</a>
</div>
