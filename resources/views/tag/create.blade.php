
 @extends('layouts.layout')
 @section('content')	
<form enctype="multipart/form-data"class="user" action="{{ route('tags.store')}}" method="POST">
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
                          <select name="categories_id" id="cars" class="form-group">
                            @foreach ($categories as $c)
                          <option value="{{$c->id}}">{{$c->type}}</option>
                            @endforeach
                            
                          </select>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                     <div class="col">
                       <div class="form-group">
                         <label>Tag</label>
                         <input type="text"  class="form-control form-control-user" name="tag" id="tag" placeholder="Tag" value="">
                       </div>
                     </div>
                   </div>
                
                   <div class="row">
                     <div class="col">
                       <div class="form-group">
                         <label>Price</label>
                         <input type="text"  class="form-control form-control-user" name="price" id="price" placeholder="Price" value="">
                       </div>
                     </div>
                   </div>

                   <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label>Description</label>
                        <input type="text"  class="form-control form-control-user" name="description" id="description" placeholder="Description" value="">
                      </div>
                    </div>
                  </div>

                  <div class="mt-2">
                    <button class="btn btn-primary" type="button">
                      <i class="fa fa-fw fa-camera"></i>               
                        <input type="file" id="image" name="image" value="Change Photo">
                    </button>
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
             $('#image').on('change',function(){
                 //get the file name
                 var fileName = $(this).val();
                 //replace the "Choose a file" label
                 $(this).next('.custom-file-label').html(fileName);
             })
         </script>
 @endsection('js')
 @endsection