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
				                            <th class="col-md-5">Nama Modul</th>
				                            <th>Link</th>
				                            <th class="col-md-1">Urutan</th>
				                            <th class="col-md-1">#</th>
				                        </tr>
				                    </thead>
				                    <tbody>
				                        @foreach($module as $key => $modul)
				                       	
				                       	<?php $status = ($modul->status == 0) ? 'alert-danger' : '' ;  ?>
				                       	<?php $btnstatus = ($modul->status == 0) ? 'danger btn-danger' : 'btn-success' ;  ?>
				                       	<?php $aktif = ($modul->status == 0) ? 'Mengaktifkan' : 'Menonaktifkan' ;  ?>
				                       		
				                       	
				                      									
										<tr class="{{$status}}">
				                            <td>{{ $modul->modulename }}</td>
				                            <td>{{ $modul->moduleslug }}</td>
				                            <td>{{ $modul->urutan }}</td>
				                            <td>
												<div class="btn-group">
					                            <button data-toggle="dropdown" class="btn btn-icon {{$btnstatus}} dropdown-toggle" type="button"><i class="icon-cog4"></i></button>
													<ul class="dropdown-menu icons-right dropdown-menu-right">
														<li><a href="{{ route('moduledit', ['id' => $modul->moduleid]) }}"><i class="icon-quill2"></i> Ubah</a></li>
														

												        <li data-form="#frmAktif-{{ $modul->moduleid }}" data-title="Aktif {{ $modul->modulename }}" 
												        data-message="Apa anda yakin {{ $aktif }} {{ $modul->modulename }} ?">
															<a class= "formConfirm" href="#"><i class="fa fa-bell"></i> Aktif</a>
														</li>
														{!! Form::open(array(
												                'url' => route('modulaktif', array($modul->moduleid)),
												                'method' => 'get',
												                'style' => 'display:none',
												                'id' => 'frmAktif-'.$modul->moduleid
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
			                

@stop