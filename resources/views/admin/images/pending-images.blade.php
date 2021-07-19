@extends('layouts.app')
@section('content')
	<style media="screen">
		.paper_img{
			width:50px;
		}
	</style>
	<div class="contents">
	   <div class="container-fluid">
	      <div class="row">
	         <div class="col-lg-12">
	            <div class="breadcrumb-main">
	               <h4 class="text-capitalize breadcrumb-title">Pending Images</h4>
	            </div>
	         </div>
	      </div>
	      <div class="row">
					<div class='toast' >fcdsfgdgdfh</div>
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
	                                    <span class="userDatatable-title">Image</span>
	                                 </th>
	                                 <th>
	                                    <span class="userDatatable-title">User Id</span>
	                                 </th>
	                                 <th>
	                                    <span class="userDatatable-title">Paper Title</span>
	                                 </th>
	                                 <th>
	                                    <span class="userDatatable-title">Publication</span>
	                                 </th>
																	 <th>
	                                    <span class="userDatatable-title">Language id</span>
	                                 </th>
																	 <th>
	                                    <span class="userDatatable-title">Date</span>
	                                 </th>
																	 <th>
																		 <span class="userDatatable-title ">Action</span>
																	</th>
	                              </tr>
	                           </thead>
	                           <tbody>
															 @isset($image)
							 									@forelse($image as $key => $img)
	                              <tr>
	                                 <td>
	                                    <div class="userDatatable-content">
	                                       <img src="{{$img->paper_img_url}}" alt="" class="paper_img">
	                                    </div>
	                                 </td>
	                                 <td>
	                                    <div class="userDatatable-content">
	                                       {{$img->user_id}}
	                                    </div>
	                                 </td>
	                                 <td>
	                                    <div class="userDatatable-content">
	                                       {{$img->paper_title}}
	                                    </div>
	                                 </td>
	                                 <td>
	                                    <div class="userDatatable-content">
	                                       {{$img->publication}}
	                                    </div>
	                                 </td>
																	 <td>
	                                    <div class="userDatatable-content">
	                                       {{$img->language_id}}
	                                    </div>
	                                 </td>
																	 <td>
	                                    <div class="userDatatable-content">
	                                       {{ \Carbon\Carbon::parse($img->created_at)->format('F - j - Y')}}
	                                    </div>
	                                 </td>
																	 <td class="text-center">
	                                    <div class="userDatatable-content d-flex">
																				<button href="" class="btn btn-xs btn-rounded btn-outline-success mr-2">Approve</button>
																				<button  data-id="{{$img->id}}"  class="btn btn-xs btn-rounded btn-outline-danger reject_image">Reject</button>
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
	<div class="modal" id="reject_image_modal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-sm modal-info" role="document">
					<div class="modal-content">
						<form class="" action="{{route('reject.image')}}" method="post">
							@csrf
							<input type="hidden" name="reject_id" value="" id="reject_id">
							<div class="modal-body">
									<div class="modal-info-body d-flex">
											<div class="modal-info-icon warning">
													<span data-feather="info"></span>
											</div>
											<div class="modal-info-text">
													<p>Are you sure to Reject? </p>
											</div>
									</div>
							</div>
							<div class="modal-footer">
									<button type="submit" class="btn btn-primary btn-sm">Ok</button>
							</div>
						</form>
					</div>
			</div>
	</div>
@endsection
@section('scripts')
	<script type="text/javascript">
	$(document).ready(function(){
		$(".reject_image").click(function(){
				 var id = $(this).data('id');
				 // console.log(id);
				 $('input[id=reject_id]').val(id);
				 $('#reject_image_modal').modal('show');
		});
	  $('.pending_list').DataTable();
	});
	</script>

@endsection
