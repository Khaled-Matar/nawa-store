@foreach ($products as $product)
<div class="col-lg-4 col-md-12 col-12">
    <div class="offer-content">
        <div class="image">
            <a href="{{ route('shop.products.show', $product->slug) }}">
                <img src="{{ $product->image_url }}" alt="#">
            </a>
            <span class="sale-tag">-50%</span>
        </div>
        <div class="text">
            <h2><a href="{{ route('shop.products.show', $product->slug) }}">{{ $product->name }}</a></h2>
            <ul class="review">
                <li><i class="lni lni-star-filled"></i></li>
                <li><i class="lni lni-star-filled"></i></li>
                <li><i class="lni lni-star-filled"></i></li>
                <li><i class="lni lni-star-filled"></i></li>
                <li><i class="lni lni-star-filled"></i></li>
                <li><span>5.0 Review(s)</span></li>
            </ul>
            <div class="price">
                <span>{{ $product->price_formatted }}</span>
                <span class="discount-price">{{ $product->compare_price_formatted }}</span>
            </div>
            <p>{{ $product->short_description    }}</p>
        </div>
        <div class="box-head">
            <div class="box">
                <h1 id="days">000</h1>
                <h2 id="daystxt">Days</h2>
            </div>
            <div class="box">
                <h1 id="hours">00</h1>
                <h2 id="hourstxt">Hours</h2>
            </div>
            <div class="box">
                <h1 id="minutes">00</h1>
                <h2 id="minutestxt">Minutes</h2>
            </div>
            <div class="box">
                <h1 id="seconds">00</h1>
                <h2 id="secondstxt">Secondes</h2>
            </div>
        </div>
        <div style="background: rgb(204, 24, 24);" class="alert">
            <h1 style="padding: 50px 80px;color: white;">We are sorry, Event ended ! </h1>
        </div>
    </div>
</div>
@endforeach