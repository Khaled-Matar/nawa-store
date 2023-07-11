@foreach ($products as $product)
    <div class="col-lg-4 col-md-6 col-12">
        <div class="single-product">
            <div class="product-image">
                <img src="{{ $product->image_url }}" alt="#">
                <div class="button">
                    <a href="{{ route('shop.products.show', $product->slug) }}" class="btn"><i class="lni lni-cart"></i>
                        View Details</a>
                </div>
            </div>
            <div class="product-info">
                <span class="category">{{ $product->category->name }}</span>
                <h4 class="title">
                    <a href="{{ route('shop.products.show', $product->slug) }}">{{ $product->name }}</a>
                </h4>
                <ul class="review">
                    <li><i class="lni lni-star-filled"></i></li>
                    <li><i class="lni lni-star-filled"></i></li>
                    <li><i class="lni lni-star-filled"></i></li>
                    <li><i class="lni lni-star-filled"></i></li>
                    <li><i class="lni lni-star"></i></li>
                    <li><span>4.0 Review(s)</span></li>
                </ul>
                <div class="price">
                    <span>{{ $product->price_formatted }}</span>
                </div>
            </div>
        </div>
    </div>
@endforeach
    

