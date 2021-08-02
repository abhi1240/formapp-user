@extends('home-layouts.app')
@section('content')
  <style media="screen">
  ul.dropdown-menu.auto_c {
      min-width: 50rem;
      padding: 5px;
      margin-bottom: 12px;
  }
#citylist li {
    padding: 4px;
}
#citylist a {
    color: #6b6a6b;
}

#paper_auto_c li {
    padding: 4px;
}
#paper_auto_c a {
    color: #6b6a6b;
}
  </style>
<section class=" g-py-50" style="background: url(/theme/assets/img/banner1.jpg);">
      <div class="container">
        <div class="d-sm-flex text-center">
          <div class="align-self-center">
            <h2 class="h3 g-font-weight-600 w-100 g-mb-10 g-mb-0--md g-color-primary"><span>Welcome!</span>   <span class="text-success"></span></h2>
          </div>

          <div class="align-self-center ml-auto">
            <ul class="u-list-inline">
              <li class="list-inline-item g-mr-5">
                <a class="u-link-v5 g-color-primary g-color-primary--hover" href="#">Home</a>
                <i class="g-color-gray-light-v2 g-ml-5">/</i>
              </li>
              <li class="list-inline-item g-mr-5">
                <a class="u-link-v5 g-color-primary g-color-primary--hover" href="#">Form Filling</a>
                <i class="g-color-gray-light-v2 g-ml-5">/</i>
              </li>
              <li class="list-inline-item g-color-primary">
                <span>Update Image</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- End Breadcrumbs -->

    <section class="g-mb-100">
      <div class="work-panel-des container">
        <div class="row">
          <!-- Profile Sidebar -->
          <div class="col-lg-3 g-mb-50 g-mb-0--lg">
            <div class="list-group list-group-border-0 g-mb-0 g-mt-20">

              <a href="#" class="list-group-item justify-content-between active">
                <span><i class="icon-picture g-pos-rel g-top-1 g-mr-8"></i> Image Preview</span>
              </a>
            </div>
            <!-- User Image -->
            <div class="u-block-hover g-pos-rel">
              <figure>
                <img class="img-fluid w-100 u-block-hover__main--zoom-v1" id="preview_img" src="{{asset('theme/assets/images/dummy-pic.jpg')}}" alt="Image Description">
              </figure>

              <!-- Figure Caption -->
              <figcaption class="u-block-hover__additional--fade g-bg-black-opacity-0_5 g-pa-30">
                <div class="u-block-hover__additional--fade u-block-hover__additional--fade-up g-flex-middle">

                </div>
              </figcaption>

              <span class="g-pos-abs g-top-20 g-left-0">
                  <a class="btn btn-sm u-btn-primary rounded-0" href="#"></a>

                </span>
            </div>
          </div>
          <div class="col-lg-9">
            <!-- Nav tabs -->
            <ul class="nav nav-justified u-nav-v1-1 u-nav-primary g-brd-bottom--md g-brd-bottom-2 g-brd-primary g-mb-20" role="tablist" data-target="nav-1-1-default-hor-left-underline" data-tabs-mobile-type="slide-up-down" data-btn-classes="btn btn-md btn-block rounded-0 u-btn-outline-primary g-mb-20">
            </ul>
            <div id="nav-1-1-default-hor-left-underline" class="tab-content">
              <!-- Edit Profile -->
              <div class="tab-pane fade show active" id="nav-1-1-default-hor-left-underline--1" role="tabpanel">
                @if ($errors->any())
                   <div class="alert alert-danger">
                     <ul>
                         @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                         @endforeach
                     </ul>
                   </div><br />
                 @endif
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
                <h2 class="dashbord-title">Add Images</h2>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                  <form class="g-brd-around g-brd-gray-light-v4 g-pa-30 g-mb-30" action="{{route('upload.image')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- Text Input with Bottom Left Tooltip -->
                    <div class="form-group g-mb-20">
                      <label class="g-mb-10">Paper</label>
                      <div class="input-group g-brd-primary--focus g-mb-10">
                        <div class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                          <i class="fa fa-edit"></i>
                        </div>
                        <input class="form-control form-control-md border-left-0 rounded-0 pl-0" name="paper_title" type="text" placeholder="Title" id="paper_autocomplete">
                      </div>
                    </div>
                    <div class="form-group g-mb-20" id="">
                    <div id="paper_auto_c"></div>
                    </div>
                    <div class="form-group g-mb-20" id="citys_section">
                      <label class="g-mb-10">Publication</label>
                      <div class="input-group g-brd-primary--focus g-mb-10">
                        <div class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                          <i class="fa fa-edit"></i>
                        </div>
                        <input class="form-control form-control-md border-left-0 rounded-0 pl-0" value="" name="publication" id="publication_search" type="text" placeholder="publication">
                        {{-- <b class="">Publication </b> --}}
                      </div>
                    </div>
                    <div class="form-group g-mb-20" id="">
                    <div id="citylist"></div>
                    </div>
                    <div class="form-group g-mb-20">
                      <label class="g-mb-10">Language</label>
                      <div class="input-group g-brd-primary--focus g-mb-10">
                        <div class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                          <i class="fa fa-angle-down"></i>
                        </div>
                        <select class="form-control form-control-md border-left-0 rounded-0 pl-0" id="select-tag" name="language_id" style="height:40px;" data-open-icon="fa fa-angle-down">
                    <option value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Select Language &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                    @forelse ($data['item']['languages'] as $key => $value)
                      <option value="{{$value['id']}}">{{$value['name']}}</option>
                    @empty
                    @endforelse
                  </select>
                        <b class="tooltip tooltip-bottom-left u-tooltip--v1">Language</b>
                      </div>
                    </div>
                  	<div id="yourBtn" onclick="getFile()"><i class="icon-cloud-upload"></i> Click to upload an image</div>
                      <div style='height: 0px;width: 0px; overflow:hidden;'>
                      <input id="upfile" type="file" name="paper_img" onchange="loadPreview(this);sub(this)"/>
                      </div>

                    <div class="text-sm-right">
                      <a class="btn u-btn-darkgray rounded-0 g-py-12 g-px-25 g-mr-10" href="#">Cancel</a>
                      <button type="submit" class="btn u-btn-primary rounded-0 g-py-12 g-px-25" >Save Changes</button>
                    </div>
                </form>
              </div>
              <!-- End Edit Profile -->

            <!-- End Tab panes -->
          </div>
          <!-- End Profle Content -->
        </div>
      </div>
    </section>
    <link href="http://demo.expertphp.in/css/jquery.ui.autocomplete.css" rel="stylesheet">
<script src="http://demo.expertphp.in/js/jquery.js"></script>
<script src="http://demo.expertphp.in/js/jquery-ui.min.js"></script>
    <script src="{{ asset('vendor_assets/js/jquery/jquery-3.5.1.min.js') }}"></script>
    <script type="text/javascript">
    function loadPreview(input, id) {
    id = id || '#preview_img';
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $(id).attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
    }
    $('input').attr('autocomplete','off');
    $( "#publication_search" ).on('keydown, keyup', function (e) {

            var search_p = $(this).val();
            var search_length = $(this).val().length;
            if (search_length > 4 ) {
              var url = $('meta[name="url"]').attr('content');
              var csrf_token = $('meta[name="csrf-token"]').attr('content');
              $.ajax({
                type: "POST",
                  headers: { 'X-CSRF-TOKEN': csrf_token },
                 url : url + '/citys_autocomplete',
                 data: {
                   search: search_p,
                 },
                 success : function(data) {
                   $('#citylist').fadeIn();
                    $('#citylist').html(data);
                 },
                 error : function() {
                     alert("Error");
                 }
              });
            }
          });

          $(document).on('click', '.city_auto_list', function(){
            var val1 = $(this).text();
            console.log(val1);
       $('#publication_search').val(val1);
       $('#citylist').fadeOut();
   });
//paper autocomplete
   $( "#paper_autocomplete" ).on('keydown, keyup', function (e) {

           var search_p = $(this).val();
           var search_length = $(this).val().length;
           if (search_length > 2 ) {
             var url = $('meta[name="url"]').attr('content');
             var csrf_token = $('meta[name="csrf-token"]').attr('content');
             $.ajax({
               type: "POST",
                 headers: { 'X-CSRF-TOKEN': csrf_token },
                url : url + '/papers_autocomplete',
                data: {
                  search: search_p,
                },
                success : function(data) {
                  $('#paper_auto_c').fadeIn();
                   $('#paper_auto_c').html(data);
                },
                error : function() {
                    alert("Error");
                }
             });
           }
         });

         $(document).on('click', '.paper_auto_list', function(){
           var val1 = $(this).text();
           console.log(val1);
      $('#paper_autocomplete').val(val1);
      $('#paper_auto_c').fadeOut();
  });
    </script>
@endsection
