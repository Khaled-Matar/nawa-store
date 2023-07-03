@foreach ($products as $product)
    <!-- Start Single Slider -->
    <div class="single-slider" style="{{ $product->image_url }}">
        <div class="content">
            <h2><span>{{ $product->slug }}</span>
                <a href="{{ route('shop.products.show', $product->slug) }}">{{ $product->name }}</a>
            </h2>
            <p>{{ $product->short_description }}</p>
            <h3><span>Now Only</span> {{ $product->price_formatted }}</h3>
            <div class="button">
                <a href="{{ route('shop.products.show', $product->slug) }}" class="btn">Shop Now</a>
            </div>
        </div>
    </div>
    <!-- End Single Slider -->
@endforeach
