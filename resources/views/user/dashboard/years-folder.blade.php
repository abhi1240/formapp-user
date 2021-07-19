
  <div class="row year-folders years_content border-bottom"  >
     <div  class="d-flex align-items-stretch flex-wrap year " >
       @forelse ($year as $key1 => $value1)
        <div class="d-inline-flex mb-1 ">
           <button class="folder-container year_fol_btn breadcrumb_btn m-0" data-id="{{$value1->year}}" >
              <div class="folder-icon">
                 <i class="fa fa-folder folder-icon-color"></i>
              </div>
              <div class="folder-name">{{$value1->year}}</div>
           </button>
        </div>
      @empty
        <span>No files are available</span>
      @endforelse
     </div>
  </div>
