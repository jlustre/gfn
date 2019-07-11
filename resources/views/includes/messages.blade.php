@if(count($errors) > 0)
<!-- Errors Alert -->
<div class="alert alert-danger alert-dismissible fade show">
    <strong>Error!</strong> Please fix the following error/s before you proceed.
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <ul>
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif

@if(session('msg_success')) 
<!-- Success Alert -->
	<div class="alert alert-success alert-dismissible fade show">
	    <strong>Success!</strong> {{ session('msg_success') }}.
	    <button type="button" class="close" data-dismiss="alert">&times;</button>
	</div>
@endif

@if(session('msg_errors')) 
<!-- Errors Alert -->
	<div class="alert alert-danger alert-dismissible fade show">
	    <strong>Failed!</strong> {{ session('msg_errors') }}.
	    <button type="button" class="close" data-dismiss="alert">&times;</button>
	</div>
@endif
