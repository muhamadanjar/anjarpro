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
				    <th>Name</th>
				    <th>Email</th>
				    <th>Username</th>
				    <th>Level</th>
				    <th>#</th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $ku => $user)
				<?php $ku = $ku+1 ?>
				<tr>
				    <td>{{ $ku }}</td>
				    <td>{{ $user->name }}</td>
				    <td>{{ $user->email }}</td>
				    <td>{{ $user->username }}</td>
				    <td>{{ $user->rolename }}</td>
				    <td class="text-center">
		                <div class="btn-group">
			                <button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown"><i class="icon-cog4"></i></button>
							<ul class="dropdown-menu icons-right dropdown-menu-right">
								<li><a href="{{ asset('user-edit-') }}{{ $user->id }}"><i class="icon-edit"></i> Ubah</a></li>
							
								<li data-form="#frmAktif-{{ $user->id }}" data-title="Matikan {{ $user->name }}" data-message="Apa anda yakin Mematikan {{ $user->name }} ?">
									<a class="formConfirm" href="#"><i class="icon-trash"></i> Hidup</a>
								</li>
								{!! Form::open(array(
										'url' => route('userhidupmati', array($user->id)),
										'method' => 'get',
										'style' => 'display:none',
										'id' => 'frmAktif-'.$user->id
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
<!-- /default datatable inside panel -->

@stop