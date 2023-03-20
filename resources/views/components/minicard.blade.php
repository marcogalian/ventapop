<div>
    <div class="mt-3 card-container rounded" style="width: 12rem;">
        <img src="{{$img}}" class="card-img-top" alt="{{ $title}}">
        <div class="card-body">          
          <a href="{{ route('ads.show', $ad )}}" class="text-center nav-link m-0 p-0">
            <p class="card-title mt-3">{{ $title}}</p>
            <p class="text-danger text-center">{{ $price}} &#8364</p>            
          </a>
          
        </div>
      </div>
</div>