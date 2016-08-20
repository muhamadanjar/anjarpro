
@extends('app2')
@section('content')    
						<!-- Bordered datatable inside panel -->
			            <div class="panel panel-default">
			                <div class="panel-heading">
			                	<h6 class="panel-title"><i class="icon-file"></i> Tags</h6>
			                </div>
			                <a href="{{ action('TermCtrl@TagAdd') }}"><button class="btn btn-primary" type="button">Tambah</button></a>
			                <div class="datatable">
				                <table class="table table-striped table-bordered">
				                    <thead>
				                        <tr>
				                            
				                            <th>Category</th>
				                            <th>Slug</th>
				                            <th class="col-sm-1">#</th>
				                            
				                        </tr>
				                    </thead>
				                    <tbody>
				                        @foreach($tags as $key => $p)											
										<tr>
											
				                            <td>{{ $p->name }}</td>
				                            <td>{{ $p->slug }}</td>
				                            <td>
												<div class="btn-group">
					                            <button data-toggle="dropdown" class="btn btn-icon btn-success dropdown-toggle" type="button"><i class="icon-cog4"></i></button>
													<ul class="dropdown-menu icons-right dropdown-menu-right">
														<li><a href="{{ asset('category-edit-') }}{{ $p->termid }}"><i class="icon-quill2"></i> Ubah</a></li>
														<li><a href="{{ asset('category-delete-') }}{{ $p->termid }}"><i class="icon-delete"></i> Hapus</a></li>
														
													</ul>
				                            	</div>
				                            </td>
				                        
				                        </tr>
										@endforeach
				                    </tbody>
				                </table>
			                </div>
				        </div>
				        <!-- /bordered datatable inside panel -->

@stop