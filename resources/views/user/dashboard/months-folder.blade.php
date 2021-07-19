
  <div class="row month-folders months_content border-bottom" >
     <div class="d-flex align-items-stretch flex-wrap month " >
       @forelse ($months as $key => $value)
        <div class="d-inline-flex mb-1 ">
           <button class="folder-container month_fol_btn breadcrumb_btn m-0" data-id="{{$value->month}}" data-year="{{$year_req}}">
              <div class="folder-icon">
                 <i class="fa fa-folder folder-icon-color"></i>
              </div>
              <div class="folder-name">{{$value->month}}</div>
           </button>
        </div>
      @empty
      @endforelse
     </div>
  </div>
