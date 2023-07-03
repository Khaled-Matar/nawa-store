@foreach ($products as $product)
<div class="col-lg-6 col-md-6 col-12">
    <div class="single-banner" style="{{ $product->image_url }}">
        <div class="content">
            <h2><a href="{{ route('shop.products.show', $product->slug) }}">{{ $product->name }}</a></h2>
            <p>{{ $product->short_description }}</p>
            <div class="button">
                <a href="{{ route('shop.products.show', $product->slug) }}" class="btn">View Details</a>
            </div>
        </div>
    </div>
</div>
@endforeach