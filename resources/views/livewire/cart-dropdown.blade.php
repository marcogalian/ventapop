<div>
    @isset($addcart)
    @forelse ($addcart as $ad)
    <div class="col-10 container d-flex justify-content-center content-mini-card mb-3 mt-3">
        <div class="card-container rounded row p-1" style="width: 12rem;">
            <img src="{{ !$ad->images()->get()->isEmpty() ? $ad->images()->first()->getUrl(400,300) : 'https://via.placeholder.com/150'}} "
                class=" col-4 p-0 rounded" alt="{{ $ad->title }}" style="height: 4rem;">
            <div class="card-body col-8 ps-2 d-flex flex-column justify-content-around">
                <p class="title-cart m-0">{{ $ad->title }}</p>
                <p class="price-cart text-success m-0">{{ $ad->price }} &#8364</p>
            </div>
        </div>
        <div>
            
        </div>
    </div>
    @empty
    <div>
        <p>El carrito está vacío</p>
    </div>
    @endforelse
    @endisset
</div>
