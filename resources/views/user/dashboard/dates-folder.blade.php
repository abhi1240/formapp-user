
    <div class="row date-folders dates_content border-bottom" >
       <div  class="d-flex align-items-stretch flex-wrap date " >
           @forelse ($data['item']['date'] as $key2 => $value2)
          <div class="d-inline-flex mb-1 ">
             <button class="folder-container date_fol_btn breadcrumb_btn m-0" data-id="{{$value2['date']}}" data-month="{{$data['item']['month']}}" data-year="{{$data['item']['year']}}">
                <div class="folder-icon">
                   <i class="fa fa-folder-open folder-icon-color"></i>
                </div>
                <div class="folder-name">{{$value2['date']}}</div>
             </button>
          </div>
      @empty
      @endforelse
       </div>
    </div>
