<div class="my-card rounded">
    <div>
        <h1 class="text-center">Titulo</h1>
    </div>
    <div class="position-relative card-container rounded">
        <div class="card-img rounded">
            <img src="{{ asset('images/bici.webp')}}" class="img-fluid image rounded">
            <div class="card-text position-absolute rounded-top">
                <h5 class="title">{{ $ad->title }}</h5>
                <h6 class="subtitle mb-2 text-muted">{{ $ad->price }} €</h6>
                
                <div>
                    <strong><a href="{{ route('category.ads',$ad->category) }}">#{{ $category->name }}</a></strong>
                        <i>{{ $ad->created_at->format('d/m/Y') }}</i>
                    <div class="mb-2">
                        <small>{{ $ad->user->name }}</small>
                    </div>
                    
                </div>
                <div class="d-flex justify-content-center ">
                    <a href="{{ route('ads.show', $ad) }}" class="btn card-btn btn-success rounded-1 px-5 mb-5">Ver</a>
                </div>
            </div>
        </div>
    </div>
</div>