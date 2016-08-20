<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
<meta name="_token" content="{!! csrf_token() !!}"/>

<link href="{{ url('images/logo.png') }}" type="image/png" rel="icon">
@yield('title')

<title>anjarPro </title>

@include('helper/css')

@include('helper/script')
<script type="text/javascript" src="{{ asset('londinium/js/application.js') }}"></script>

</head>

<body class="full-width">

	@include('helper/hmenu')

	<!-- Page container -->
 	<div class="page-container">
		<!-- Page content -->
	 	<div class="page-content">


			<!-- Page header -->
			<div class="page-header">
				<div class="page-title">
					<h3>AnjarPro <small>Aplikasi Evo</small></h3>
				</div>

				<div id="reportrange" class="range">
					<div class="visible-xs header-element-toggle">
						<a class="btn btn-primary btn-icon"><i class="icon-calendar"></i></a>
					</div>
					<div class="date-range"></div>
					<span class="label label-danger">9</span>
				</div>
			</div>
			<!-- /page header -->

			@yield('breadcrumbs')

			@if (count($errors) > 0)
				<div class="callout callout-danger fade in">
					<button data-dismiss="alert" class="close" type="button">×</button>
					<h5><strong>Whoops!</strong> Ada beberapa masalah dengan apa yang Anda input.</h5>
					<ul>
						
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif

			@if(Session::has('message'))
		        {!! Session::get('message') !!}
			@endif


	        @include('helper/delete_confirm')

			@yield('content')


			

            <!-- Default modal -->
			<div id="default-modal" class="modal fade" tabindex="-1" role="dialog">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Modal title</h4>
						</div>

				        <!-- New invoice template -->
				        <div class="panel">
							<div class="panel-body">

								<div class="row invoice-header">
									<div class="col-sm-6">
										<h3>The Romulan Empire</h3>
										<span>Building a Better Tomorrow Through Your Destruction</span>
									</div>

									<div class="col-sm-6">
			 							<ul class="invoice-details">
											<li>Invoice # <strong class="text-danger">4759</strong></li>
											<li>Date of Invoice: <strong>01-24-2012</strong></li>
											<li>Due Date: <strong>02-10-2012</strong></li>
										</ul>
									</div>
								</div>


								<div class="row">
									<div class="col-sm-5">
										<h6>Invoice To:</h6>
			 							<ul>
											<li><a href="#">Hiram Roth</a></li>
											<li>United Federation of Planets</li>
											<li><a href="#">president.roth@ufop.uni</a></li>
											<li>2269 Elba Lane</li>
											<li>Paris</li>
											<li>France</li>
											<li>888-555-2311</li>
										</ul>
									</div>


									<div class="col-sm-4">
										<h6>Invoice From:</h6>
			 							<ul>
											<li><a href="#">Admiral Valdore</a></li>
											<li>Romulan Empire</li>
											<li><a href="#">admiral.valdore@theempire.uni</a></li>
											<li>5151 Pardek Memorial Way</li>
											<li>Krocton Segment</li>
											<li>Romulus</li>
											<li>000-555-9988</li>
										</ul>
									</div>


									<div class="col-sm-3">
										<h6>Invoice Details:</h6>
										<ul>
											<li>Total hours spent: <strong class="pull-right">379</strong></li>
											<li>Responsible: <a href="#" class="pull-right">Eugene Kopyov</a></li>
											<li>Issued by: <a href="#" class="pull-right">Jennifer Notes</a></li>
											<li>Payment method: <strong class="pull-right">Wire transfer</strong></li>
											<li class="invoice-status"><strong>Current status: <span class="label label-danger pull-right">Unpaid</span></strong></li>
										</ul>
									</div>
								</div>

							</div>


							<div class="table-responsive">
							    <table class="table table-striped table-bordered">
							        <thead>
							            <tr>
							                <th>Product</th>
							                <th>Descrition</th>
							                <th>Discount</th>
							                <th>Total</th>
							            </tr>
							        </thead>
							        <tbody>
							            <tr>
							                <td>Concept</td>
							                <td>Creating project concept and logic</td>
							                <td>0</td>
							                <td><strong>$1,100</strong></td>
							            </tr>
							            <tr>
							                <td>General design</td>
							                <td>Design prototype</td>
							                <td>0</td>
							                <td><strong>$2,000</strong></td>
							            </tr>
							            <tr>
							                <td>Front end development</td>
							                <td>Coding and connecting front end</td>
							                <td>0</td>
							                <td><strong>$1,600</strong></td>
							            </tr>
							            <tr>
							                <td>Database</td>
							                <td>Creating and connecting database</td>
							                <td>0</td>
							                <td><strong>$890</strong></td>
							            </tr>
							        </tbody>
							    </table>
							</div>

							<div class="panel-body">
								<div class="row invoice-payment">
									<div class="col-sm-8">
										<h6>Payment method:</h6>
										<label class="radio">
											<input type="radio" name="payment-unpaid" class="styled">
											Checkout with Google
										</label>
										<label class="radio">
											<input type="radio" name="payment-unpaid" class="styled">
											Checkout with Amazon
										</label>
										<label class="radio">
											<input type="radio" name="payment-unpaid" class="styled" checked="checked">
											Wire transfer
										</label>
										<label class="radio">
											<input type="radio" name="payment-unpaid" class="styled">
											Checkout with Paypal
										</label>
										<label class="radio">
											<input type="radio" name="payment-unpaid" class="styled">
											Checkout with Skrill
										</label>
									</div>

									<div class="col-sm-4">
										<h6>Total:</h6>
										<table class="table">
											<tbody>
												<tr>
													<th>Subtotal:</th>
													<td class="text-right">$103,850</td>
												</tr>
												<tr>
													<th>Tax:</th>
													<td class="text-right">$5,192</td>
												</tr>
												<tr>
													<th>Total:</th>
													<td class="text-right text-danger"><h6>$109,042</h6></td>
												</tr>
											</tbody>
										</table>
										<div class="btn-group pull-right">
											<button type="button" class="btn btn-success"><i class="icon-checkbox-partial"></i> Confirm payment</button>
											<button type="button" class="btn btn-primary"><i class="icon-print2"></i> Print</button>
										</div>
									</div>
								</div>

								<h6>Notes &amp; Information:</h6>
								This invoice contains a incomplete list of items destroyed by the Federation ship Enterprise on Startdate 5401.6 in an unprovked attacked on a peaceful &amp; wholly scientific mission to Outpost 775.
								The Romulan people demand immediate compensation for the loss of their Warbird, Shuttle, Cloaking Device, and to a lesser extent thier troops.
							</div>
						</div>   
						<!-- /new invoice template -->

						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="button" class="btn btn-primary">Save changes</button>
						</div>
					</div>
				</div>
			</div>
			<!-- /default modal -->


	        <!-- Footer -->
	        <div class="footer clearfix">
		        <div class="pull-left">&copy; 2013. Muhamad Anjar Template by <a href="#">Eugene Kopyov</a></div>
	        	<div class="pull-right icons-group">
	        		<a href="#"><i class="icon-screen2"></i></a>
	        		<a href="#"><i class="icon-balance"></i></a>
	        		<a href="#"><i class="icon-cog3"></i></a>
	        	</div>
	        </div>
	        <!-- /footer -->
		</div>
		<!-- /page content -->


	</div>
	<!-- /page container -->
	<script type="text/javascript" src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('tinymce_init.js') }}"></script>
	<script type="text/javascript" src="{{ asset('anjarpro.js') }}"></script>

</body>
</html>