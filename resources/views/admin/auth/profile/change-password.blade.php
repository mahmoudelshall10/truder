@section('page-title')Change Password @endsection
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title">Change Password</h5>
			</div>

			<div class="card-body">
				<form action="{{route('admin.changePassword')}}" method="post">
                    @csrf
                    <input type="hidden" name="a" value="change-password" /> 

                    <div class="form-group">
                        <label for="old_password" class="form-label">Old Password</label>
                        <input type="password" id="old_password" name="old_password" class="form-control" placeholder="Old Password">
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                    </div>

                      <div class="form-group">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>
			</div>

		</div>
	</div>
</div>