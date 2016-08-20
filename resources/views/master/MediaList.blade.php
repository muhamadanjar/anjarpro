@extends('app2')
@section('content')	
			<!-- Page tabs -->
            <div class="tabbable page-tabs">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#image-grid" data-toggle="tab"><i class="icon-images"></i> Image grid</a></li>
                    <li><a href="#video-grid" data-toggle="tab"><i class="icon-movie2"></i> Video grid</a></li>
                    <li><a href="#gallery-style" data-toggle="tab"><i class="icon-grid"></i> Gallery style</a></li>
                    <li><a href="#images-table" data-toggle="tab"><i class="icon-table"></i> Table with images</a></li>
                </ul>
                <div class="tab-content">

                	<!-- First tab -->
                	<div class="tab-pane active fade in" id="image-grid">

                		<!-- Top option bar -->
                		<div class="bar block clearfix">
                			<form class="bar-left" action="#">
                				<label>Search entries: </label>
                				<input type="text" class="form-control" placeholder="Gallery search...">
                				<button type="button" class="btn btn-primary btn-icon btn-loading" data-loading-text="<i class='icon-spinner7 spin'></i>"><i class="icon-search3"></i></button>
                			</form>

                			<div class="bar-right">
				    			<label>Sorting: </label>
				                <select name="select2" class="select">
				                    <option value="bydate">Sort by date</option>
				                    <option value="bytime">Sort by time</option>
				                    <option value="bycategory">Sort by category</option>
				                    <option value="bysize">Sort by size</option>
				                </select>
                				<button type="button" class="btn btn-primary btn-icon btn-loading" data-loading-text="<i class='icon-spinner7 spin'></i>"><i class="icon-sort"></i></button>
                			</div>
                		</div>
                		<!-- /top option bar -->


		                <!-- With titles (frame) -->
						<div class="row">
							<div class="col-lg-3 col-md-6 col-sm-6">
								<div class="block">
								    <div class="thumbnail thumbnail-boxed">
								    	<div class="thumb">
											<img alt="" src="http://placehold.it/300">
											<div class="thumb-options">
												<span>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-quill2"></i></a>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-remove"></i></a>
												</span>
											</div>
									    </div>
								    	<div class="caption">
								    		<a href="#" title="" class="caption-title">Aenean Malesuada Consectetur Risus</a>
								    		Donec id elit non mi porta gravida at eget metus. Praesent commodo cursus magna, vel scelerisque nisl consectetur mollis ornare vel leo.
								    	</div>
								    </div>
								</div>

								<div class="block">
								    <div class="thumbnail thumbnail-boxed">
								    	<div class="thumb">
											<img alt="" src="http://placehold.it/300">
											<div class="thumb-options">
												<span>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-quill2"></i></a>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-remove"></i></a>
												</span>
											</div>
									    </div>
								    	<div class="caption">
								    		<a href="#" title="" class="caption-title">Aenean Malesuada Consectetur Risus</a>
								    		Donec id elit non mi porta gravida at eget metus. Praesent commodo cursus magna, vel scelerisque nisl consectetur mollis ornare vel leo.
								    	</div>
								    </div>
								</div>
							</div>

							<div class="col-lg-3 col-md-6 col-sm-6">
								<div class="block">
								    <div class="thumbnail thumbnail-boxed">
								    	<div class="thumb">
											<img alt="" src="http://placehold.it/300">
											<div class="thumb-options">
												<span>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-quill2"></i></a>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-remove"></i></a>
												</span>
											</div>
									    </div>
								    	<div class="caption">
								    		<a href="#" title="" class="caption-title">Aenean Malesuada Consectetur Risus</a>
								    		Donec id elit non mi porta gravida at eget metus. Praesent commodo cursus magna, vel scelerisque nisl consectetur mollis ornare vel leo.
								    	</div>
								    </div>
								</div>

								<div class="block">
								    <div class="thumbnail thumbnail-boxed">
								    	<div class="thumb">
											<img alt="" src="http://placehold.it/300">
											<div class="thumb-options">
												<span>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-quill2"></i></a>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-remove"></i></a>
												</span>
											</div>
									    </div>
								    	<div class="caption">
								    		<a href="#" title="" class="caption-title">Aenean Malesuada Consectetur Risus</a>
								    		Donec id elit non mi porta gravida at eget metus. Praesent commodo cursus magna, vel scelerisque nisl consectetur mollis ornare vel leo.
								    	</div>
								    </div>
								</div>
							</div>

							<div class="col-lg-3 col-md-6 col-sm-6">
								<div class="block">
								    <div class="thumbnail thumbnail-boxed">
								    	<div class="thumb">
											<img alt="" src="http://placehold.it/300">
											<div class="thumb-options">
												<span>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-quill2"></i></a>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-remove"></i></a>
												</span>
											</div>
									    </div>
								    	<div class="caption">
								    		<a href="#" title="" class="caption-title">Aenean Malesuada Consectetur Risus</a>
								    		Donec id elit non mi porta gravida at eget metus. Praesent commodo cursus magna, vel scelerisque nisl consectetur mollis ornare vel leo.
								    	</div>
								    </div>
								</div>

								<div class="block">
								    <div class="thumbnail thumbnail-boxed">
								    	<div class="thumb">
											<img alt="" src="http://placehold.it/300">
											<div class="thumb-options">
												<span>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-quill2"></i></a>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-remove"></i></a>
												</span>
											</div>
									    </div>
								    	<div class="caption">
								    		<a href="#" title="" class="caption-title">Aenean Malesuada Consectetur Risus</a>
								    		Donec id elit non mi porta gravida at eget metus. Praesent commodo cursus magna, vel scelerisque nisl consectetur mollis ornare vel leo.
								    	</div>
								    </div>
								</div>
							</div>

							<div class="col-lg-3 col-md-6 col-sm-6">
								<div class="block">
								    <div class="thumbnail thumbnail-boxed">
								    	<div class="thumb">
											<img alt="" src="http://placehold.it/300">
											<div class="thumb-options">
												<span>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-quill2"></i></a>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-remove"></i></a>
												</span>
											</div>
									    </div>
								    	<div class="caption">
								    		<a href="#" title="" class="caption-title">Aenean Malesuada Consectetur Risus</a>
								    		Donec id elit non mi porta gravida at eget metus. Praesent commodo cursus magna, vel scelerisque nisl consectetur mollis ornare vel leo.
								    	</div>
								    </div>
								</div>

								<div class="block">
								    <div class="thumbnail thumbnail-boxed">
								    	<div class="thumb">
											<img alt="" src="http://placehold.it/300">
											<div class="thumb-options">
												<span>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-quill2"></i></a>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-remove"></i></a>
												</span>
											</div>
									    </div>
								    	<div class="caption">
								    		<a href="#" title="" class="caption-title">Aenean Malesuada Consectetur Risus</a>
								    		Donec id elit non mi porta gravida at eget metus. Praesent commodo cursus magna, vel scelerisque nisl consectetur mollis ornare vel leo.
								    	</div>
								    </div>
								</div>
							</div>
						</div>
		                <!-- /with titles (frame) -->


		                <hr>


						<h6><i class="icon-checkbox-partial"></i> Without frame</h6>


		                <!-- With titles (no frame) -->
						<div class="row">
							<div class="col-lg-3 col-md-6 col-sm-6">
								<div class="block">
								    <div class="thumbnail">
								    	<div class="thumb">
											<img alt="" src="http://placehold.it/300">
											<div class="thumb-options">
												<span>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-quill2"></i></a>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-remove"></i></a>
												</span>
											</div>
									    </div>
								    	<div class="caption">
								    		<a href="#" title="" class="caption-title">Aenean Malesuada Consectetur Risus</a>
								    		Donec id elit non mi porta gravida at eget metus. Praesent commodo cursus magna, vel scelerisque nisl consectetur mollis ornare vel leo.
								    	</div>
								    </div>
								</div>

								<div class="block">
								    <div class="thumbnail">
								    	<div class="thumb">
											<img alt="" src="http://placehold.it/300">
											<div class="thumb-options">
												<span>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-quill2"></i></a>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-remove"></i></a>
												</span>
											</div>
									    </div>
								    	<div class="caption">
								    		<a href="#" title="" class="caption-title">Aenean Malesuada Consectetur Risus</a>
								    		Donec id elit non mi porta gravida at eget metus. Praesent commodo cursus magna, vel scelerisque nisl consectetur mollis ornare vel leo.
								    	</div>
								    </div>
								</div>
							</div>

							<div class="col-lg-3 col-md-6 col-sm-6">
								<div class="block">
								    <div class="thumbnail">
								    	<div class="thumb">
											<img alt="" src="http://placehold.it/300">
											<div class="thumb-options">
												<span>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-quill2"></i></a>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-remove"></i></a>
												</span>
											</div>
									    </div>
								    	<div class="caption">
								    		<a href="#" title="" class="caption-title">Aenean Malesuada Consectetur Risus</a>
								    		Donec id elit non mi porta gravida at eget metus. Praesent commodo cursus magna, vel scelerisque nisl consectetur mollis ornare vel leo.
								    	</div>
								    </div>
								</div>

								<div class="block">
								    <div class="thumbnail">
								    	<div class="thumb">
											<img alt="" src="http://placehold.it/300">
											<div class="thumb-options">
												<span>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-quill2"></i></a>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-remove"></i></a>
												</span>
											</div>
									    </div>
								    	<div class="caption">
								    		<a href="#" title="" class="caption-title">Aenean Malesuada Consectetur Risus</a>
								    		Donec id elit non mi porta gravida at eget metus. Praesent commodo cursus magna, vel scelerisque nisl consectetur mollis ornare vel leo.
								    	</div>
								    </div>
								</div>
							</div>

							<div class="col-lg-3 col-md-6 col-sm-6">
								<div class="block">
								    <div class="thumbnail">
								    	<div class="thumb">
											<img alt="" src="http://placehold.it/300">
											<div class="thumb-options">
												<span>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-quill2"></i></a>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-remove"></i></a>
												</span>
											</div>
									    </div>
								    	<div class="caption">
								    		<a href="#" title="" class="caption-title">Aenean Malesuada Consectetur Risus</a>
								    		Donec id elit non mi porta gravida at eget metus. Praesent commodo cursus magna, vel scelerisque nisl consectetur mollis ornare vel leo.
								    	</div>
								    </div>
								</div>

								<div class="block">
								    <div class="thumbnail">
								    	<div class="thumb">
											<img alt="" src="http://placehold.it/300">
											<div class="thumb-options">
												<span>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-quill2"></i></a>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-remove"></i></a>
												</span>
											</div>
									    </div>
								    	<div class="caption">
								    		<a href="#" title="" class="caption-title">Aenean Malesuada Consectetur Risus</a>
								    		Donec id elit non mi porta gravida at eget metus. Praesent commodo cursus magna, vel scelerisque nisl consectetur mollis ornare vel leo.
								    	</div>
								    </div>
								</div>
							</div>

							<div class="col-lg-3 col-md-6 col-sm-6">
								<div class="block">
								    <div class="thumbnail">
								    	<div class="thumb">
											<img alt="" src="http://placehold.it/300">
											<div class="thumb-options">
												<span>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-quill2"></i></a>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-remove"></i></a>
												</span>
											</div>
									    </div>
								    	<div class="caption">
								    		<a href="#" title="" class="caption-title">Aenean Malesuada Consectetur Risus</a>
								    		Donec id elit non mi porta gravida at eget metus. Praesent commodo cursus magna, vel scelerisque nisl consectetur mollis ornare vel leo.
								    	</div>
								    </div>
								</div>

								<div class="block">
								    <div class="thumbnail">
								    	<div class="thumb">
											<img alt="" src="http://placehold.it/300">
											<div class="thumb-options">
												<span>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-quill2"></i></a>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-remove"></i></a>
												</span>
											</div>
									    </div>
								    	<div class="caption">
								    		<a href="#" title="" class="caption-title">Aenean Malesuada Consectetur Risus</a>
								    		Donec id elit non mi porta gravida at eget metus. Praesent commodo cursus magna, vel scelerisque nisl consectetur mollis ornare vel leo.
								    	</div>
								    </div>
								</div>
							</div>
						</div>
		                <!-- /with titles (no frame) -->


		                <!-- Pagination -->
		                <div class="text-center block">
                            <ul class="pagination">
                                <li><a href="#">&larr;</a></li>
                                <li><a href="#">1</a></li>
                                <li class="active"><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">&rarr;</a></li>
                            </ul>
                        </div>
                		<!-- /pagination -->

                	</div>
                	<!-- /first tab -->


                	<!-- Second tab -->
                	<div class="tab-pane fade" id="video-grid">

                		<!-- Top option bar -->
                		<div class="bar block clearfix">
                			<form class="bar-left" action="#">
                				<label>Search entries: </label>
                				<input type="text" class="form-control" placeholder="Gallery search...">
                				<button type="button" class="btn btn-primary btn-icon btn-loading" data-loading-text="<i class='icon-spinner7 spin'></i>"><i class="icon-search3"></i></button>
                			</form>

                			<div class="bar-right">
				    			<label>Sorting: </label>
				                <select name="select2" class="select">
				                    <option value="bydate">Sort by date</option>
				                    <option value="bytime">Sort by time</option>
				                    <option value="bycategory">Sort by category</option>
				                    <option value="bysize">Sort by size</option>
				                </select>
                				<button type="button" class="btn btn-primary btn-icon btn-loading" data-loading-text="<i class='icon-spinner7 spin'></i>"><i class="icon-sort"></i></button>
                			</div>
                		</div>
                		<!-- /top option bar -->


		                <!-- Video with titles (frame) -->
						<div class="row">
							<div class="col-lg-3 col-md-6 col-sm-6">
								<div class="block">
								    <div class="thumbnail thumbnail-boxed">
								    	<div class="thumb">
											<iframe src="http://www.youtube.com/embed/yo3M6EB8kmk"></iframe>
									    </div>
								    	<div class="caption">
								    		<a href="#" title="" class="caption-title">Aenean Malesuada Consectetur Risus</a>
								    		Donec id elit non mi porta gravida at eget metus. Praesent commodo cursus magna, vel scelerisque nisl consectetur mollis ornare vel leo.
								    	</div>
								    </div>
								</div>
							</div>

							<div class="col-lg-3 col-md-6 col-sm-6">
								<div class="block">
								    <div class="thumbnail thumbnail-boxed">
								    	<div class="thumb">
											<iframe src="http://www.youtube.com/embed/A3PDXmYoF5U"></iframe>
									    </div>
								    	<div class="caption">
								    		<a href="#" title="" class="caption-title">Aenean Malesuada Consectetur Risus</a>
								    		Donec id elit non mi porta gravida at eget metus. Praesent commodo cursus magna, vel scelerisque nisl consectetur mollis ornare vel leo.
								    	</div>
								    </div>
								</div>
							</div>

							<div class="col-lg-3 col-md-6 col-sm-6">
								<div class="block">
								    <div class="thumbnail thumbnail-boxed">
								    	<div class="thumb">
											<iframe src="http://www.youtube.com/embed/GUEZCxBcM78"></iframe>
									    </div>
								    	<div class="caption">
								    		<a href="#" title="" class="caption-title">Aenean Malesuada Consectetur Risus</a>
								    		Donec id elit non mi porta gravida at eget metus. Praesent commodo cursus magna, vel scelerisque nisl consectetur mollis ornare vel leo.
								    	</div>
								    </div>
								</div>
							</div>

							<div class="col-lg-3 col-md-6 col-sm-6">
								<div class="block">
								    <div class="thumbnail thumbnail-boxed">
								    	<div class="thumb">
											<iframe src="http://www.youtube.com/embed/GLC2BrmcYTY"></iframe>
									    </div>
								    	<div class="caption">
								    		<a href="#" title="" class="caption-title">Aenean Malesuada Consectetur Risus</a>
								    		Donec id elit non mi porta gravida at eget metus. Praesent commodo cursus magna, vel scelerisque nisl consectetur mollis ornare vel leo.
								    	</div>
								    </div>
								</div>
							</div>
						</div>
		                <!-- /video with titles (frame) -->


		                <hr>


						<h6><i class="icon-checkbox-partial"></i> Without frame</h6>


		                <!-- Video with titles (no frame) -->
						<div class="row">
							<div class="col-lg-3 col-md-6 col-sm-6">
								<div class="block">
								    <div class="thumbnail">
								    	<div class="thumb">
											<iframe src="http://www.youtube.com/embed/yo3M6EB8kmk"></iframe>
									    </div>
								    	<div class="caption">
								    		<a href="#" title="" class="caption-title">Aenean Malesuada Consectetur Risus</a>
								    		Donec id elit non mi porta gravida at eget metus. Praesent commodo cursus magna, vel scelerisque nisl consectetur mollis ornare vel leo.
								    	</div>
								    </div>
								</div>
							</div>

							<div class="col-lg-3 col-md-6 col-sm-6">
								<div class="block">
								    <div class="thumbnail">
								    	<div class="thumb">
											<iframe src="http://www.youtube.com/embed/A3PDXmYoF5U"></iframe>
									    </div>
								    	<div class="caption">
								    		<a href="#" title="" class="caption-title">Aenean Malesuada Consectetur Risus</a>
								    		Donec id elit non mi porta gravida at eget metus. Praesent commodo cursus magna, vel scelerisque nisl consectetur mollis ornare vel leo.
								    	</div>
								    </div>
								</div>
							</div>

							<div class="col-lg-3 col-md-6 col-sm-6">
								<div class="block">
								    <div class="thumbnail">
								    	<div class="thumb">
											<iframe src="http://www.youtube.com/embed/GUEZCxBcM78"></iframe>
									    </div>
								    	<div class="caption">
								    		<a href="#" title="" class="caption-title">Aenean Malesuada Consectetur Risus</a>
								    		Donec id elit non mi porta gravida at eget metus. Praesent commodo cursus magna, vel scelerisque nisl consectetur mollis ornare vel leo.
								    	</div>
								    </div>
								</div>
							</div>

							<div class="col-lg-3 col-md-6 col-sm-6">
								<div class="block">
								    <div class="thumbnail">
								    	<div class="thumb">
											<iframe src="http://www.youtube.com/embed/GLC2BrmcYTY"></iframe>
									    </div>
								    	<div class="caption">
								    		<a href="#" title="" class="caption-title">Aenean Malesuada Consectetur Risus</a>
								    		Donec id elit non mi porta gravida at eget metus. Praesent commodo cursus magna, vel scelerisque nisl consectetur mollis ornare vel leo.
								    	</div>
								    </div>
								</div>
							</div>
						</div>
		                <!-- /video with titles (no frame) -->


		                <!-- Pagination -->
		                <div class="text-center block">
                            <ul class="pagination">
                                <li><a href="#">&larr;</a></li>
                                <li><a href="#">1</a></li>
                                <li class="active"><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">&rarr;</a></li>
                            </ul>
                        </div>
                		<!-- /pagination -->

                	</div>
                	<!-- /second tab -->


                	<!-- Third tab -->
                	<div class="tab-pane fade" id="gallery-style">

                		<!-- Top option bar -->
                		<div class="bar block clearfix">
                			<form class="bar-left" action="#">
                				<label>Search entries: </label>
                				<input type="text" class="form-control" placeholder="Gallery search...">
                				<button type="button" class="btn btn-primary btn-icon btn-loading" data-loading-text="<i class='icon-spinner7 spin'></i>"><i class="icon-search3"></i></button>
                			</form>

                			<div class="bar-right">
				    			<label>Sorting: </label>
				                <select name="select2" class="select">
				                    <option value="bydate">Sort by date</option>
				                    <option value="bytime">Sort by time</option>
				                    <option value="bycategory">Sort by category</option>
				                    <option value="bysize">Sort by size</option>
				                </select>
                				<button type="button" class="btn btn-primary btn-icon btn-loading" data-loading-text="<i class='icon-spinner7 spin'></i>"><i class="icon-sort"></i></button>
                			</div>
                		</div>
                		<!-- /top option bar -->


		                <!-- Without titles (frame) -->
						<div class="row">
							<div class="col-lg-3 col-md-6 col-sm-6">
								<div class="block">
								    <div class="thumbnail thumbnail-boxed">
								    	<div class="thumb">
											<img alt="" src="http://placehold.it/300">
											<div class="thumb-options">
												<span>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-quill2"></i></a>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-remove"></i></a>
												</span>
											</div>
									    </div>
								    </div>
								</div>

								<div class="block">
								    <div class="thumbnail thumbnail-boxed">
								    	<div class="thumb">
											<img alt="" src="http://placehold.it/300">
											<div class="thumb-options">
												<span>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-quill2"></i></a>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-remove"></i></a>
												</span>
											</div>
									    </div>
								    </div>
								</div>
							</div>

							<div class="col-lg-3 col-md-6 col-sm-6">
								<div class="block">
								    <div class="thumbnail thumbnail-boxed">
								    	<div class="thumb">
											<img alt="" src="http://placehold.it/300">
											<div class="thumb-options">
												<span>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-quill2"></i></a>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-remove"></i></a>
												</span>
											</div>
									    </div>
								    </div>
								</div>

								<div class="block">
								    <div class="thumbnail thumbnail-boxed">
								    	<div class="thumb">
											<img alt="" src="http://placehold.it/300">
											<div class="thumb-options">
												<span>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-quill2"></i></a>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-remove"></i></a>
												</span>
											</div>
									    </div>
								    </div>
								</div>
							</div>

							<div class="col-lg-3 col-md-6 col-sm-6">
								<div class="block">
								    <div class="thumbnail thumbnail-boxed">
								    	<div class="thumb">
											<img alt="" src="http://placehold.it/300">
											<div class="thumb-options">
												<span>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-quill2"></i></a>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-remove"></i></a>
												</span>
											</div>
									    </div>
								    </div>
								</div>

								<div class="block">
								    <div class="thumbnail thumbnail-boxed">
								    	<div class="thumb">
											<img alt="" src="http://placehold.it/300">
											<div class="thumb-options">
												<span>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-quill2"></i></a>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-remove"></i></a>
												</span>
											</div>
									    </div>
								    </div>
								</div>
							</div>

							<div class="col-lg-3 col-md-6 col-sm-6">
								<div class="block">
								    <div class="thumbnail thumbnail-boxed">
								    	<div class="thumb">
											<img alt="" src="http://placehold.it/300">
											<div class="thumb-options">
												<span>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-quill2"></i></a>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-remove"></i></a>
												</span>
											</div>
									    </div>
								    </div>
								</div>

								<div class="block">
								    <div class="thumbnail thumbnail-boxed">
								    	<div class="thumb">
											<img alt="" src="http://placehold.it/300">
											<div class="thumb-options">
												<span>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-quill2"></i></a>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-remove"></i></a>
												</span>
											</div>
									    </div>
								    </div>
								</div>
							</div>
						</div>
		                <!-- /without titles (frame) -->


		                <hr>


						<h6><i class="icon-checkbox-partial"></i> Without frame</h6>


		                <!-- Without titles (no frame) -->
						<div class="row">
							<div class="col-lg-3 col-md-6 col-sm-6">
								<div class="block">
								    <div class="thumbnail">
								    	<div class="thumb">
											<img alt="" src="http://placehold.it/300">
											<div class="thumb-options">
												<span>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-quill2"></i></a>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-remove"></i></a>
												</span>
											</div>
									    </div>
								    </div>
								</div>

								<div class="block">
								    <div class="thumbnail">
								    	<div class="thumb">
											<img alt="" src="http://placehold.it/300">
											<div class="thumb-options">
												<span>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-quill2"></i></a>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-remove"></i></a>
												</span>
											</div>
									    </div>
								    </div>
								</div>
							</div>

							<div class="col-lg-3 col-md-6 col-sm-6">
								<div class="block">
								    <div class="thumbnail">
								    	<div class="thumb">
											<img alt="" src="http://placehold.it/300">
											<div class="thumb-options">
												<span>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-quill2"></i></a>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-remove"></i></a>
												</span>
											</div>
									    </div>
								    </div>
								</div>

								<div class="block">
								    <div class="thumbnail">
								    	<div class="thumb">
											<img alt="" src="http://placehold.it/300">
											<div class="thumb-options">
												<span>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-quill2"></i></a>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-remove"></i></a>
												</span>
											</div>
									    </div>
								    </div>
								</div>
							</div>

							<div class="col-lg-3 col-md-6 col-sm-6">
								<div class="block">
								    <div class="thumbnail">
								    	<div class="thumb">
											<img alt="" src="http://placehold.it/300">
											<div class="thumb-options">
												<span>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-quill2"></i></a>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-remove"></i></a>
												</span>
											</div>
									    </div>
								    </div>
								</div>

								<div class="block">
								    <div class="thumbnail">
								    	<div class="thumb">
											<img alt="" src="http://placehold.it/300">
											<div class="thumb-options">
												<span>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-quill2"></i></a>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-remove"></i></a>
												</span>
											</div>
									    </div>
								    </div>
								</div>
							</div>

							<div class="col-lg-3 col-md-6 col-sm-6">
								<div class="block">
								    <div class="thumbnail">
								    	<div class="thumb">
											<img alt="" src="http://placehold.it/300">
											<div class="thumb-options">
												<span>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-quill2"></i></a>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-remove"></i></a>
												</span>
											</div>
									    </div>
								    </div>
								</div>

								<div class="block">
								    <div class="thumbnail">
								    	<div class="thumb">
											<img alt="" src="http://placehold.it/300">
											<div class="thumb-options">
												<span>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-quill2"></i></a>
													<a href="#" class="btn btn-icon btn-success"><i class="icon-remove"></i></a>
												</span>
											</div>
									    </div>
								    </div>
								</div>
							</div>
						</div>
		                <!-- /without titles (no frame) -->


		                <!-- Pagination -->
		                <div class="text-center block">
                            <ul class="pagination">
                                <li><a href="#">&larr;</a></li>
                                <li><a href="#">1</a></li>
                                <li class="active"><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">&rarr;</a></li>
                            </ul>
                        </div>
                		<!-- /pagination -->

                	</div>
                	<!-- /thirs tab -->


                	<!-- Fourth tab -->
                	<div class="tab-pane fade" id="images-table">

		                <!-- Media datatable -->
		                <div class="panel panel-default">
		                	<div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i> Table with image list</h6></div>
		                    <div class="datatable-media">
		                        <table class="table table-bordered table-striped">
		                            <thead>
		                                <tr>
		                                    <th class="image-column">Image</th>
		                                    <th>Description</th>
		                                    <th>Date</th>
		                                    <th>File info</th>
		                                    <th class="actions-column">Acts</th>
		                                </tr>
		                            </thead>
		                            <tbody>
		                                <tr>
					                        <td class="text-center">
						                        <a href="http://placehold.it/300" class="lightbox"><img src="http://placehold.it/300" alt="" class="img-media"></a>
					                        </td>
					                        <td><a href="#" title="">Image2 description</a></td>
					                        <td>Feb 12, 2012. 12:28</td>
					                        <td class="file-info">
					                        	<span><strong>Size:</strong> 215 Kb</span>
					                        	<span><strong>Format:</strong> .jpg</span>
					                        	<span><strong>Dimensions:</strong> 120 x 120</span>
					                        </td>
					                        <td class="text-center">
					                            <div class="btn-group">
					                                <button class="btn btn-default btn-icon dropdown-toggle" data-toggle="dropdown"><i class="icon-cogs"></i></button>
													<ul class="dropdown-menu icons-right dropdown-menu-right">
														<li><a href="#"><i class="icon-quill2"></i> Edit image</a></li>
														<li><a href="#"><i class="icon-move"></i> Move somewhere</a></li>
														<li><a href="#"><i class="icon-remove4"></i> Remove image</a></li>
													</ul>
					                            </div>
					                        </td>
		                                </tr>
		                                <tr>
					                        <td class="text-center">
						                        <a href="http://placehold.it/300" class="lightbox"><img src="http://placehold.it/300" alt="" class="img-media"></a>
					                        </td>
					                        <td><a href="#" title="">Image1 description</a></td>
					                        <td>Feb 12, 2012. 12:28</td>
					                        <td class="file-info">
					                        	<span><strong>Size:</strong> 215 Kb</span>
					                        	<span><strong>Format:</strong> .jpg</span>
					                        	<span><strong>Dimensions:</strong> 120 x 120</span>
					                        </td>
					                        <td class="text-center">
					                            <div class="btn-group">
					                                <button class="btn btn-default btn-icon dropdown-toggle" data-toggle="dropdown"><i class="icon-cogs"></i></button>
													<ul class="dropdown-menu icons-right dropdown-menu-right">
														<li><a href="#"><i class="icon-quill2"></i> Edit image</a></li>
														<li><a href="#"><i class="icon-move"></i> Move somewhere</a></li>
														<li><a href="#"><i class="icon-remove4"></i> Remove image</a></li>
													</ul>
					                            </div>
					                        </td>
		                                </tr>
		                                <tr>
					                        <td class="text-center">
						                        <a href="http://placehold.it/300" class="lightbox"><img src="http://placehold.it/300" alt="" class="img-media"></a>
					                        </td>
					                        <td><a href="#" title="">Image1 description</a></td>
					                        <td>Feb 12, 2012. 12:28</td>
					                        <td class="file-info">
					                        	<span><strong>Size:</strong> 215 Kb</span>
					                        	<span><strong>Format:</strong> .jpg</span>
					                        	<span><strong>Dimensions:</strong> 120 x 120</span>
					                        </td>
					                        <td class="text-center">
					                            <div class="btn-group">
					                                <button class="btn btn-default btn-icon dropdown-toggle" data-toggle="dropdown"><i class="icon-cogs"></i></button>
													<ul class="dropdown-menu icons-right dropdown-menu-right">
														<li><a href="#"><i class="icon-quill2"></i> Edit image</a></li>
														<li><a href="#"><i class="icon-move"></i> Move somewhere</a></li>
														<li><a href="#"><i class="icon-remove4"></i> Remove image</a></li>
													</ul>
					                            </div>
					                        </td>
		                                </tr>
		                                <tr>
					                        <td class="text-center">
						                        <a href="http://placehold.it/300" class="lightbox"><img src="http://placehold.it/300" alt="" class="img-media"></a>
					                        </td>
					                        <td><a href="#" title="">Image1 description</a></td>
					                        <td>Feb 12, 2012. 12:28</td>
					                        <td class="file-info">
					                        	<span><strong>Size:</strong> 215 Kb</span>
					                        	<span><strong>Format:</strong> .jpg</span>
					                        	<span><strong>Dimensions:</strong> 120 x 120</span>
					                        </td>
					                        <td class="text-center">
					                            <div class="btn-group">
					                                <button class="btn btn-default btn-icon dropdown-toggle" data-toggle="dropdown"><i class="icon-cogs"></i></button>
													<ul class="dropdown-menu icons-right dropdown-menu-right">
														<li><a href="#"><i class="icon-quill2"></i> Edit image</a></li>
														<li><a href="#"><i class="icon-move"></i> Move somewhere</a></li>
														<li><a href="#"><i class="icon-remove4"></i> Remove image</a></li>
													</ul>
					                            </div>
					                        </td>
		                                </tr>
		                                <tr>
					                        <td class="text-center">
						                        <a href="http://placehold.it/300" class="lightbox"><img src="http://placehold.it/300" alt="" class="img-media"></a>
					                        </td>
					                        <td><a href="#" title="">Image1 description</a></td>
					                        <td>Feb 12, 2012. 12:28</td>
					                        <td class="file-info">
					                        	<span><strong>Size:</strong> 215 Kb</span>
					                        	<span><strong>Format:</strong> .jpg</span>
					                        	<span><strong>Dimensions:</strong> 120 x 120</span>
					                        </td>
					                        <td class="text-center">
					                            <div class="btn-group">
					                                <button class="btn btn-default btn-icon dropdown-toggle" data-toggle="dropdown"><i class="icon-cogs"></i></button>
													<ul class="dropdown-menu icons-right dropdown-menu-right">
														<li><a href="#"><i class="icon-quill2"></i> Edit image</a></li>
														<li><a href="#"><i class="icon-move"></i> Move somewhere</a></li>
														<li><a href="#"><i class="icon-remove4"></i> Remove image</a></li>
													</ul>
					                            </div>
					                        </td>
		                                </tr>
		                                <tr>
					                        <td class="text-center">
						                        <a href="http://placehold.it/300" class="lightbox"><img src="http://placehold.it/300" alt="" class="img-media"></a>
					                        </td>
					                        <td><a href="#" title="">Image1 description</a></td>
					                        <td>Feb 12, 2012. 12:28</td>
					                        <td class="file-info">
					                        	<span><strong>Size:</strong> 215 Kb</span>
					                        	<span><strong>Format:</strong> .jpg</span>
					                        	<span><strong>Dimensions:</strong> 120 x 120</span>
					                        </td>
					                        <td class="text-center">
					                            <div class="btn-group">
					                                <button class="btn btn-default btn-icon dropdown-toggle" data-toggle="dropdown"><i class="icon-cogs"></i></button>
													<ul class="dropdown-menu icons-right dropdown-menu-right">
														<li><a href="#"><i class="icon-quill2"></i> Edit image</a></li>
														<li><a href="#"><i class="icon-move"></i> Move somewhere</a></li>
														<li><a href="#"><i class="icon-remove4"></i> Remove image</a></li>
													</ul>
					                            </div>
					                        </td>
		                                </tr>
		                                <tr>
					                        <td class="text-center">
						                        <a href="http://placehold.it/300" class="lightbox"><img src="http://placehold.it/300" alt="" class="img-media"></a>
					                        </td>
					                        <td><a href="#" title="">Image1 description</a></td>
					                        <td>Feb 12, 2012. 12:28</td>
					                        <td class="file-info">
					                        	<span><strong>Size:</strong> 215 Kb</span>
					                        	<span><strong>Format:</strong> .jpg</span>
					                        	<span><strong>Dimensions:</strong> 120 x 120</span>
					                        </td>
					                        <td class="text-center">
					                            <div class="btn-group">
					                                <button class="btn btn-default btn-icon dropdown-toggle" data-toggle="dropdown"><i class="icon-cogs"></i></button>
													<ul class="dropdown-menu icons-right dropdown-menu-right">
														<li><a href="#"><i class="icon-quill2"></i> Edit image</a></li>
														<li><a href="#"><i class="icon-move"></i> Move somewhere</a></li>
														<li><a href="#"><i class="icon-remove4"></i> Remove image</a></li>
													</ul>
					                            </div>
					                        </td>
		                                </tr>
		                                <tr>
					                        <td class="text-center">
						                        <a href="http://placehold.it/300" class="lightbox"><img src="http://placehold.it/300" alt="" class="img-media"></a>
					                        </td>
					                        <td><a href="#" title="">Image1 description</a></td>
					                        <td>Feb 12, 2012. 12:28</td>
					                        <td class="file-info">
					                        	<span><strong>Size:</strong> 215 Kb</span>
					                        	<span><strong>Format:</strong> .jpg</span>
					                        	<span><strong>Dimensions:</strong> 120 x 120</span>
					                        </td>
					                        <td class="text-center">
					                            <div class="btn-group">
					                                <button class="btn btn-default btn-icon dropdown-toggle" data-toggle="dropdown"><i class="icon-cogs"></i></button>
													<ul class="dropdown-menu icons-right dropdown-menu-right">
														<li><a href="#"><i class="icon-quill2"></i> Edit image</a></li>
														<li><a href="#"><i class="icon-move"></i> Move somewhere</a></li>
														<li><a href="#"><i class="icon-remove4"></i> Remove image</a></li>
													</ul>
					                            </div>
					                        </td>
		                                </tr>
		                                <tr>
					                        <td class="text-center">
						                        <a href="http://placehold.it/300" class="lightbox"><img src="http://placehold.it/300" alt="" class="img-media"></a>
					                        </td>
					                        <td><a href="#" title="">Image1 description</a></td>
					                        <td>Feb 12, 2012. 12:28</td>
					                        <td class="file-info">
					                        	<span><strong>Size:</strong> 215 Kb</span>
					                        	<span><strong>Format:</strong> .jpg</span>
					                        	<span><strong>Dimensions:</strong> 120 x 120</span>
					                        </td>
					                        <td class="text-center">
					                            <div class="btn-group">
					                                <button class="btn btn-default btn-icon dropdown-toggle" data-toggle="dropdown"><i class="icon-cogs"></i></button>
													<ul class="dropdown-menu icons-right dropdown-menu-right">
														<li><a href="#"><i class="icon-quill2"></i> Edit image</a></li>
														<li><a href="#"><i class="icon-move"></i> Move somewhere</a></li>
														<li><a href="#"><i class="icon-remove4"></i> Remove image</a></li>
													</ul>
					                            </div>
					                        </td>
		                                </tr>
		                                <tr>
					                        <td class="text-center">
						                        <a href="http://placehold.it/300" class="lightbox"><img src="http://placehold.it/300" alt="" class="img-media"></a>
					                        </td>
					                        <td><a href="#" title="">Image1 description</a></td>
					                        <td>Feb 12, 2012. 12:28</td>
					                        <td class="file-info">
					                        	<span><strong>Size:</strong> 215 Kb</span>
					                        	<span><strong>Format:</strong> .jpg</span>
					                        	<span><strong>Dimensions:</strong> 120 x 120</span>
					                        </td>
					                        <td class="text-center">
					                            <div class="btn-group">
					                                <button class="btn btn-default btn-icon dropdown-toggle" data-toggle="dropdown"><i class="icon-cogs"></i></button>
													<ul class="dropdown-menu icons-right dropdown-menu-right">
														<li><a href="#"><i class="icon-quill2"></i> Edit image</a></li>
														<li><a href="#"><i class="icon-move"></i> Move somewhere</a></li>
														<li><a href="#"><i class="icon-remove4"></i> Remove image</a></li>
													</ul>
					                            </div>
					                        </td>
		                                </tr>
		                                <tr>
					                        <td class="text-center">
						                        <a href="http://placehold.it/300" class="lightbox"><img src="http://placehold.it/300" alt="" class="img-media"></a>
					                        </td>
					                        <td><a href="#" title="">Image1 description</a></td>
					                        <td>Feb 12, 2012. 12:28</td>
					                        <td class="file-info">
					                        	<span><strong>Size:</strong> 215 Kb</span>
					                        	<span><strong>Format:</strong> .jpg</span>
					                        	<span><strong>Dimensions:</strong> 120 x 120</span>
					                        </td>
					                        <td class="text-center">
					                            <div class="btn-group">
					                                <button class="btn btn-default btn-icon dropdown-toggle" data-toggle="dropdown"><i class="icon-cogs"></i></button>
													<ul class="dropdown-menu icons-right dropdown-menu-right">
														<li><a href="#"><i class="icon-quill2"></i> Edit image</a></li>
														<li><a href="#"><i class="icon-move"></i> Move somewhere</a></li>
														<li><a href="#"><i class="icon-remove4"></i> Remove image</a></li>
													</ul>
					                            </div>
					                        </td>
		                                </tr>
		                                <tr>
					                        <td class="text-center">
						                        <a href="http://placehold.it/300" class="lightbox"><img src="http://placehold.it/300" alt="" class="img-media"></a>
					                        </td>
					                        <td><a href="#" title="">Image1 description</a></td>
					                        <td>Feb 12, 2012. 12:28</td>
					                        <td class="file-info">
					                        	<span><strong>Size:</strong> 215 Kb</span>
					                        	<span><strong>Format:</strong> .jpg</span>
					                        	<span><strong>Dimensions:</strong> 120 x 120</span>
					                        </td>
					                        <td class="text-center">
					                            <div class="btn-group">
					                                <button class="btn btn-default btn-icon dropdown-toggle" data-toggle="dropdown"><i class="icon-cogs"></i></button>
													<ul class="dropdown-menu icons-right dropdown-menu-right">
														<li><a href="#"><i class="icon-quill2"></i> Edit image</a></li>
														<li><a href="#"><i class="icon-move"></i> Move somewhere</a></li>
														<li><a href="#"><i class="icon-remove4"></i> Remove image</a></li>
													</ul>
					                            </div>
					                        </td>
		                                </tr>
		                            </tbody>
		                        </table>
		                    </div>
		                </div>
		                <!-- /media datatable -->

                	</div>
                	<!-- /fourth tab -->

                </div>
            </div>
            <!-- /page tabs -->
@stop