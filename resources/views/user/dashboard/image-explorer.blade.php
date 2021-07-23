@extends('user.dashboard.layouts.app')
@section('content')
<style media="screen">
   .folder-icon{
   font-size: 3rem;
   /* padding:5px; */
   }
   .folder-container{
   text-align: center;
   margin-left: 1rem;
   margin-right: 1rem;
   margin-bottom: 1.5rem;
   width: 100px;
   padding: 0;
   align-self: start;
   background: none;
   border: none;
   outline-color: transparent !important;
   cursor: pointer;
   }
   .folder-icon-color{
   color:#eadf8d;
   }
   .img-file{
   height:150px;
   width:120px;
   }
/* .b-card{
  background-color:#eaeff7;
  color: #ccc;
}
.breadcrumb-item.active {
    color: #a6abba;
} */
</style>
<div class="contents">
   <div class="atbd-page-content">
<div class="container-fluid px-4">
   <div class="row">
     <div class="col-lg-12">
        <div class="breadcrumb-main">
           <h4 class="text-capitalize breadcrumb-title">Explorer</h4>
           <div class="breadcrumb-action justify-content-center flex-wrap">
           </div>
        </div>
        <div class="card b-card p-1 mb-1" aria-label="breadcrumb">
          <ul class="atbd-breadcrumb nav p-2">
              <li class="atbd-breadcrumb__item">
                    <i class="fas fa-images mr-2"></i>
                      Explorer
                  <span class="breadcrumb__seperator">
                      <span class="la la-angle-right"></span>
                  </span>
              </li>
          </ul>
      </div>
     </div>
      <div class="col-md-12">
         <div class="row">
            <div class="col-md-12">
               <div class="card border-0 shadow ">
                 <div class="card-header">
                   <span>Today's Files</span>
                 </div>
                 <div class="card-body  mt-2" id="todays_file_card" >
                    <div id="file-folders" class="d-flex align-items-stretch flex-wrap date " >
                       @isset($data['item']['todays_imgs'])
                       @forelse ($data['item']['todays_imgs'] as $key => $img)
                       <div class="d-inline-flex m-1 ">
                          <button class="folder-container">
                             <img class="img-file" src="{{$img['paper_img_url']}}" alt="" >
                             <div class="folder-name">{{$img['paper_img']}}</div>
                          </button>
                       </div>
                       @empty
                         <span>No files are available.</span>
                       @endforelse
                       @endisset
                    </div>
                 </div>
                  </div>
                  <div class="card border-0 shadow-sm mt-3">
                    <div class="card-header">
                      <span>Browse Files</span>
                    </div>
                  <div class="card-body" id="year_section">
                    @include('user.dashboard.years-folder')
                  </div>
                  <div class="card-body" id="month_section">

                  </div>
                  <div class="card-body" id="dates_section">

                  </div>
                  <div class="card-body" id="files_section">

                  </div>

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
  <script type="text/javascript">
  $(document).ready(function() {
     $(".year_fol_btn").click(function() {
       var year_id = $(this).data('id');
       var url = $('meta[name="url"]').attr('content');
       var year = "<li class='breadcrumb-item '>"+ "<span class='breadcrumb__seperator'><span class='la la-angle-right'></span></span>" +year_id+"</li>";
       $.ajax({
           url : url + '/user/get_month',
           data: {
             year: year_id,
           },
           success : function(data) {
               $('#month_section').html(data);
               $('.atbd-breadcrumb').html("");
               $('.atbd-breadcrumb').html('<li class="atbd-breadcrumb__item"><i class="fas fa-images mr-2"></i>Explorer</li>');
               $('.atbd-breadcrumb').append(year);
           },
           error : function() {
               alert("Error");
           }
       });
     });
     });


  $(document).on('click', '.month_fol_btn', function(){
    var month_id = $(this).data('id');
    var year_id = $(this).data('year');
    var month = "<li class='atbd-breadcrumb__item-item '>"+"<span class='breadcrumb__seperator'><span class='la la-angle-right'></span></span>"+year_id+"</li>"+"<li class='atbd-breadcrumb__item active'>"+"<span class='breadcrumb__seperator'><span class='la la-angle-right'></span></span>"+month_id+"</li>";
    // console.log(month_id);
    var url = $('meta[name="url"]').attr('content');
    $.ajax({
        url : url + '/user/get_date',
        data: {
          month: month_id,
          year: year_id,
        },
        success : function(data) {
            // console.log(data);
            $('#dates_section').html(data);
            $('#files_section').html("");
            $('.atbd-breadcrumb').html("");
            $('.atbd-breadcrumb').html('<li class="atbd-breadcrumb__item"><i class="fas fa-images mr-2"></i>Explorer</li>');
            $('.atbd-breadcrumb').append(month);
        },
        error : function() {
            alert("Error");
        }
    });
  });
  $(document).on('click', '.date_fol_btn', function(){
  var date_id = $(this).data('id');
  var month_id = $(this).data('month');
  var year_id = $(this).data('year');

  var date = "<li class='atbd-breadcrumb__item-item '>"+"<span class='breadcrumb__seperator'><span class='la la-angle-right'></span></span>"+year_id+"</li>"+"<li class='atbd-breadcrumb__item-item active'>"+"<span class='breadcrumb__seperator'><span class='la la-angle-right'></span></span>"+month_id+"</li>"+"<li class='atbd-breadcrumb__item-item active'>"+"<span class='breadcrumb__seperator'><span class='la la-angle-right'></span></span>"+date_id+"</li>";
  // console.log(date_id);
  var url = $('meta[name="url"]').attr('content');
  $.ajax({
     url : url + '/user/get_file',
     data: {
       date: date_id,
       month: month_id,
       year: year_id,
     },
     success : function(data) {
         console.log(data);
         $('#files_section').html(data);

         $('.atbd-breadcrumb').html("");
         $('.atbd-breadcrumb').html('<li class="atbd-breadcrumb__item"><i class="fas fa-images mr-2"></i>Explorer</li>');
         $('.atbd-breadcrumb').append(date);
     },
     error : function() {
         alert("Error");
     }
  });
  });

  </script>

@endsection
