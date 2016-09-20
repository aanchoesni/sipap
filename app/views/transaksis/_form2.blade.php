<div class="form-group">
	{{ Form::label('komoditi', 'Komoditi', array('class' => 'control-label col-lg-2') ) }}
	<div class="col-lg-10">
		{{ Form::select('komoditi', array(''=>'')+Komoditi::orderBy('nama','ASC')->lists('nama','nama'), null, array(
				'id'=>'komoditi',
				'placeholder' => "Pilih Komoditi",
				'class'=>'form-control input-sm')) }}
	</div>
</div>
<div class="form-group">
	{{ Form::label('asal', 'Provinsi Asal', array('class' => 'control-label col-lg-2') ) }}
	<div class="col-lg-10">
		{{ Form::select('asal', array(''=>'')+Provinsi::orderBy('nama','ASC')->lists('nama','nama'), null, array(
				'id'=>'asal',
				'placeholder' => "Pilih Provinsi Asal",
				'class'=>'form-control input-sm')) }}
	</div>
</div>
<div class="form-group">
	{{ Form::label('tujuan', 'Provinsi Tujuan', array('class' => 'control-label col-lg-2') ) }}
	<div class="col-lg-10">
		{{ Form::select('tujuan', array(''=>'')+Provinsi::orderBy('nama','ASC')->lists('nama','nama'), null, array(
				'id'=>'tujuan',
				'placeholder' => "Pilih Provinsi Tujuan",
				'class'=>'form-control input-sm')) }}
	</div>
</div>
<div class="form-group">
	{{ Form::label('aktifitas', 'Jenis Aktifitas', array('class' => 'control-label col-lg-2') ) }}
	<div class="col-lg-10">
		{{ Form::select('aktifitas', array(''=>'', 'BONGKAR'=>'BONGKAR', 'MUAT'=>'MUAT'), null, array(
		        'id'=>'aktifitas',
		        'placeholder' => "Pilih Jenis Aktifitas",
		        'class'=>'form-control input-sm')) }}
	</div>
</div>
<div class="form-group">
	{{ Form::label('quantity', 'Quantity', array('class' => 'control-label col-lg-2')) }}
	<div class="col-lg-10">
		{{ Form::text('quantity', null, array('class' => 'form-control','placeholder'=>'masukkan quantity')) }}
	</div>
</div>
<div class="form-group">
	{{ Form::label('satuan', 'Satuan', array('class' => 'control-label col-lg-2')) }}
	<div class="col-lg-10">
		{{ Form::text('satuan', null, array('class' => 'form-control','placeholder'=>'masukkan satuan')) }}
	</div>
</div>
<div class="form-group">
	{{ Form::label('nilai', 'Harga', array('class' => 'control-label col-lg-2')) }}
	<div class="col-lg-10">
		{{ Form::text('nilai', null, array('class' => 'form-control','placeholder'=>'masukkan harga')) }}
	</div>
</div>
<div class="form-group">
	{{ Form::label('pelayaran', 'Mitra Pelayaran', array('class' => 'control-label col-lg-2') ) }}
	<div class="col-lg-10">
		{{ Form::select('pelayaran', array(''=>'')+Pelayaran::orderBy('nama','ASC')->lists('nama','nama'), null, array(
				'id'=>'pelayaran',
				'placeholder' => "Pilih Mitra Pelayaran",
				'class'=>'form-control input-sm')) }}
	</div>
</div>
<div class="form-group">
	{{ Form::label('angkutan', 'Nama Angkutan', array('class' => 'control-label col-lg-2')) }}
	<div class="col-lg-10">
		{{ Form::text('angkutan', null, array('class' => 'form-control','placeholder'=>'masukkan nama angkutan')) }}
	</div>
</div>
<div class="form-group">
	{{ Form::label('titikpantau', 'Titik Pantau', array('class' => 'control-label col-lg-2') ) }}
	<div class="col-lg-10">
		{{ Form::select('titikpantau', array(''=>'')+Tipa::orderBy('nama','ASC')->lists('nama','nama'), null, array(
				'id'=>'titikpantau',
				'placeholder' => "Pilih Titik Pantau",
				'class'=>'form-control input-sm')) }}
	</div>
</div>
<div class="form-group">
	{{ Form::label('jenisk', 'Jenis Kayu', array('class' => 'control-label col-lg-2')) }}
	<div class="col-lg-10">
		{{ Form::text('jenisk', null, array('class' => 'form-control','placeholder'=>'masukkan jenis kayu')) }}
	</div>
</div>
<div class="form-group">
	{{ Form::label('asalk', 'Asal Kayu', array('class' => 'control-label col-lg-2')) }}
	<div class="col-lg-10">
		{{ Form::text('asalk', null, array('class' => 'form-control','placeholder'=>'masukkan asal kayu')) }}
	</div>
</div>
<div class="form-group">
	{{ Form::label('waktuber', 'Waktu Berangkat', array('class' => 'control-label col-lg-2')) }}
	<div class="col-lg-10">
		{{ Form::text('waktuber', date('Y-m-d'), array('class' => 'form-control default-date-inseo','placeholder'=>'masukkan waktu berangkat', 'readonly')) }}
	</div>
</div>
<div class="form-group">
	{{ Form::label('waktutiba', 'Waktu Tiba', array('class' => 'control-label col-lg-2')) }}
	<div class="col-lg-10">
		{{ Form::text('waktutiba', date('Y-m-d'), array('class' => 'form-control default-date-inseo','placeholder'=>'masukkan waktu tiba', 'readonly')) }}
	</div>
</div>
<div class="form-group">
	{{ Form::label('penerima', 'Mitra Bisnis', array('class' => 'control-label col-lg-2') ) }}
	<div class="col-lg-10">
		{{ Form::select('penerima', array(''=>'')+Penerima::orderBy('nama','ASC')->lists('nama','nama'), null, array(
				'id'=>'penerima',
				'placeholder' => "Pilih Mitra Bisnis",
				'class'=>'form-control input-sm')) }}
	</div>
</div>
<div class="box-footer">
	{{Form::submit('Simpan', array('class'=>'btn btn-danger'))}}
	<a href="{{ URL::to('admin/transaksis') }}" class="btn btn-default" type="button">Batal</a>
</div>
