@extends('layouts.layout')
@section('content')
<x-alert/>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Tag</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <?php $stt = 1; ?>
                <tbody>
                    @foreach ($tags as $t)
                        <tr>
                            <th><?= $stt++ ?></th>
                            <th >{{ $t->tag }}</th>
                            <th><img src="{{'http://localhost:8000'.$t->image}}" width="50px"></th>
                            <th>{{ $t->price }}</th> 
                            <th>{{ $t->description }}</th> 
                            <th><a href="{{ route('tags.edit', $t->id) }}" class="btn btn-primary" role="button">edit</a></th>
                            <th>
                            <a href="#" class="btn btn-danger"><span class="fas fa-trash" style="color: rgb(255, 255, 255)" onclick="event.preventDefault();
                                if(confirm('Determin delete it??'))
                                {                                                                                                      
                                document.getElementById('id-delete{{ $t->id }}').submit();
                                }">
                            </span>
                            </a>
                            <form style="display: none" id="{{ 'id-delete' . $t->id }}" method="POST" action="{{ route('tags.destroy', $t->id) }}">
                            @csrf
                            @method('delete')
                            </form>
                        </tr>
                        @endforeach

                </tbody>
                </table>
            </div>
        </div> 
@endsection
