@extends('layouts.layout')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">CART</h6>
            <div>
       
                <form action="{{ route('articles.search') }}" method="POST">
                    @csrf
                    <br>
                    <div class="container">
                        <div class="row">
                            <div class="container-fluid">
                                <div class="form-group row">
                                    <label for="date" class="col-form-label col-sm-1">From</label>
                                    <div class="col-sm-3">
                                        <input type="date" class="form-control input-sm" id="from" name="from" required />
                                    </div>
                                    <label for="date" class="col-form-label col-sm-1">To</label>
                                    <div class="col-sm-3">
                                        <input type="date" class="form-control input-sm" id="to" name="to" required />
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="submit" class="form-control" name="search" value="Search" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <form class="profile" action="{{ route('articles.fillter') }}" method="POST">
            @csrf
            @method('POST')
            <div class="form-group mb-3">
                <label for="category">Filler</label>
                <select class="custom-select tm-select-accounts" id="findStatus" name="title">
                    <option selected value=""></option>
                    <option value="1">complete</option>
                    <option value="0">incomplete</option>
                </select>
                <div class="text-right mt-3">
                    <input type="submit" class="btn btn-primary" value="submit">
                </div>
        </form>
        <div class="card-body">
            <x-alert />
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Cart</th>
                            <th>Cart Owner</th>
                            <th>Create Day</th>
                            <th>
                                State
                            </th>
                            <th>Delete Cart</th>
                        </tr>
                    </thead>
                    <tbody> <?php $stt = 1; ?>
                        @foreach ($articles as $article)
                            <td><?= $stt++ ?></td>
                          <td><a href="{{ route('articles.show', $article) }}">{{ $article->body }}</a>
                          </td>
                          <td>{{ $article->user->name }}</td>
                          <td>{{ $article->created_at }}</td>
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
                                  document.getElementById('form-detele-{{ $article->id }}').submit();
                              } 
                          "></span></a>
                          
                          <form  id="{{ 'form-detele-' . $article->id }}" method="post" action="{{ route('articles.destroy', $article->id) }}">
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
