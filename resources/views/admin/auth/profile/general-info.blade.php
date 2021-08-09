@section('page-title') General Info @endsection
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title">General Info</h5>
			</div>

			<div class="card-body">
				<form action="{{route('admin.generalInfo')}}" method="post">
                    @csrf
                    <input type="hidden" name="a" value="general-info" /> 
                   <div class="form-group">
						<label class="form-label">Name</label>
						<input type="text" class="form-control" placeholder="Name" name="name" value="{{Auth::user()->name}}">
					</div>

                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>
			</div>

		</div>
	</div>
</div>