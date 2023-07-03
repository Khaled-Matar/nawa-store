<x-shop-layout title="Home" :show_breadcrumb="false">

    <!-- Start Hero Area -->
    <x-first-products title=""  count="1" /> 
    <!-- End Hero Area -->

    <!-- Start Featured Categories Area -->
    <section class="featured-categories section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Featured Categories</h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered alteration in some form.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Category -->
                    <div class="single-category">
                        <h3 class="heading">TV & Audios</h3>
                        <ul>
                            <li><a href="product-grids.html">Smart Television</a></li>
                            <li><a href="product-grids.html">QLED TV</a></li>
                            <li><a href="product-grids.html">Audios</a></li>
                            <li><a href="product-grids.html">Headphones</a></li>
                            <li><a href="product-grids.html">View All</a></li>
                        </ul>
                        <div class="images">
                            <img src="https://via.placeholder.com/180x180" alt="#">
                        </div>
                    </div>
                    <!-- End Single Category -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Category -->
                    <div class="single-category">
                        <h3 class="heading">Desktop & Laptop</h3>
                        <ul>
                            <li><a href="product-grids.html">Smart Television</a></li>
                            <li><a href="product-grids.html">QLED TV</a></li>
                            <li><a href="product-grids.html">Audios</a></li>
                            <li><a href="product-grids.html">Headphones</a></li>
                            <li><a href="product-grids.html">View All</a></li>
                        </ul>
                        <div class="images">
                            <img src="https://via.placeholder.com/180x180" alt="#">
                        </div>
                    </div>
                    <!-- End Single Category -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Category -->
                    <div class="single-category">
                        <h3 class="heading">Cctv Camera</h3>
                        <ul>
                            <li><a href="product-grids.html">Smart Television</a></li>
                            <li><a href="product-grids.html">QLED TV</a></li>
                            <li><a href="product-grids.html">Audios</a></li>
                            <li><a href="product-grids.html">Headphones</a></li>
                            <li><a href="product-grids.html">View All</a></li>
                        </ul>
                        <div class="images">
                            <img src="https://via.placeholder.com/180x180" alt="#">
                        </div>
                    </div>
                    <!-- End Single Category -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Category -->
                    <div class="single-category">
                        <h3 class="heading">Dslr Camera</h3>
                        <ul>
                            <li><a href="product-grids.html">Smart Television</a></li>
                            <li><a href="product-grids.html">QLED TV</a></li>
                            <li><a href="product-grids.html">Audios</a></li>
                            <li><a href="product-grids.html">Headphones</a></li>
                            <li><a href="product-grids.html">View All</a></li>
                        </ul>
                        <div class="images">
                            <img src="https://via.placeholder.com/180x180" alt="#">
                        </div>
                    </div>
                    <!-- End Single Category -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Category -->
                    <div class="single-category">
                        <h3 class="heading">Smart Phones</h3>
                        <ul>
                            <li><a href="product-grids.html">Smart Television</a></li>
                            <li><a href="product-grids.html">QLED TV</a></li>
                            <li><a href="product-grids.html">Audios</a></li>
                            <li><a href="product-grids.html">Headphones</a></li>
                            <li><a href="product-grids.html">View All</a></li>
                        </ul>
                        <div class="images">
                            <img src="https://via.placeholder.com/180x180" alt="#">
                        </div>
                    </div>
                    <!-- End Single Category -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Category -->
                    <div class="single-category">
                        <h3 class="heading">Game Console</h3>
                        <ul>
                            <li><a href="product-grids.html">Smart Television</a></li>
                            <li><a href="product-grids.html">QLED TV</a></li>
                            <li><a href="product-grids.html">Audios</a></li>
                            <li><a href="product-grids.html">Headphones</a></li>
                            <li><a href="product-grids.html">View All</a></li>
                        </ul>
                        <div class="images">
                            <img src="https://via.placeholder.com/180x180" alt="#">
                        </div>
                    </div>
                    <!-- End Single Category -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Features Area -->

    <!-- Start Trending Product Area -->
    <x-trending-products  title="New Arrivals" count="4" />  {{-- giving value to variabels  --}}
    <!-- End Trending Product Area -->

    <!-- Start Banner Area -->
    <section class="banner section">
        <div class="container">
            <div class="row">
                <x-smart-products  title="" count="2" /> 
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!-- Start Special Offer -->
    <x-smart  title="Special Offer"/> 

    <!-- End Special Offer -->

    <!-- Start Home Product List -->
    <section class="home-product-list section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12 custom-responsive-margin">
                    <h4 class="list-title">Best Sellers</h4>
                    <!-- Start Single List -->
                    <div class="single-list">
                        <div class="list-image">
                            <a href="product-grids.html"><img src="https://via.placeholder.com/100x100"
                                    alt="#"></a>
                        </div>
                        <div class="list-info">
                            <h3>
                                <a href="product-grids.html">GoPro Hero4 Silver</a>
                            </h3>
                            <span>$287.99</span>
                        </div>
                    </div>
                    <!-- End Single List -->
                    <!-- Start Single List -->
                    <div class="single-list">
                        <div class="list-image">
                            <a href="product-grids.html"><img src="https://via.placeholder.com/100x100"
                                    alt="#"></a>
                        </div>
                        <div class="list-info">
                            <h3>
                                <a href="product-grids.html">Puro Sound Labs BT2200</a>
                            </h3>
                            <span>$95.00</span>
                        </div>
                    </div>
                    <!-- End Single List -->
                    <!-- Start Single List -->
                    <div class="single-list">
                        <div class="list-image">
                            <a href="product-grids.html"><img src="https://via.placeholder.com/100x100"
                                    alt="#"></a>
                        </div>
                        <div class="list-info">
                            <h3>
                                <a href="product-grids.html">HP OfficeJet Pro 8710</a>
                            </h3>
                            <span>$120.00</span>
                        </div>
                    </div>
                    <!-- End Single List -->
                </div>
                <div class="col-lg-4 col-md-4 col-12 custom-responsive-margin">
                    <h4 class="list-title">New Arrivals</h4>
                    <!-- Start Single List -->
                    <div class="single-list">
                        <div class="list-image">
                            <a href="product-grids.html"><img src="https://via.placeholder.com/100x100"
                                    alt="#"></a>
                        </div>
                        <div class="list-info">
                            <h3>
                                <a href="product-grids.html">iPhone X 256 GB Space Gray</a>
                            </h3>
                            <span>$1150.00</span>
                        </div>
                    </div>
                    <!-- End Single List -->
                    <!-- Start Single List -->
                    <div class="single-list">
                        <div class="list-image">
                            <a href="product-grids.html"><img src="https://via.placeholder.com/100x100"
                                    alt="#"></a>
                        </div>
                        <div class="list-info">
                            <h3>
                                <a href="product-grids.html">Canon EOS M50 Mirrorless Camera</a>
                            </h3>
                            <span>$950.00</span>
                        </div>
                    </div>
                    <!-- End Single List -->
                    <!-- Start Single List -->
                    <div class="single-list">
                        <div class="list-image">
                            <a href="product-grids.html"><img src="https://via.placeholder.com/100x100"
                                    alt="#"></a>
                        </div>
                        <div class="list-info">
                            <h3>
                                <a href="product-grids.html">Microsoft Xbox One S</a>
                            </h3>
                            <span>$298.00</span>
                        </div>
                    </div>
                    <!-- End Single List -->
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <h4 class="list-title">Top Rated</h4>
                    <!-- Start Single List -->
                    <div class="single-list">
                        <div class="list-image">
                            <a href="product-grids.html"><img src="https://via.placeholder.com/100x100"
                                    alt="#"></a>
                        </div>
                        <div class="list-info">
                            <h3>
                                <a href="product-grids.html">Samsung Gear 360 VR Camera</a>
                            </h3>
                            <span>$68.00</span>
                        </div>
                    </div>
                    <!-- End Single List -->
                    <!-- Start Single List -->
                    <div class="single-list">
                        <div class="list-image">
                            <a href="product-grids.html"><img src="https://via.placeholder.com/100x100"
                                    alt="#"></a>
                        </div>
                        <div class="list-info">
                            <h3>
                                <a href="product-grids.html">Samsung Galaxy S9+ 64 GB</a>
                            </h3>
                            <span>$840.00</span>
                        </div>
                    </div>
                    <!-- End Single List -->
                    <!-- Start Single List -->
                    <div class="single-list">
                        <div class="list-image">
                            <a href="product-grids.html"><img src="https://via.placeholder.com/100x100"
                                    alt="#"></a>
                        </div>
                        <div class="list-info">
                            <h3>
                                <a href="product-grids.html">Zeus Bluetooth Headphones</a>
                            </h3>
                            <span>$28.00</span>
                        </div>
                    </div>
                    <!-- End Single List -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Home Product List -->

    <!-- Start Brands Area -->
    <div class="brands">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-12 col-12">
                    <h2 class="title">Popular Brands</h2>
                </div>
            </div>
            <div class="brands-logo-wrapper">
                <div class="brands-logo-carousel d-flex align-items-center justify-content-between">
                    <div class="brand-logo">
                        <img src="https://via.placeholder.com/220x160" alt="#">
                    </div>
                    <div class="brand-logo">
                        <img src="https://via.placeholder.com/220x160" alt="#">
                    </div>
                    <div class="brand-logo">
                        <img src="https://via.placeholder.com/220x160" alt="#">
                    </div>
                    <div class="brand-logo">
                        <img src="https://via.placeholder.com/220x160" alt="#">
                    </div>
                    <div class="brand-logo">
                        <img src="https://via.placeholder.com/220x160" alt="#">
                    </div>
                    <div class="brand-logo">
                        <img src="https://via.placeholder.com/220x160" alt="#">
                    </div>
                    <div class="brand-logo">
                        <img src="https://via.placeholder.com/220x160" alt="#">
                    </div>
                    <div class="brand-logo">
                        <img src="https://via.placeholder.com/220x160" alt="#">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Brands Area -->

    <!-- Start Blog Section Area -->
    <section class="blog-section section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Our Latest News</h2>
                        <p>There are many variations of passages of Lorem
                            Ipsum available, but the majority have suffered alteration in some form.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Blog -->
                    <div class="single-blog">
                        <div class="blog-img">
                            <a href="blog-single-sidebar.html">
                                <img src="https://via.placeholder.com/370x215" alt="#">
                            </a>
                        </div>
                        <div class="blog-content">
                            <a class="category" href="javascript:void(0)">eCommerce</a>
                            <h4>
                                <a href="blog-single-sidebar.html">What information is needed for shipping?</a>
                            </h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt.</p>
                            <div class="button">
                                <a href="javascript:void(0)" class="btn">Read More</a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Blog -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Blog -->
                    <div class="single-blog">
                        <div class="blog-img">
                            <a href="blog-single-sidebar.html">
                                <img src="https://via.placeholder.com/370x215" alt="#">
                            </a>
                        </div>
                        <div class="blog-content">
                            <a class="category" href="javascript:void(0)">Gaming</a>
                            <h4>
                                <a href="blog-single-sidebar.html">Interesting fact about gaming consoles</a>
                            </h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt.</p>
                            <div class="button">
                                <a href="javascript:void(0)" class="btn">Read More</a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Blog -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Blog -->
                    <div class="single-blog">
                        <div class="blog-img">
                            <a href="blog-single-sidebar.html">
                                <img src="https://via.placeholder.com/370x215" alt="#">
                            </a>
                        </div>
                        <div class="blog-content">
                            <a class="category" href="javascript:void(0)">Electronic</a>
                            <h4>
                                <a href="blog-single-sidebar.html">Electronics, instrumentation & control engineering
                                </a>
                            </h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt.</p>
                            <div class="button">
                                <a href="javascript:void(0)" class="btn">Read More</a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Blog -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Blog Section Area -->

    <!-- Start Shipping Info -->
    <section class="shipping-info">
        <div class="container">
            <ul>
                <!-- Free Shipping -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-delivery"></i>
                    </div>
                    <div class="media-body">
                        <h5>Free Shipping</h5>
                        <span>On order over $99</span>
                    </div>
                </li>
                <!-- Money Return -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-support"></i>
                    </div>
                    <div class="media-body">
                        <h5>24/7 Support.</h5>
                        <span>Live Chat Or Call.</span>
                    </div>
                </li>
                <!-- Support 24/7 -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-credit-cards"></i>
                    </div>
                    <div class="media-body">
                        <h5>Online Payment.</h5>
                        <span>Secure Payment Services.</span>
                    </div>
                </li>
                <!-- Safe Payment -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-reload"></i>
                    </div>
                    <div class="media-body">
                        <h5>Easy Return.</h5>
                        <span>Hassle Free Shopping.</span>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- End Shipping Info -->
    <!-- ========================= JS here ========================= -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/tiny-slider.js"></script>
    <script src="assets/js/glightbox.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script type="text/javascript">
        //========= Hero Slider 
        tns({
            container: '.hero-slider',
            slideBy: 'page',
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 0,
            items: 1,
            nav: false,
            controls: true,
            controlsText: ['<i class="lni lni-chevron-left"></i>', '<i class="lni lni-chevron-right"></i>'],
        });

        //======== Brand Slider
        tns({
            container: '.brands-logo-carousel',
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 15,
            nav: false,
            controls: false,
            responsive: {
                0: {
                    items: 1,
                },
                540: {
                    items: 3,
                },
                768: {
                    items: 5,
                },
                992: {
                    items: 6,
                }
            }
        });
    </script>
    <script>
        const finaleDate = new Date("February 15, 2023 00:00:00").getTime();

        const timer = () => {
            const now = new Date().getTime();
            let diff = finaleDate - now;
            if (diff < 0) {
                document.querySelector('.alert').style.display = 'block';
                document.querySelector('.container').style.display = 'none';
            }

            let days = Math.floor(diff / (1000 * 60 * 60 * 24));
            let hours = Math.floor(diff % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
            let minutes = Math.floor(diff % (1000 * 60 * 60) / (1000 * 60));
            let seconds = Math.floor(diff % (1000 * 60) / 1000);

            days <= 99 ? days = `0${days}` : days;
            days <= 9 ? days = `00${days}` : days;
            hours <= 9 ? hours = `0${hours}` : hours;
            minutes <= 9 ? minutes = `0${minutes}` : minutes;
            seconds <= 9 ? seconds = `0${seconds}` : seconds;

            document.querySelector('#days').textContent = days;
            document.querySelector('#hours').textContent = hours;
            document.querySelector('#minutes').textContent = minutes;
            document.querySelector('#seconds').textContent = seconds;

        }
        timer();
        setInterval(timer, 1000);
    </script>

</x-shop-layout>
