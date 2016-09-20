@if ($errors->count() > 0)
	<div class="alert alert-block alert-danger fade in">
		<button data-dismiss="alert" class="close close-sm" type="button">
        	<i class="fa fa-times"></i>
     	</button>
		@foreach ($errors->all(':message<br>') as $error)
			{{ $error }}
		@endforeach
	</div>
@endif
