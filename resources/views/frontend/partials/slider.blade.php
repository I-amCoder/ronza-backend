  <!-- Begin Slider With Banner Area -->
  <div class="slider-with-banner">
      <div class="container">
          <div class="row">
              <!-- Begin Slider Area -->
              <div class="col-lg-8 col-md-8">
                  <div class="slider-area">
                      <div class="slider-active owl-carousel">
                          @foreach ($carousels as $carousel)
                              <!-- Begin Single Slide Area -->
                              <div class="single-slide align-center-left  animation-style-01 bg-1" style="background-image: url({{ $carousel->image_path }})">
                                  <div class="slider-progress"></div>
                                  <div class="slider-content">
                                      <h5>{!! json_decode($carousel->heading) !!}</h5>
                                      <h2>{!! json_decode($carousel->title) !!}</h2>
                                      <h3>{!! json_decode($carousel->subtitle) !!}</h3>

                                      @if($carousel->link_to_product)
                                      <div class="default-btn slide-btn">
                                          <a class="links" href="{{ $carousel->link_to_product }}">Shopping Now</a>
                                      </div>
                                      @endif
                                  </div>
                              </div>
                          @endforeach
                          <!-- Single Slide Area End Here -->
                      </div>
                  </div>
              </div>
              <!-- Slider Area End Here -->
              <!-- Begin Li Banner Area -->
              <div class="col-lg-4 col-md-4 text-center pt-xs-30">
                  <div class="li-banner">
                      <a href="#">
                          <img src="{{ asset('frontend') }}/images/banner/1_1.jpg" alt="">
                      </a>
                  </div>
                  <div class="li-banner mt-15 mt-sm-30 mt-xs-30">
                      <a href="#">
                          <img src="{{ asset('frontend') }}/images/banner/1_2.jpg" alt="">
                      </a>
                  </div>
              </div>
              <!-- Li Banner Area End Here -->
          </div>
      </div>
  </div>
  <!-- Slider With Banner Area End Here -->
