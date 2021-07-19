@extends('layouts.app')
@section('content')
	<div class="contents">
	   <div class="container-fluid">
	      <div class="row">
	         <div class="col-lg-12">
	            <div class="breadcrumb-main">
	               <h4 class="text-capitalize breadcrumb-title">Pending Users</h4>
	            </div>
	         </div>
	      </div>
	      <div class="row">
	         <div class="col-lg-12 mb-30">
						 @if(session()->has('success'))
					 	        <div class="alert alert-success alert-dismissable">
					 	          <a href="#" class="close mr-2" data-dismiss="alert" aria-label="close">&times;</a>
					 	            {{ session()->get('success') }}
					 	        </div>
					 	          @endif
					 	          <!-- info -->
					 	          @if(session()->has('info'))
					 	       <div class="alert alert-info alert-dismissable">
					 	         <a href="#" class="close mr-2" data-dismiss="alert" aria-label="close">&times;</a>
					 	           {{ session()->get('info') }}
					 	       </div>
					 	         @endif
					 	          <!-- warning -->
					 	          @if(session()->has('warning'))
					 	       <div class="alert alert-warning alert-dismissable">
					 	         <a href="#" class="close mr-2" data-dismiss="alert" aria-label="close">&times;</a>
					 	           {{ session()->get('warning') }}
					 	       </div>
					 	         @endif
					 	          <!-- danger -->
					 	          @if(session()->has('danger'))
					 	       <div class="alert alert-danger alert-dismissable">
					 	         <a href="#" class="close mr-2" data-dismiss="alert" aria-label="close">&times;</a>
					 	           {{ session()->get('danger') }}
					 	       </div>
					 	         @endif
	            <div class="card">
	               <div class="card-header color-dark fw-500">
	                  User List
	               </div>
	               <div class="card-body">
	                  <div class="userDatatable global-shadow border-0 bg-white w-100">
	                     <div class="table-responsive">
	                        <table class="table mb-0 table-borderless pending_list">
	                           <thead>
	                              <tr class="userDatatable-header">
	                                 <th>
	                                    <span class="userDatatable-title">Sl No.</span>
	                                 </th>
	                                 <th>
	                                    <span class="userDatatable-title">Name</span>
	                                 </th>
	                                 <th>
	                                    <span class="userDatatable-title">Email</span>
	                                 </th>
	                                 <th>
	                                    <span class="userDatatable-title">Action</span>
	                                 </th>
	                              </tr>
	                           </thead>
	                           <tbody>
															 @isset($users)
							 									@forelse($users as $key => $user)
	                              <tr>
	                                 <td>
	                                    <div class="userDatatable-content">
	                                       {{$key++}}
	                                    </div>
	                                 </td>
	                                 <td>
	                                    <div class="userDatatable-content">
	                                       {{$user->name}}
	                                    </div>
	                                 </td>
	                                 <td>
	                                    <div class="userDatatable-content">
	                                       {{$user->email}}
	                                    </div>
	                                 </td>
	                                 <td>
	                                    <div class="userDatatable-content">
	                                       {{-- <a href="{{route('admin.user.approve',$user->id)}}" class="btn btn-primary " data-toggle="tooltip" title="Approve User">Approve</a> --}}
																				 <button  class="btn btn-primary approve_user" data-id="{{$user->id}}" data-toggle="tooltip" title="Approve User">Approve</button>
	                                    </div>
	                                 </td>
	                              </tr>
															@empty
														 @endforelse
														@endisset
	                           </tbody>
	                        </table>
	                     </div>
	                  </div>
	               </div>
	            </div>
	         </div>

	      </div>

	   </div>
	</div>
@endsection
@section('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<script type="text/javascript">
	$(document).ready(function(){
	  $('.pending_list').DataTable();
	});


	$(".approve_user").click(function(event){
		event.preventDefault();
		toastr.options = {
          "closeButton": true,
          "newestOnTop": true,
          "positionClass": "toast-top-right"
        };
       var id = $(this).data('id');
			 console.log(id);
			 var url = $('meta[name="url"]').attr('content');
       $.ajax({
         url: url + '/admin/user/approve',
         type:"get",
         data:{
           id:id,
         },
         success:function(res){
					 toastr.success(res.success);
         },
        });
  });
	</script>
@endsection
