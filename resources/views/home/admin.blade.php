@extends('layouts.layout')
@section('content')
<div class="card-body">
  <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Email</th>
      <th>Password</th>
      <th>Edit</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
      <th>{{$user->id}}</th>
		  <th>  <a href="{{route('users.show',['user' => $user->id])}}">{{$user->name}}</a> </th>
      <th>{{$user->email}}</th>
      <th>{{$user->password}}</th>
      <th><a href="/profiles/{{$user->id}}/edit" class="btn btn-primary" role="button">edit</a></th>
      </tr>
      @endforeach
    </tbody>
    </table>
  </div>
  </div>
@endsection