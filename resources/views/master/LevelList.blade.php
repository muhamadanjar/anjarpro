@extends('app2')
@section('content')  
<!-- Default datatable inside panel -->
<div class="panel panel-default">
	<div class="panel-heading">
		<h6 class="panel-title"><i class="icon-table"></i> User List</h6>
	</div>
	<a href="{{ action('UserController@UserAdd') }}"><button class="btn btn-primary" type="button">Tambah</button></a>
	<div class="datatable">
		<table class="table">
			<thead>
				<tr>
				    <th>#</th>
				    <th>Level</th>
				    <th>#</th>
				</tr>
			</thead>
			<tbody>
				@foreach($levels as $ku => $lv)
				<?php $ku = $ku+1 ?>
				<tr>
				    <td>{{ $ku }}</td>
				    <td>{{ $lv->name }}</td>
				  
				    <td class="text-center">
		                <div class="btn-group">
			                <button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown"><i class="icon-cog4"></i></button>
							<ul class="dropdown-menu icons-right dropdown-menu-right">
								<li><a href="{{ route('leveledit',['id' => $lv->id]) }}"><i class="icon-edit"></i> Ubah</a></li>
							
								<li data-form="#frmDelete-{{ $lv->id }}" data-title="Hapus {{ $lv->name }}" data-message="Apa anda yakin menghapus {{ $lv->name }} ?">
									<a class="formConfirm" href="#"><i class="icon-trash"></i> Hapus</a>
								</li>
								{!! Form::open(array(
										'url' => route('leveldelete', array($lv->id)),
										'method' => 'get',
										'style' => 'display:none',
										'id' => 'frmDelete-'.$lv->id
									))
								!!}
								
							</ul>
		                </div>
		            </td>
				</tr>
				@endforeach
				                        
			</tbody>
		</table>
	</div>
</div>
<!-- /default datatable inside panel -->

@stop