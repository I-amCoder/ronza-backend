  <!-- Begin Header Area -->
  <header>
      <!-- Begin Header Top Area -->
      <div class="header-top">
          <div class="container">
              <div class="row">
                  <!-- Begin Header Top Left Area -->
                  <div class="col-lg-3 col-md-4">
                      <div class="header-top-left">
                          <ul class="phone-wrap">
                              <li><span>Telephone Enquiry:</span><a href="#">{{ config('settings.phone') }}</a>
                              </li>
                          </ul>
                      </div>
                  </div>
                  <!-- Header Top Left Area End Here -->
                  <!-- Begin Header Top Right Area -->
                  <div class="col-lg-9 col-md-8">
                      <div class="header-top-right">
                          <ul class="ht-menu">
                              <!-- Begin Setting Area -->

                              <!-- Begin Currency Area -->
                              <li>
                                  <span class="currency-selector-wrapper">Currency :</span>
                                  <div class=""><span>{{ config('settings.currency') }}
                                          {{ config('settings.currency_symbol') }}</span></div>

                              </li>
                              <!-- Currency Area End Here -->
                              {{-- <!-- Begin Language Area -->
                            <li>
                                <span class="language-selector-wrapper">Language :</span>
                                <div class="ht-language-trigger"><span>English</span></div>
                                <div class="language ht-language">
                                    <ul class="ht-setting-list">
                                        <li class="active"><a href="#"><img src="{{ asset('frontend') }}/images/menu/flag-icon/1.jpg" alt="">English</a></li>
                                        <li><a href="#"><img src="{{ asset('frontend') }}/images/menu/flag-icon/2.jpg" alt="">Français</a></li>
                                    </ul>
                                </div>
                            </li>
                            <!-- Language Area End Here --> --}}
                          </ul>
                      </div>
                  </div>
                  <!-- Header Top Right Area End Here -->
              </div>
          </div>
      </div>
      <!-- Header Top Area End Here -->
      <!-- Begin Header Middle Area -->
      <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
          <div class="container">
              <div class="row">
                  <!-- Begin Header Logo Area -->
                  <div class="col-lg-3">
                      <div class="logo pb-sm-30 pb-xs-30">
                          <a href="index.html">
                              <img src="{{ config('settings.logo_path') }}" class="header-logo-img" alt="">
                          </a>
                      </div>
                  </div>
                  <!-- Header Logo Area End Here -->
                  <!-- Begin Header Middle Right Area -->
                  <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
                      <!-- Begin Header Middle Searchbox Area -->
                      <form action="#" class="hm-searchbox">
                          <select class="nice-select select-search-category">
                              <option value="0">All</option>
                              @foreach ($categories as $category)
                                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                              @endforeach
                          </select>
                          <input type="text" placeholder="Enter your search key ...">
                          <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                      </form>
                      <!-- Header Middle Searchbox Area End Here -->
                      {{-- <!-- Begin Header Middle Right Area -->
                    <div class="header-middle-right">
                        <ul class="hm-menu">
                            <!-- Begin Header Middle Wishlist Area -->
                            <li class="hm-wishlist">
                                <a href="wishlist.html">
                                    <span class="cart-item-count wishlist-item-count">0</span>
                                    <i class="fa fa-heart-o"></i>
                                </a>
                            </li>
                            <!-- Header Middle Wishlist Area End Here -->
                            <!-- Begin Header Mini Cart Area -->
                            <li class="hm-minicart">
                                <div class="hm-minicart-trigger">
                                    <span class="item-icon"></span>
                                    <span class="item-text">£80.00
                                        <span class="cart-item-count">2</span>
                                    </span>
                                </div>
                                <span></span>
                                <div class="minicart">
                                    <ul class="minicart-product-list">
                                        <li>
                                            <a href="single-product.html" class="minicart-product-image">
                                                <img src="images/product/small-size/5.jpg" alt="cart products">
                                            </a>
                                            <div class="minicart-product-details">
                                                <h6><a href="single-product.html">Aenean eu tristique</a></h6>
                                                <span>£40 x 1</span>
                                            </div>
                                            <button class="close" title="Remove">
                                                <i class="fa fa-close"></i>
                                            </button>
                                        </li>
                                        <li>
                                            <a href="single-product.html" class="minicart-product-image">
                                                <img src="images/product/small-size/6.jpg" alt="cart products">
                                            </a>
                                            <div class="minicart-product-details">
                                                <h6><a href="single-product.html">Aenean eu tristique</a></h6>
                                                <span>£40 x 1</span>
                                            </div>
                                            <button class="close" title="Remove">
                                                <i class="fa fa-close"></i>
                                            </button>
                                        </li>
                                    </ul>
                                    <p class="minicart-total">SUBTOTAL: <span>£80.00</span></p>
                                    <div class="minicart-button">
                                        <a href="shopping-cart.html" class="li-button li-button-fullwidth li-button-dark">
                                            <span>View Full Cart</span>
                                        </a>
                                        <a href="checkout.html" class="li-button li-button-fullwidth">
                                            <span>Checkout</span>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <!-- Header Mini Cart Area End Here -->
                        </ul>
                    </div>
                    <!-- Header Middle Right Area End Here --> --}}
                  </div>
                  <!-- Header Middle Right Area End Here -->
              </div>
          </div>
      </div>
      <!-- Header Middle Area End Here -->
      <!-- Begin Header Bottom Area -->
      <div class="header-bottom header-sticky d-none d-lg-block d-xl-block">
          <div class="container">
              <div class="row">
                  <div class="col-lg-12">
                      <!-- Begin Header Bottom Menu Area -->
                      <div class="hb-menu">
                          <nav>
                              <ul>
                                  <li><a href="index.html">Home</a></li>
                                  <li><a href="shop-left-sidebar.html">Shop</a></li>
                                  <li><a href="about-us.html">About Us</a></li>
                                  <li><a href="contact.html">Contact</a></li>
                                  <li><a href="shop-left-sidebar.html">Smartwatch</a></li>
                                  <li><a href="shop-left-sidebar.html">Accessories</a></li>
                              </ul>
                          </nav>
                      </div>
                      <!-- Header Bottom Menu Area End Here -->
                  </div>
              </div>
          </div>
      </div>
      <!-- Header Bottom Area End Here -->
      <!-- Begin Mobile Menu Area -->
      <div class="mobile-menu-area d-lg-none d-xl-none col-12">
          <div class="container">
              <div class="row">
                  <div class="mobile-menu">
                  </div>
              </div>
          </div>
      </div>
      <!-- Mobile Menu Area End Here -->
  </header>
  <!-- Header Area End Here -->
