  @extends('layouts.layout')
	@section('content')	
 <form enctype="multipart/form-data"class="user" action="{{ route('users.update',['user' => $user->id])}}" method="POST">
  @csrf
	@method('PUT')
  <link href="http://netdna.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
  <style type="text/css">
    body{
  background:#f8f8f8
}
  </style>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="col">
  <div class="row">
    <div class="col mb-3">
      <div class="card">
        <div class="card-body">
          <div class="e-profile">
            <div class="row">
              <div class="col-12 col-sm-auto mb-3">
                <div class="mx-auto" style="width: 140px;">
                  <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
                    @if ($user->profile === null)
                      <span style="color: rgb(166, 168, 170); font: bold 8pt Arial;">140x140</span>
                    @else
                      <img src="{{'http://localhost:8000'.$user->profile->avatar}}" width="140px" height="140px ">
                    @endif
                  </div>
                </div>
              </div>
              <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                <div class="text-center text-sm-left mb-2 mb-sm-0">
                  <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{{$user->name}}</h4>
                <p class="mb-0">{{$user->email}}</p>
                  <div class="text-muted"><small>Last seen 2 hours ago</small></div>
                  <div class="mt-2">
                    <button class="btn btn-primary" type="button">
                      <i class="fa fa-fw fa-camera"></i>               
                        <input type="file" id="avatar" name="avatar" value="Change Photo" >
                    </button>
                  </div>
                </div>                
              </div>
            </div>             
            <ul class="nav nav-tabs">
              <li class="nav-item"><a href="" class="active nav-link">Settings</a></li>              
            </ul>
            <div class="tab-content pt-3">
              <div class="tab-pane active">
                <form class="form" novalidate="">
                  <div class="row">
                    <div class="col">
                      <div class="row">
                        <div class="col">
                          <div class="form-group">
                            <label>Full Name</label>
                            @if ($user->profile!==null)
                            <input type="text"  class="form-control form-control-user" name="full_name" id="full_name" placeholder="Full Name" value="{{$user->profile->full_name}}"> 
                            @else
                            <input type="text"  class="form-control form-control-user" name="full_name" id="full_name" placeholder="Full Name" value="">
                            @endif
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <label>Name</label>
                            <input type="text"  class="form-control form-control-user" name="name" id="name" placeholder="Name" value="{{$user->name}}">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <div class="form-group">
                            <label>Email</label>
                            <input type="text"  class="form-control form-control-user" name="email" id="email" placeholder="Email" value="{{$user->email}}">
                          </div>
                        </div>
                      </div>
                      @if ($user->profile!==null)

                      <div class="row">
                        <div class="col">
                          <div class="form-group">
                            <label>Address</label>
                            <input type="text"  class="form-control form-control-user" name="address" id="address" placeholder="Address" value="{{$user->profile->address}}">                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <div class="form-group">
                            <label>Birthday</label>
                            <input type="text"  class="form-control form-control-user" name="birthday" id="birthday" placeholder="Birthday" value="{{$user->profile->birthday}}">
                          </div>
                        </div>
                      </div>  
                      @else
                      <div class="row">
                        <div class="col">
                          <div class="form-group">
                            <label>Address</label>
                            <input type="text"  class="form-control form-control-user" name="address" id="address" placeholder="Address" value="">                           
                           </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <div class="form-group">
                            <label>Birthday</label>
                            <input type="text"  class="form-control form-control-user" name="birthday" id="birthday" placeholder="Birthday" value="">
                          </div>
                        </div>
                      </div>   
                      @endif         
                    </div>
                  </div>
                </form>
              </div>
            </div>
                    <div class="col d-flex justify-content-end">
                      <input type="submit" class="btn btn-primary" value="Update">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript">	
</script> 
  </form>
  @section('js')
			<script>
				$('#avatar').on('change',function(){
					//get the file name
					var fileName = $(this).val();
					//replace the "Choose a file" label
					$(this).next('.custom-file-label').html(fileName);
				})
			</script>
    @endsection('js')
    @endsection