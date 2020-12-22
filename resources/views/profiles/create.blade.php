  
    
 @extends('layouts.layout')
 @section('content')	
<form enctype="multipart/form-data"class="user" action="{{ route('profiles.store')}}" method="POST">
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
                         <label>Full Name</label>
                       <input type="text"  class="form-control form-control-user" name="full_name" id="full_name" placeholder="Name" value="">
                       </div>
                     </div>
                   </div>
                   <div class="row">
                     <div class="col">
                       <div class="form-group">
                         <label>Address</label>
                         <input type="text"  class="form-control form-control-user" name="address" id="address" placeholder="Email" value="">
                       </div>
                     </div>
                   </div>
                   <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label>Birthday</label>
                        <input type="text"  class="form-control form-control-user" name="birthday" id="birthday" placeholder="Password" value="">
                      </div>
                    </div>
                  </div>
                      <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                <div class="text-center text-sm-left mb-2 mb-sm-0">
                 
            
                  <div class="mt-2">
                    <button class="btn btn-primary" type="button">
                      <i class="fa fa-fw fa-camera"></i>               
                        <input type="file" id="avatar" name="avatar" value="Change Photo">
                    </button>
                  </div>
                </div>                
              </div>
              <div class="form-group" >
                <input type="text" hidden name="id" class="form-control form-control-user" id="id" placeholder="Full Name" value="{{$id}}">
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