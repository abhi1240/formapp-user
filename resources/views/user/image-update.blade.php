@extends('home-layouts.app')
@section('content')
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
                  <!-- Figure Social Icons -->
                  {{-- <ul class="list-inline text-center g-flex-middle-item--bottom g-mb-20">
                    <li class="list-inline-item align-middle g-mx-7">
                      <a class="u-icon-v1 u-icon-size--md g-color-white" href="#">
                        <i class="icon-note u-line-icon-pro"></i>
                      </a>
                    </li>
                    <li class="list-inline-item align-middle g-mx-7">
                      <a class="u-icon-v1 u-icon-size--md g-color-white" href="#">
                        <i class="icon-notebook u-line-icon-pro"></i>
                      </a>
                    </li>
                    <li class="list-inline-item align-middle g-mx-7">
                      <a class="u-icon-v1 u-icon-size--md g-color-white" href="#">
                        <i class="icon-settings u-line-icon-pro"></i>
                      </a>
                    </li>
                  </ul> --}}
                  <!-- End Figure Social Icons -->
                </div>
              </figcaption>
              <!-- End Figure Caption -->

              <!-- User Info -->
              <span class="g-pos-abs g-top-20 g-left-0">
                  <a class="btn btn-sm u-btn-primary rounded-0" href="#"></a>

                </span>
              <!-- End User Info -->
            </div>
            <!-- User Image -->

            <!-- Sidebar Navigation -->

            <!-- End Sidebar Navigation -->

          </div>
          <!-- End Profile Sidebar -->

          <!-- Profle Content -->
          <div class="col-lg-9">
            <!-- Nav tabs -->
            <ul class="nav nav-justified u-nav-v1-1 u-nav-primary g-brd-bottom--md g-brd-bottom-2 g-brd-primary g-mb-20" role="tablist" data-target="nav-1-1-default-hor-left-underline" data-tabs-mobile-type="slide-up-down" data-btn-classes="btn btn-md btn-block rounded-0 u-btn-outline-primary g-mb-20">
            </ul>
            <!-- End Nav tabs -->

            <!-- Tab panes -->
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
                    <input class="form-control form-control-md border-left-0 rounded-0 pl-0" name="paper_title" type="text" placeholder="Title">
                    <b class="tooltip tooltip-bottom-left u-tooltip--v1">Paper </b>
                  </div>
                </div>
                <div class="form-group g-mb-20">
                  <label class="g-mb-10">Publication</label>
                  <div class="input-group g-brd-primary--focus g-mb-10">
                    <div class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                      <i class="fa fa-edit"></i>
                    </div>
                    <input class="form-control form-control-md border-left-0 rounded-0 pl-0" name="publication" type="text" placeholder="publication">
                    <b class="tooltip tooltip-bottom-left u-tooltip--v1">Publication </b>
                  </div>
                </div>
                <div class="form-group g-mb-20">
                  <label class="g-mb-10">Language</label>
                  <div class="input-group g-brd-primary--focus g-mb-10">
                    <div class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                      <i class="fa fa-angle-down"></i>
                    </div>
                    <select class="form-control form-control-md border-left-0 rounded-0 pl-0" name="language_id" style="height:40px;" data-open-icon="fa fa-angle-down">
                <option value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Select Language &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                <option value="1">english</option>
                <option value="2">kannada</option>
                <option value="3">hindi</option>
                <option value="4">tamil</option>
              </select>
                    <b class="tooltip tooltip-bottom-left u-tooltip--v1">Language</b>
                  </div>
                </div>
              	<div id="yourBtn" onclick="getFile()"><i class="icon-cloud-upload"></i> Click to upload an image</div>
                  <div style='height: 0px;width: 0px; overflow:hidden;'>
                  <input id="upfile" type="file" value="" name="paper_img" onchange="loadPreview(this);sub(this)"/>
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
    <script type="text/javascript">
    function loadPreview(input, id) {
    id = id || '#preview_img';
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(id)
                    .attr('src', e.target.result);
                    // .width(200)
                    // .height(150);
        };

        reader.readAsDataURL(input.files[0]);
    }
 }

    </script>
@endsection
