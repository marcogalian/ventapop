<div class="my-card rounded">
    <div class="position-relative card-container rounded">
        <div class="p-1 text-center bg-light text-secondary">
            <p class="title-card m-0">{{ $title }}</p>
        </div>
        <div class="card-img rounded">
            <img src="{{ $img }}" class="image img-fluid" alt="{{ $ad->title }}">
            <div class="card-text position-absolute">
                <p class="p-1 text-center text-secondary title-card">{{ $title }}</p>
                <h6 class="subtitle mb-2 text-success">{{ $price }} &#8364</h6>
                <p class="text">{{ $body }}</p>
                <div class="subtitle">
                    <strong><a class="text-decoration-none text-secondary" href="{{ route('category.ads', $ad->category) }}">#{{ __($ad->category->name) }}</a></strong>
                    <i>{{ $ad->created_at->format('d/m/Y') }}</i>
                </div>
                <div class="subtitle mt-2">
                    <small>{{ $ad->user->name }}</small>
                </div>
                <div class="d-flex justify-content-center mt-auto">
                    <a href="{{ route('ads.show', $ad )}}" class="btn card-btn btn-primary rounded-1">{{ __('Mostrar')}}</a>
                </div>
            </div>
        </div>
    </div>
</div>