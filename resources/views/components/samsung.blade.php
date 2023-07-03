@foreach ($products as $product)
    <div class="single-banner right" style="{{ $product->image_url }}">
        <div class="content">
            <h2><a href="{{ route('shop.products.show', $product->slug) }}">{{ $product->name }}</a></h2>
            <p>{{ $product->short_description }}</p>
            <div class="price">
                <span>{{ $product->price_formatted }}</span>
            </div>
            <div class="button">
                <a href="{{ route('shop.products.show', $product->slug) }}" class="btn">Shop Now</a>
            </div>
        </div>
    </div>
@endforeach
