@extends('user.dashboard.layouts.app')
@section('content')
	<style media="screen">

 .card{
	 border-radius: 0;
 }
 .card-icon-wrapper{
	 position: absolute;
		 right: 14px;
		 top: 21%;
		 transform: translateY(-50%);
		 width: 57px;
		 height: 57px;
		 border-radius: 2px;
		 display: -webkit-flex;
		 display: flex;
		 -webkit-align-items: center;
		 align-items: center;
		 -webkit-justify-content: center;
		 justify-content: center;

 }
 .card-icon-1{
	 background-color: #45cbc1;
	 color: #fff;
	 box-shadow: 0 0 10px 5px rgb(0 176 182 / 35%);
 }
 .card-icon-2{
	 background-color: #fd625e;
	 color: #fff;
	 box-shadow: 0 0 10px 5px rgb(182 0 0 / 35%);
 }
 .card-icon-3{
	 background-color: #394bf2;
	 color: #fff;
	 box-shadow: 0 0 10px 5px rgb(1 0 182 / 35%);
 }
 .card-icon-4{
	 background-color: #ff2a60;
	 color: #fff;
	 box-shadow: 0 0 10px 5px rgb(182 0 52 / 35%);
 }
 .card-title-1{
	 font-size: 16px;
	 font-weight: 500;
 }
 .bal-amt {
		 font-size: 2rem;
		 font-weight: 100;
		 color: #9b9b9b;
 }
 .view_txt1{
	 cursor: pointer;
     font-size: 15px;
     text-align: center;
     color: #00cabb;
     background-color: #e3fcfd;
     padding: 5px;
 }
 .view_txt2{
		 cursor: pointer;
	 	font-size: 15px;
		 text-align: center;
		 color: #fd625e;
		 background-color: #ffe1e18f;
		 padding: 5px;
 }
 .view_txt3{
	 cursor: pointer;
		font-size: 15px;
		text-align: center;
		color: #394bf2;
		background-color: #ddddf599;
		padding: 5px;
		 }
 .view_txt4{
	 cursor: pointer;
    font-size: 15px;
    text-align: center;
    color: #ff2a60;
    background-color: #eec2ce7a;
    padding: 5px;
 }
 .paper_img{
	 width:40px;
 }
 </style>
<div class="contents">
	<div class="container-fluid">
		<div class="row mt-4">
			<div class="col-md-3 col-lg-3">
					<div class="card p-3">
							<h5 class="card-title card-title-1">Today's Images</h5>
							<h5 class="bal-amt pb-2 mb-1 ">
								@if (isset($data['item']['todays_imgs']))
									{{number_format($data['item']['todays_imgs'])}}
									@else
										0.00
								@endif
							</h5>
							<p class="font-weight-light view_txt1 mb-0 "> View Explorer <span></span> </p>
							<div class="card-icon-wrapper card-icon-1">
								<i class="fas fa-folder-open fa-2x"></i>
							</div>
					</div>
			</div>
			<div class="col-md-3 col-lg-3">
				<div class="card p-3">
						<h5 class="card-title card-title-1">Pending Images</h5>
						<h5 class="bal-amt pb-2 mb-1 ">
							@if (isset($data['item']['pending_imgs_cnt']))
								{{number_format($data['item']['pending_imgs_cnt'])}}
								@else
									0.00
							@endif
						</h5>
						<p class="font-weight-light view_txt2 mb-0 " id="pending_view"> View Details <span><i class="fas fa-arrow-circle-right ml-2"></i></span> </p>
						<div class="card-icon-wrapper card-icon-2">
							<i class="fas fa-folder-open fa-2x"></i>
						</div>
				</div>
			</div>
			<div class="col-md-3 col-lg-3">
				<div class="card p-3">
						<h5 class="card-title card-title-1">Approved Images</h5>
						<h5 class="bal-amt pb-2 mb-1  ">
							@if (isset($data['item']['approved_imgs_cnt']))
								{{number_format($data['item']['approved_imgs_cnt'])}}
								@else
									0.00
							@endif
							</h5>
							<p class="font-weight-light view_txt3 mb-0 " id="approved_view"> View Details <span><i class="fas fa-arrow-circle-right ml-2"></i></span> </p>
						<div class="card-icon-wrapper card-icon-3">
							<i class="fas fa-folder-open fa-2x"></i>
						</div>
				</div>
			</div>
			<div class="col-md-3 col-lg-3">
				<div class="card p-3">
						<h5 class="card-title card-title-1">Rejected Images</h5>
						<h5 class="bal-amt pb-2 mb-1  ">
							@if (isset($data['item']['rejected_imgs_cnt']))
								{{number_format($data['item']['rejected_imgs_cnt'])}}
								@else
									0.00
							@endif
							</h5>
						 <p class="font-weight-light view_txt4 mb-0 " id="rejected_view"> View Details <span><i class="fas fa-arrow-circle-right ml-2"></i></span> </p>
						<div class="card-icon-wrapper card-icon-4">
							<i class="fas fa-folder-open fa-2x"></i>
						</div>
				</div>
			</div>
			<div class="col-md-12 col-lg-12 mt-3">
				<div class="card" id="pending_images">
					<div class="card-header">
						<h5>Pending Images</h5>
					</div>
					<div class="card-body">
						<div class="table mb-10">
	                <div class="table-responsive">
	                   <table class="table mb-0 pending_list ">
	                      <thead style="white-space:nowrap;" >
	                         <tr class="">
														 <th>Image</th>
														 <th>Paper Title</th>
														 <th>Publication</th>
														 <th>Description</th>
														 <th>Language</th>
														 <th>Date</th>
	                         </tr>
	                      </thead>
	                      <tbody style="white-space:nowrap;">
													@isset($data['item']['pending_imgs'])
													 @forelse ($data['item']['pending_imgs'] as $key => $image)
															 <tr>
																<td>
																	<a id="img_popup" data-img ="{{$image['paper_img_url']}}" >
																		<img src="{{$image['paper_img_url']}}" alt="" class="paper_img" >
																	</a>
																</td>
																<td>{{$image['paper_title']}}</td>
																<td>{{$image['publication']}}</td>
																<td>{{$image['description']}}</td>
																<td>{{$image['language']}}</td>
																<td>{{ \Carbon\Carbon::parse($image['created_at'])->format('j F, Y')}}</td>
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
				<div class="card" id="rejected_images" style="display:none">
					<div class="card-header">
						<h5>Rejected Images</h5>
					</div>
					<div class="card-body">
						<div class="table mb-10">
									<div class="table-responsive">
										 <table class="table mb-0 rejected_list ">
												<thead style="white-space:nowrap;" >
													 <tr class="">
														 <th>Image</th>
														 <th>Paper Title</th>
														 <th>Publication</th>
														 <th>Description</th>
														 <th>Language</th>
														 <th>Date</th>
													 </tr>
												</thead>
												<tbody style="white-space:nowrap;">
													@isset($data['item']['rejected_imgs'])
													 @forelse ($data['item']['rejected_imgs'] as $key => $image)
															 <tr>
																 <td>
 																	<a id="img_popup" data-img ="{{$image['paper_img_url']}}" >
 																		<img src="{{$image['paper_img_url']}}" alt="" class="paper_img" >
 																	</a>
 																</td>
																<td>{{$image['paper_title']}}</td>
																<td>{{$image['publication']}}</td>
																<td>{{$image['description']}}</td>
																<td>{{$image['language']}}</td>
																<td>{{ \Carbon\Carbon::parse($image['created_at'])->format('j F, Y')}}</td>
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
				<div class="card" id="approved_images" style="display:none">
					<div class="card-header">
						<h5>Approved Images</h5>
					</div>
					<div class="card-body">
						<div class="table mb-10">
									<div class="table-responsive">
										 <table class="table mb-0 approved_list ">
												<thead style="white-space:nowrap;" >
													 <tr class="">
														 <th>Image</th>
														 <th>Paper Title</th>
														 <th>Publication</th>
														 <th>Description</th>
														 <th>Language</th>
														 <th>Date</th>
													 </tr>
												</thead>
												<tbody style="white-space:nowrap;">
													@isset($data['item']['approved_imgs'])
 													 @forelse ($data['item']['approved_imgs'] as $key => $image)
 															 <tr>
																 <td>
 																	<a id="img_popup" data-img ="{{$image['paper_img_url']}}" >
 																		<img src="{{$image['paper_img_url']}}" alt="" class="paper_img" >
 																	</a>
 																</td>
 																<td>{{$image['paper_title']}}</td>
 																<td>{{$image['publication']}}</td>
 																<td>{{$image['description']}}</td>
 																<td>{{$image['language']}}</td>
 																<td>{{ \Carbon\Carbon::parse($image['created_at'])->format('j F, Y')}}</td>
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
<div class="modal" id="img_modal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-md" role="document">
				<div class="modal-content modal-bg-white ">
						<img src=""  alt="" id="img_id">
				</div>
		</div>
</div>
	@endsection
	{{-- Scripts Section --}}
	@section('scripts')
	<script src="{{ asset('vendor_assets/js/Chart.min.js') }}"></script>
	<script src="{{ asset('vendor_assets/js/charts.js') }}"></script>
	<script type="text/javascript">
	$(document).ready(function(){
	  $('.pending_list').DataTable();
		$('.approved_list').DataTable();
		$('.rejected_list').DataTable();

		$('#pending_view').click(function(){
	    $('#pending_images').show();
	    $('#approved_images').hide();
			$('#rejected_images').hide();
	  });

	$('#approved_view').click(function(){
		$('#pending_images').hide();
		$('#approved_images').show();
		$('#rejected_images').hide();
	});

	$('#rejected_view').click(function(){
		$('#pending_images').hide();
		$('#approved_images').hide();
		$('#rejected_images').show();
	});

	});
	$(document).on('click', '#img_popup', function(){
		var imgsrc = $(this).data('img');
		$('#img_id').attr('src',imgsrc);
    $('#img_modal').modal('toggle');
  });
	</script>
	@endsection
