<div class="form-group">
	{{ Form::label('jenis', 'Jenis Komoditi', array('class' => 'control-label col-lg-2') ) }}
	<div class="col-lg-10">
		{{ Form::select('jenis', array(''=>'')+Jnskomoditi::orderBy('nama','ASC')->lists('nama','nama'), null, array(
				'id'=>'jnskomoditis',
				'placeholder' => "Pilih Jenis Komoditi",
				'class'=>'form-control input-sm')) }}
	</div>
</div>
<div class="form-group">
	{{ Form::label('kode', 'Kode komoditi', array('class' => 'control-label col-lg-2')) }}
	<div class="col-lg-10">
		{{ Form::text('kode', null, array('class' => 'form-control','placeholder'=>'masukkan kode komoditi')) }}
	</div>
</div>
<div class="form-group">
	{{ Form::label('nama', 'Nama komoditi', array('class' => 'control-label col-lg-2')) }}
	<div class="col-lg-10">
		{{ Form::text('nama', null, array('class' => 'form-control','placeholder'=>'masukkan nama Komoditi')) }}
	</div>
</div>
<div class="box-footer">
	{{Form::submit('Simpan', array('class'=>'btn btn-danger'))}}
	<a href="{{ URL::to('admin/komoditis') }}" class="btn btn-default" type="button">Batal</a>
</div>
