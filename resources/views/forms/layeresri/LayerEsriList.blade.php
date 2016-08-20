@extends('app2')
@section('content')

						<!-- Bordered datatable inside panel -->
			            <div class="panel panel-default">
			                <div class="panel-heading">
			                	<h6 class="panel-title"><i class="icon-file"></i> Esri Layer</h6>
			                </div>
			                <a href="{{ action('LayerCtrl@LayerAddForm') }}"><button class="btn btn-primary" type="button">Tambah</button></a>
			                <div class="datatable">
				                <table class="table table-striped table-bordered">
				                    <thead>
				                        <tr>
				                            
				                            <th>Nama Layer</th>
				                            <th>Layer Tipe</th>
				                            <th>Layer Url</th>
				                            <th>LayerID</th>
				                            
				                            <th>#</th>
				                        </tr>
				                    </thead>
				                    <tbody>
				                        @foreach($list_layer as $key => $esri)											
										<tr>
				                            <td>{{ $esri->layername }}</td>
				                            <td>{{ $esri->tipelayer }}</td>
				                            <td><a style="btn btn-link" href="{{ $esri->layerurl }}">Link</a></td>
				                            <td>{{ $esri->layer }}</td>
				                            
				                            <td>
												<div class="btn-group">
					                            <button data-toggle="dropdown" class="btn btn-icon btn-success dropdown-toggle" type="button"><i class="icon-cog4"></i></button>
													<ul class="dropdown-menu icons-right dropdown-menu-right">
														<li><a href="{{ route('layeresriedit', ['id' => $esri->id_layer]) }}"><i class="icon-quill2"></i> Ubah</a></li>
												        <li data-form="#frmHapus-{{ $esri->id_layer }}" data-title="Aktif {{ $esri->layername }}" 
												        data-message="Apa anda yakin menghapus {{ $esri->layername }} ?">
															<a class= "formConfirm" href="#"><i class="fa fa-bell"></i> Delete</a>
														</li>
														{!! Form::open(array(
												                'url' => route('layeresridelete', array($esri->id_layer)),
												                'method' => 'get',
												                'style' => 'display:none',
												                'id' => 'frmHapus-'.$esri->id_layer
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