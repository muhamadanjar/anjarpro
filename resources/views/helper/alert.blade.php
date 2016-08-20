@extends('app2')
@section('content')
			<!-- Alert blocks -->
            <div class="panel panel-default">
                <div class="panel-heading"><h6 class="panel-title"><i class="icon-bubble-plus"></i> Peringatan</h6></div>
                <div class="panel-body">
		        	<div class="row">
		        		<div class="col-md-6">
							<div class="alert alert-block alert-danger fade in block-inner">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<h6><i class="icon-command"></i> Error !</h6>
								<hr>
								<p>Anda tidak berhak mengakses halaman ini.</p>
								<div class="text-left">
									<a class="btn btn-primary" href="{{ action('AdminCtrl@index') }}"><i class="icon-link"></i> Take action</a> 
									<a class="btn btn-success" href="{{ action('HomeController@index') }}"><i class="icon-link2"></i> Or do this</a>
								</div>
							</div>

							
		        		</div>

		        		
		        	</div>
	            </div>
	        </div>
	        <!-- /alert blocks -->
@stop