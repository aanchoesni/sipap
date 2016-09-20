<div class="form-group">
	{{ Form::label('provinsi', 'Provinsi', array('class' => 'control-label col-lg-2') ) }}
	<div class="col-lg-10">
		{{ Form::select('provinsi', array(''=>'')+Provinsi::orderBy('nama','ASC')->lists('nama','id'), null, array(
				'id'=>'provinsi',
				'placeholder' => "Pilih provinsi",
				'class'=>'form-control input-sm')) }}
	</div>
</div>
<div class="form-group">
	{{ Form::label('kota', 'Kota', array('class' => 'control-label col-lg-2') ) }}
	<div class="col-lg-10">
		{{ Form::select('kota', array(''=>''), null, array(
	        'id'=>'kota',
	        'placeholder' => "Pilih kota",
	        'class'=>'form-control input-sm')) }}
	</div>
</div>
<div class="form-group">
	{{ Form::label('kattipa', 'Kategori Titik Pantau', array('class' => 'control-label col-lg-2') ) }}
	<div class="col-lg-10">
		{{ Form::select('kattipa', array(''=>'')+Kattipa::orderBy('nama','ASC')->lists('nama','nama'), null, array(
				'id'=>'kattipa',
				'placeholder' => "Pilih Kategori Titik Pantau",
				'class'=>'form-control input-sm')) }}
	</div>
</div>
<div class="form-group">
	{{ Form::label('nama', 'Nama Titik Pantau', array('class' => 'control-label col-lg-2')) }}
	<div class="col-lg-10">
		{{ Form::text('nama', null, array('class' => 'form-control','placeholder'=>'masukkan nama titik pantau')) }}
	</div>
</div>
<div class="box-footer">
	{{Form::submit('Simpan', array('class'=>'btn btn-danger'))}}
	<a href="{{ URL::to('admin/tipas') }}" class="btn btn-default" type="button">Batal</a>
</div>
