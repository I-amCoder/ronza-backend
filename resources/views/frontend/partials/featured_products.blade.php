@if ($products->count() > 0)
    <section class="product-area li-trending-product pt-60 pb-45">
        <div class="container">
            <div class="row">
                <!-- Begin Li's Tab Menu Area -->
                <div class="col-lg-12">
                    <div class="li-product-tab li-trending-product-tab">
                        <h2>
                            <span>Featured Products</span>
                        </h2>
                        <ul class="nav li-product-menu li-trending-product-menu">
                            <li><a class="active" data-toggle="tab" href="#home1"><span>All Featured</span></a></li>

                        </ul>
                    </div>
                    <!-- Begin Li's Tab Menu Content Area -->
                    <div class="tab-content li-tab-content li-trending-product-content">
                        <div id="home1" class="tab-pane show fade in active">
                            <div class="row">
                                <div class="product-active owl-carousel">
                                    @foreach ($products as $product)
                                        <div class="col-lg-12">
                                            <!-- single-product-wrap start -->
                                            <div class="single-product-wrap">
                                                <div class="product-image">
                                                    <a href="single-product.html">
                                                        <img src="{{ $product->image_path }}" alt="Li's Product Image">
                                                    </a>
                                                    @if ($product->created_at > \Carbon\Carbon::now()->subHours(24))
                                                        <span class="sticker">New</span>
                                                    @endif
                                                </div>
                                                <div class="product_desc">
                                                    <div class="product_desc_info">
                                                        <div class="product-review">
                                                            <h5 class="manufacturer">
                                                                <a
                                                                    href="shop-left-sidebar.html">{{ $product->model }}</a>
                                                            </h5>
                                                            <div class="rating-box">
                                                                <ul class="rating">
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                    <li class="no-star"><i class="fa fa-star-o"></i>
                                                                    </li>
                                                                    <li class="no-star"><i class="fa fa-star-o"></i>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <h4><a class="product_name"
                                                                href="single-product.html">{{ $product->title }}</a>
                                                        </h4>
                                                        <div class="price-box">
                                                            @if ($product->discount > 0)
                                                                <span
                                                                    class="new-price new-price-2">{{ $product->discounted_price }}</span>
                                                                <span class="old-price">@money($product->base_price) </span>
                                                            @else
                                                                <span class="new-price new-price-2">@money($product->base_price)
                                                                </span>
                                                            @endif
                                                            @if ($product->discount > 0)
                                                                <span
                                                                    class="discount-percentage">{{ $product->discount_percentage }}</span>
                                                            @endif

                                                        </div>
                                                    </div>
                                                    <div class="add-actions">
                                                        <ul class="add-actions-link">
                                                            <li class="add-cart active"><a href="#">Add to
                                                                    cart</a></li>
                                                            <li><a class="links-details" href="wishlist.html"><i
                                                                        class="fa fa-heart-o"></i></a></li>
                                                            <li><a href="#" title="quick view"
                                                                    class="quick-view-btn" data-toggle="modal"
                                                                    data-target="#exampleModalCenter"><i
                                                                        class="fa fa-eye"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- single-product-wrap end -->
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Tab Menu Content Area End Here -->
                </div>
                <!-- Tab Menu Area End Here -->
            </div>
        </div>
    </section>
@endif
