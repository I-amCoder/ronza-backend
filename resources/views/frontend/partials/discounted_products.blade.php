  @if (count($discounted_products) > 0)
      <!-- Begin Li's Trendding Products Area -->
      <section class="product-area li-laptop-product li-trendding-products best-sellers pb-45 pt-4">
          <div class="container">
              <div class="row">
                  <!-- Begin Li's Section Area -->
                  <div class="col-lg-12">
                      <div class="li-section-title">
                          <h2>
                              <span>Discounts</span>
                          </h2>
                      </div>
                      <div class="row">
                          <div class="product-active owl-carousel">
                              @foreach ($discounted_products as $product)
                                  <div class="col-lg-12">
                                      <!-- single-product-wrap start -->
                                      <div class="single-product-wrap">
                                          <div class="product-image">
                                              <a href="single-product.html">
                                                  <img src="{{ $product->image_path }}"
                                                      alt="Li's Product Image">
                                              </a>
                                              @if ($product->is_new)
                                                  <span class="sticker">New</span>
                                              @endif
                                          </div>
                                          <div class="product_desc">
                                              <div class="product_desc_info">
                                                  <div class="product-review">
                                                      <h5 class="manufacturer">
                                                          <a href="shop-left-sidebar.html">{{ $product->model }}</a>
                                                      </h5>
                                                      <div class="rating-box">
                                                          <ul class="rating">
                                                              <li><i class="fa fa-star-o"></i></li>
                                                              <li><i class="fa fa-star-o"></i></li>
                                                              <li><i class="fa fa-star-o"></i></li>
                                                              <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                              <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                          </ul>
                                                      </div>
                                                  </div>
                                                  <h4><a class="product_name show-product-modal"  href="javascript::void(0)">{{ $product->title }}</a></h4>
                                                  <div class="price-box">
                                                      <span
                                                          class="new-price new-price-2">{{ $product->discounted_price }}</span>
                                                      <span class="old-price">@money($product->base_price) </span>

                                                      <span
                                                          class="discount-percentage">{{ $product->discount_percentage }}</span>

                                                  </div>
                                              </div>
                                              <div class="add-actions">
                                                  <ul class="add-actions-link">
                                                      <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                      <li><a class="links-details" href="wishlist.html"><i
                                                                  class="fa fa-heart-o"></i></a></li>
                                                      <li><a href="#" title="quick view"  class="quick-view-btn show-product-modal"><i
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
                  <!-- Li's Section Area End Here -->
              </div>
          </div>
      </section>
  @endif
