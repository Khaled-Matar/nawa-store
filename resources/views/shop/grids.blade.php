<x-shop-layout title="Shop Grid">

    <!-- Start Product Grids -->
    <section class="product-grids section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12">
                    <!-- Start Product Sidebar -->
                    <div class="product-sidebar">
                        <!-- Start Single Widget -->
                        <form action="{{ URL::current() }}" method="get" class="form-inline">
                            <div class="single-widget search">
                                <h3>Search Product</h3>
                                <input type="text" name="search" value="{{ request('search') }}"
                                    class="form-control mb-2 mr-2" placeholder="Search">
                            </div>

                            <!-- Start Single Widget -->
                            <div class="single-widget">
                                <select name="category_id" class="form-control mb-2 mr-2">
                                    <option value="">All Categories</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @selected(request('category_id') == $category->id)>
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- End Single Widget -->

                            <!-- Start Single Widget -->
                            <div class="single-widget range">
                                <h3>Price Range</h3>
                                <input type="number" name="price_min" value="{{ request('price_min') }}"
                                    class="form-control mb-2 mr-2" placeholder="Minimum Price">
                                <input type="number" name="price_max" value="{{ request('price_max') }}"
                                class="form-control mb-2 mr-2" placeholder="Maxiam Price">
                                <button type="submit" class="btn btn-dark">Filter</button>
                            </div>
                            <!-- End Single Widget -->
                        </form>
                        <!-- End Single Widget -->

                    </div>
                    <!-- End Product Sidebar -->
                </div>
                <div class="col-lg-9 col-12">
                    <div class="product-grids-head">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-grid" role="tabpanel"
                                aria-labelledby="nav-grid-tab">
                                <div class="row">
                                        <!-- Start Single Product -->
                                            <x-search product="$product" count="20" />
                                        <!-- End Single Product -->
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Pagination -->
                                        <!--/ End Pagination -->
                                        {{ $products->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Product Grids -->
</x-shop-layout>
