@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
        </button>
		<div class="alert-message">
			{{ session()->get('success') }}
		</div>
    </div>
@endif

@if(session()->has('error'))
	<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h5><i class="icon fas fa-ban"></i> Alert!</h5>
		<div class="alert-message">
			{{ session()->get('error') }}
		</div>
	</div>
@endif

@if (count($errors) > 0)
<div class="alert alert-danger alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h5><i class="icon fas fa-ban"></i> Alert!</h5>
	<ul class="alert-message">
	@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
	@endforeach
	</ul>
</div>
@endif