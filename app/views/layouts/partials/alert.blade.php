@if (Session::has('successMessage'))
	<div class="alert alert-success fade in">
		<button data-dismiss="alert" class="close close-sm" type="button">
	    	<i class="fa fa-times"></i>
	    </button>
	    {{ Session::get('successMessage') }}
	</div>
@elseif (Session::has('errorMessage'))
	<div class="alert alert-block alert-danger fade in">
    	<button data-dismiss="alert" class="close close-sm" type="button">
        	<i class="fa fa-times"></i>
     	</button>
    	{{ Session::get('errorMessage') }}
  	</div>
@endif