
  <div class="row files_content">
     <div  class="d-flex align-items-stretch flex-wrap date " >
       @forelse ($data['item']['image'] as $keyimg => $img)
        <div class="d-inline-flex m-1 ">
           <button class="folder-container">
             <a id="img_popup" data-img ="{{$img['paper_img_url']}}" >
               <img class="img-file" src="{{$img['paper_img_url']}}" alt="" >
               <div class="folder-name">{{$img['paper_img']}}</div>
             </a>

           </button>
        </div>
      @empty
      @endforelse
     </div>
  </div>
