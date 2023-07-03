@foreach ($products as $product)

<div class="col-lg-4 col-12">
    <div class="row">
        <div class="col-lg-12 col-md-6 col-12 md-custom-padding">
            <!-- Start Small Banner -->
            <div class="hero-small-banner"
                style="{{$product->image_url}}">
                <div class="content">
                    <h2>
                        <span>New line required</span>
                        <a href="{{ route('shop.products.show', $product->slug ) }}">{{ $product->name }}</a>
                    </h2>
                    <h3>{{$product->price_formatted}}</h3>
                </div>
            </div>
            <!-- End Small Banner -->
        </div>
        <div class="col-lg-12 col-md-6 col-12">
            <!-- Start Small Banner -->
            <div class="hero-small-banner style2">
                <div class="content">
                    <h2>Weekly Sale!</h2>
                    <p>{{$product->short_description}}</p>
                    <div class="button">
                        <a class="btn" href="{{ route('shop.products.show', $product->slug ) }}">Shop Now</a>
                    </div>
                </div>
            </div>
            <!-- Start Small Banner -->
        </div>
    </div>
</div>
@endforeach
