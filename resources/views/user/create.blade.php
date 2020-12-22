@extends('layouts.layout')
@section('content')	
<form enctype="multipart/form-data"class="user" action="{{ route('users.store')}}" method="POST">
@csrf
 @method('POST')
<link href="http://netdna.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="col">
<div class="row">
 <div class="col mb-3">
   <div class="card">
     <div class="card-body">
       <div class="e-profile">
         <div class="tab-content pt-3">
           <div class="tab-pane active">
             <form class="form" novalidate="">
               <div class="row">
                 <div class="col">
                   <div class="row">
                     <div class="col">
                       <div class="form-group">
                         <label>Name</label>
                       <input type="text"  class="form-control form-control-user" name="name" id="name" placeholder="Name" value="">
                       </div>
                     </div>
                   </div>
                   <div class="row">
                     <div class="col">
                       <div class="form-group">
                         <label>Email</label>
                         <input type="text"  class="form-control form-control-user" name="email" id="email" placeholder="Email" value="">
                       </div>
                     </div>
                   </div>
                   <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label>Password</label>
                        <input type="text"  class="form-control form-control-user" name="password" id="password" placeholder="Password" value="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label>Role</label>
                        <input type="text"  class="form-control form-control-user" name="role_id" id="" placeholder="Role" value="">
                      </div>
                    </div>
                  </div>
                 </div>
               </div>
             </form>
           </div>
         </div>
                 <div class="col d-flex justify-content-end">
                   <input type="submit" class="btn btn-primary" value="Create">
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