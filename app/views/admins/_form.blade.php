<div class="form-group">
	{{ Form::label('last_name', 'Jenis Admin', array('class' => 'control-label col-lg-2') ) }}
	<div class="col-lg-10">
		{{ Form::select('last_name', array(''=>'','admin'=>'Super Admin', 'user'=>'Admin'), null, array(
				'id'=>'last_name',
				'placeholder' => "Pilih Jenis Admin",
				'class'=>'form-control input-sm')) }}
	</div>
</div>
<div class="form-group">
	{{ Form::label('first_name', 'Nama', array('class' => 'control-label col-lg-2')) }}
	<div class="col-lg-10">
		{{ Form::text('first_name', null, array('class' => 'form-control','placeholder'=>'masukkan nama')) }}
	</div>
</div>
<div class="form-group">
	{{ Form::label('email', 'Email', array('class' => 'control-label col-lg-2')) }}
	<div class="col-lg-10">
		{{ Form::text('email', null, array('class' => 'form-control','placeholder'=>'masukkan email')) }}
	</div>
</div>
<div class="form-group">
	{{ Form::label('password', 'Password', array('class' => 'control-label col-lg-2')) }}
	<div class="col-lg-10">
		{{ Form::password('password', array('class' => 'form-control','placeholder'=>'**********')) }}
	</div>
</div>
<div class="form-group">
	{{ Form::label('password_confirmation', 'Ulangi Password', array('class' => 'control-label col-lg-2')) }}
	<div class="col-lg-10">
		{{ Form::password('password_confirmation', array('class' => 'form-control','placeholder'=>'**********')) }}
	</div>
</div>
<div class="box-footer">
	{{Form::submit('Simpan', array('class'=>'btn btn-danger'))}}
	<a href="{{ URL::to('admin/admins') }}" class="btn btn-default" type="button">Batal</a>
</div>
