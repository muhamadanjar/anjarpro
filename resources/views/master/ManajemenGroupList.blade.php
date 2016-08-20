@extends('app2')
@section('content')

						<!-- Bordered datatable inside panel -->
			            <div class="panel panel-default">
			                <div class="panel-heading">
			                	<h6 class="panel-title"><i class="icon-file"></i> Modul</h6>
			                </div>
			                <a href="{{ action('ModulCtrl@ModulAdd') }}"><button class="btn btn-primary" type="button">Tambah</button></a>
			                <div class="datatable">
				                <table class="table table-striped table-bordered">
				                    <thead>
				                        <tr>
				                            
				                            <th>Nama Modul</th>
				                            <th>Link</th>
				                            <th>Urutan</th>
				                            <th>#</th>
				                        </tr>
				                    </thead>
				                    <tbody>
				                        @foreach($module as $key => $modul)											
										<tr>
				                            <td>{{ $modul->modulename }}</td>
				                            <td>{{ $modul->moduleslug }}</td>
				                            <td>{{ $modul->urutan }}</td>
				                            <td>
												<div class="btn-group">
					                            <button data-toggle="dropdown" class="btn btn-icon btn-success dropdown-toggle" type="button"><i class="icon-cog4"></i></button>
													<ul class="dropdown-menu icons-right dropdown-menu-right">
														<li><a href="{{ route('moduledit', ['id' => $modul->moduleid]) }}"><i class="icon-quill2"></i> Ubah</a></li>
														<li><a href="{{ route('moduldelete', ['id' => $modul->moduleid]) }}"><i class="icon-delete"></i> Hapus</a></li>
														
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