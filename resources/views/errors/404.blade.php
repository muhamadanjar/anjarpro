@extends('app2')
@section('content')	
	<!-- Error wrapper -->
	<div class="error-wrapper text-center">
	    <h1>403</h1>
        <h6>- Oops, an error has occurred. Forbidden! -</h6>

        <!-- Error content -->
        <div class="error-content">
	    	<form class="block-inner" action="#">
	    		<div class="input-group">
					<input type="text" class="form-control" placeholder="Search...">
					<span class="input-group-btn">
						<button class="btn btn-primary" type="button">Search</button>
					</span>
				</div>
	    	</form>

	        <div class="row">
		        <div class="col-md-6">
		            <a href="{{ asset('/dashboard') }}" class="btn btn-danger btn-block">Back to dashboard</a>
	            </div>
	            <div class="col-md-6">
		            <a href="{{ asset('/') }}" class="btn btn-success btn-block">Back to the website</a>
	            </div>
	        </div>
        </div>
        <!-- /error content -->

	</div>  
	<!-- /error wrapper -->
@stop