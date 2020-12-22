@extends('layouts.layout')
@section('content')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Cart of {{$user->name}}</h6>
            </div>
            <div class="card-body">
              <x-alert/>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Cart</th>
                      <th>Create Day</th>
                      <th>State</th>
                      <th>Delete cart</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($articles as $article)                   
                    <tr>
                      <td>{{$loop->index + 1}}</td>
                      <td><a href="{{route('articles.show',$article)}}">{{$article->body}}</a>
                      </td>
                      <td>{{$article->created_at}}</td>
                      @if ($article->title === 1)
                          <td style="color:white; background: green">

                            <button  onclick="event.preventDefault();
                            document.getElementById('form-{{ $article->id }}').submit()">
                              Change state
                            </button>
                            <a>complete</a>
                            
                          </td>
                    @else
                          <td style="color:white; background: red">                          
                            <button  onclick="event.preventDefault();
                            document.getElementById('form-{{ $article->id }}').submit()">
                              Change state
                            </button>
                            <a>incomplete</a></td>
                        @endif
                        <form style ="display: none;" id="{{ 'form-' . $article->id }}" method="post" action="{{ route('articles.updateState', $article->id) }}">
                          @csrf
                          @method('post')
                      </form>
                      <td>
                        <a href="#"><span  class="fas fa-trash" style="color: red"
                          onclick="event.preventDefault();
                          if(confirm('Are you really want to delete ?')){
                              document.getElementById('form-detele-{{$article->id}}').submit();
                          } 
                      "></span></a>
                      
                      <form style="display: none;" id="{{'form-detele-'.$article->id}}" method="post" action="{{route('articles.destroy',$article->id)}}">
                          @csrf
                          @method('delete')
                      </form>
                      </td>


                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

@endsection