@extends('layouts.layout')
	@section('content')		
	<x-alert/>
			<div class="card-body">
				<div class="table-responsive">
				  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
					  <tr>
						<th>Id</th>
						<th>Name</th>
						<th>Email</th>
						<th>Full Name</th>
						<th>Address</th>
						<th>Birthday</th>
						<th>Avatar</th>
						<th>Edit</th>
						<th>Delete</th>
					  </tr>
					</thead>
					<tbody>				
					  <tr>
						<th>{{$users->id}}</th>
					  <th>{{$users->name}} </th>
						<th>{{$users->email}}</th>
					  @if ($users->profile!==null)
						  <th>{{$users->profile->full_name}}</th>						 
						  <th>{{$users->profile->address}}</th>
						  <th>{{$users->profile->birthday}}</th>
						  <th><img src="{{'http://localhost:8000'.$users->profile->avatar}}" width="50px"></th>
						  @else
						  <th></th>
						  <th></th>
						  <th></th>
						  <th></th>
					  @endif					
					  <th><a href="{{route('users.edit',[$users->id])}}" class="btn btn-primary" role="button">edit</a></th>
					  <th>
						<a href="#" class="btn btn-danger"><span class="fas fa-trash "  style=" color: white" onclick="event.preventDefault();
							if(confirm('Determin delete it??'))
							{
								document.getElementById('id-delete{{$users->id}}').submit();
							}">
						</span>
						</a>
					<form style="display: none" id="{{'id-delete'.$users->id}}" method="POST" action="{{ route('users.destroy',$users->id) }}">
						@csrf
						@method('delete')
						</form>
					  </th>
					</tr>					
					</tbody>
				  </table>
				</div>
			  </div>
	@endsection