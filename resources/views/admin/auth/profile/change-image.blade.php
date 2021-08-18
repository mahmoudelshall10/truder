@section('page-title')Change Image @endsection

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title">Change Image</h5>
			</div>

			<div class="card-body">
				<form action="{{route('admin.changeImage')}}" method="post" enctype="multipart/form-data">
                    @csrf
                   <input type="hidden" name="a" value="change-image" /> 

                	<div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="photo">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>

                    <br>
                    
                    <div class="row no-gutters mt-1">
                        <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                            <img src="{{url('/').'/'.Auth::user()->photo}}" class="img-fluid pr-2" alt="{{explode(' ',Auth::user()->name)[0]}}">
                        </div>
					          </div>
                    
                    <br>
                    <div class="form-group">    
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
			</div>

		</div>
	</div>
</div>