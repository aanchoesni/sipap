<div class="form-group">
	{{ Form::label('nama', 'Nama mitra bisnis', array('class' => 'control-label col-lg-2')) }}
	<div class="col-lg-10">
		{{ Form::text('nama', null, array('class' => 'form-control','placeholder'=>'masukkan nama mitra bisnis')) }}
	</div>
</div>
<div class="form-group">
	{{ Form::label('alamat', 'Alamat mitra bisnis', array('class' => 'control-label col-lg-2')) }}
	<div class="col-lg-10">
		{{ Form::text('alamat', null, array('class' => 'form-control','placeholder'=>'masukkan alamat mitra bisnis')) }}
	</div>
</div>
<div class="form-group">
	{{ Form::label('kota', 'Kota', array('class' => 'control-label col-lg-2') ) }}
	<div class="col-lg-10">
		{{ Form::select('kota', array(''=>'')+Kabupaten::orderBy('nama','ASC')->lists('nama','nama'), null, array(
				'id'=>'kota',
				'placeholder' => "Pilih kota",
				'class'=>'form-control input-sm')) }}
	</div>
</div>
<div class="box-footer">
	{{Form::submit('Simpan', array('class'=>'btn btn-danger'))}}
	<a href="{{ URL::to('admin/penerimas') }}" class="btn btn-default" type="button">Batal</a>
</div>
