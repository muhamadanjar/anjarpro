@extends('app2')
@section('content')
 
						<!-- Bordered datatable inside panel -->
			            <div class="panel panel-default">
			                <div class="panel-heading">
			                	<h6 class="panel-title"><i class="icon-file"></i> Post</h6>
			                </div>
			                <a href="{{ action('PostCtrl@PostAdd') }}"><button class="btn btn-primary" type="button">Tambah</button></a>
			                <div class="datatable_">
				                <table class="table table-striped table-bordered">
				                    <thead>
				                        <tr>
				                            <th>Nama Post</th>
				                            <th>Status</th>
				                            <th>Kategori</th>
				                            <th>#</th>
				                        </tr>
				                    </thead>
				                    <tbody>

				                        @foreach($post as $key => $p)											
										<tr>
				                    
				                            <td>{{ $p->posttitle }}</td>
				                            <td>{{ $p->poststatus }}</td>
				                            <td>{{ $p->categorypost }}</td>
				                            <td>
				                            	<div class="btn-group">
					                            <button data-toggle="dropdown" class="btn btn-icon btn-success dropdown-toggle" type="button"><i class="icon-cog4"></i></button>
													<ul class="dropdown-menu icons-right dropdown-menu-right">
														<li><a href="{{ asset('post-edit-') }}{{ $p->postid }}"><i class="icon-quill2"></i> Ubah</a></li>

														<li data-form="#frmDelete-{{ $p->postid }}" data-title="Delete Ledger" data-message="Are you sure you want to delete this ledger ?">
															<a class = "formConfirm" href="#"><i class="icon-delete"></i> Hapus</a>
														</li>
														{!! Form::open(array(
												                'url' => route('postdelete', array($p->postid)),
												                'method' => 'get',
												                'style' => 'display:none',
												                'id' => 'frmDelete-'.$p->postid
												            ))
												        !!}
												        
												        {!! Form::close() !!}
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