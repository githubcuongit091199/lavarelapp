@extends('layouts.layout')
@section('content')
<x-alert/>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Cart</th>
                        <th>Edit</th>
                      
                    </tr>
                </thead>
                <tbody>
                    <?php $stt = 1; ?>
                    @foreach ($users as $user)
                        <tr>
                            <th><?= $stt++ ?></th>
      <th><a href="{{ route('users.show', ['user' => $user->id]) }}">{{ $user->name }}</a></th>
          <th>{{ $user->email }}</th> 
          <th><a href="{{ route('articles.indexShopArticle', $user->id )}}">Show Cart</a></th>
          <th><a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary" role="button">edit</a></th>
          {{-- <th>
            <a href="#" class="btn btn-danger"><span class="fas fa-trash" style="color: rgb(255, 255, 255)" onclick="event.preventDefault();
              if(confirm('Determin delete it??'))
              {
                document.getElementById('id-delete{{ $user->id }}').submit();
              }">
            </span>
          
            </a>
          <form style="display: none" id="{{ 'id-delete' . $user->id }}" method="POST" action="{{ route('users.destroy', $user->id) }}">
            @csrf
            @method('delete')
            </form> --}}
          </tr>
          @endforeach     

        </tbody>
        </table>
      </div>
      </div>
@endsection
