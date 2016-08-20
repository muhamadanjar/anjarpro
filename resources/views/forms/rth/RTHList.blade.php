@extends('app2')
@section('content')

						<!-- Bordered datatable inside panel -->
			            <div class="panel panel-default">
			                <div class="panel-heading">
			                	<h6 class="panel-title"><i class="icon-file"></i> RTH</h6>
			                </div>
			                <a href="{{ action('RTHCtrl@RTHAdd') }}"><button class="btn btn-primary" type="button">Tambah</button></a>
			                <div class="datatable">
				                <table class="table table-striped table-bordered">
				                    <thead>
				                        <tr>
				                            
				                            <th>Rth</th>
				                            <th>Kelompok RTH</th>
				                            <th>Kelurahan</th>
				                            <th>Fungsi</th>
				                            <th>Klasifikasi</th>
				                            <th>#</th>
				                        </tr>
				                    </thead>
				                    <tbody>
				                        @foreach($list_rth as $key => $rth)											
										<tr>
				                            <td>{{ $rth->nama_rth }}</td>
				                            <td>{{ $rth->kelompok_rth }}</td>
				                            <td>{{ $rth->kelurahan }}</td>
				                            <td>{{ $rth->fungsi }}</td>
				                            <td>{{ $rth->klasifikasi }}</td>
				                            <td>
												<div class="btn-group">
					                            <button data-toggle="dropdown" class="btn btn-icon btn-success dropdown-toggle" type="button"><i class="icon-cog4"></i></button>
													<ul class="dropdown-menu icons-right dropdown-menu-right">
														<li><a href="{{ route('rthedit', ['id' => $rth->id]) }}"><i class="icon-quill2"></i> Ubah</a></li>
												        <li data-form="#frmHapus-{{ $rth->id }}" data-title="Aktif {{ $rth->nama_rth }}" 
												        data-message="Apa anda yakin menghapus {{ $rth->nama_rth }} ?">
															<a class= "formConfirm" href="#"><i class="fa fa-bell"></i> Delete</a>
														</li>
														{!! Form::open(array(
												                'url' => route('rthdelete', array($rth->id)),
												                'method' => 'get',
												                'style' => 'display:none',
												                'id' => 'frmHapus-'.$rth->id
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