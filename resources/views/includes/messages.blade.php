@if(count($errors) > 0)
<!-- Errors Alert -->
<div class="alert alert-danger" style="color: red;  display: block;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
        <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong>Oh snap!</strong> Change a few things up and try submitting again.

     </div> <!-- success -->
@endif

@if(session('msg_success')) 
<!-- Success Alert -->
	<div class="alert alert-success alert-dismissible" style="color: green;  display: block;">
	    <strong>Success!</strong> {{ session('msg_success') }}.
	    <button type="button" class="close" data-dismiss="alert">&times;</button>
	</div>
@endif

@if(session('msg_errors')) 
<!-- There is error Alert -->
	<div class="alert alert-danger alert-dismissible fade show">
	    <strong>Failed!</strong> {{ session('msg_errors') }}.
	    <button type="button" class="close" data-dismiss="alert">&times;</button>
	            <ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif
