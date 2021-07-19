
  <div class="row files_content">
     <div  class="d-flex align-items-stretch flex-wrap date " >
       @forelse ($images as $keyimg => $img)
        <div class="d-inline-flex m-1 ">
           <button class="folder-container">
              <img class="img-file" src="{{$img->paper_img_url}}" alt="" >
              <div class="folder-name">{{$img->paper_img}}</div>
           </button>
        </div>
      @empty
      @endforelse
     </div>
  </div>
