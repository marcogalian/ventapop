<div class="my-card rounded">
    <div class="position-relative card-container rounded">
        <div class="card-img rounded">
            {{-- <img src="{{ $img }}" class="img-fluid image rounded"> --}}
            <img src="{{ $img }}" class="image img-fluid rounded" alt="...">
            <div class="card-text position-absolute">
                <h5 class="title title-card">{{ $title }}</h5>
                <h6 class="subtitle mb-2 text-muted">{{ $price }} &#8364</h6>
                <p class="text">{{ $body }}</p>
                <div class="subtitle mb-2">
                    <strong><a class="text-decoration-none text-primary" href="{{ route('category.ads', $ad->category) }}">#{{ __($ad->category->name) }}</a></strong>
                    <i>{{ $ad->created_at->format('d/m/Y') }}</i>
                </div>
                <div class="subtitle mb-2">
                    <small>{{ $ad->user->name }}</small>
                </div>
                <div class="d-flex justify-content-center mt-auto">
                    <a href="{{ route('ads.show', $ad )}}" class="btn card-btn btn-primary rounded-1">{{ __('Mostrar')}}</a>
                </div>
            </div>
        </div>
    </div>
</div>