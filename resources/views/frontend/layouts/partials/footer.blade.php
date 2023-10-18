 <!-- Begin Footer Area -->
 <div class="footer mt-4">
     <!-- Begin Footer Static Top Area -->
     <div class="footer-static-top">
         <div class="container">
             <!-- Begin Footer Shipping Area -->
             <div class="footer-shipping pt-60 pb-55 pb-xs-25">
                 <div class="row">
                     <!-- Begin Li's Shipping Inner Box Area -->
                     <div class="col-lg-3 col-md-6 col-sm-6 pb-sm-55 pb-xs-55">
                         <div class="li-shipping-inner-box">
                             <div class="shipping-icon">
                                 <img src="{{ asset('frontend') }}/images/shipping-icon/1.png" alt="Shipping Icon">
                             </div>
                             <div class="shipping-text">
                                 <h2>Free Delivery</h2>
                                 <p>And free returns. See checkout for delivery dates.</p>
                             </div>
                         </div>
                     </div>
                     <!-- Li's Shipping Inner Box Area End Here -->
                     <!-- Begin Li's Shipping Inner Box Area -->
                     <div class="col-lg-3 col-md-6 col-sm-6 pb-sm-55 pb-xs-55">
                         <div class="li-shipping-inner-box">
                             <div class="shipping-icon">
                                 <img src="{{ asset('frontend') }}/images/shipping-icon/2.png" alt="Shipping Icon">
                             </div>
                             <div class="shipping-text">
                                 <h2>Safe Payment</h2>
                                 <p>Pay with the world's most popular and secure payment methods.</p>
                             </div>
                         </div>
                     </div>
                     <!-- Li's Shipping Inner Box Area End Here -->
                     <!-- Begin Li's Shipping Inner Box Area -->
                     <div class="col-lg-3 col-md-6 col-sm-6 pb-xs-30">
                         <div class="li-shipping-inner-box">
                             <div class="shipping-icon">
                                 <img src="{{ asset('frontend') }}/images/shipping-icon/3.png" alt="Shipping Icon">
                             </div>
                             <div class="shipping-text">
                                 <h2>Shop with Confidence</h2>
                                 <p>Our Buyer Protection covers your purchasefrom click to delivery.</p>
                             </div>
                         </div>
                     </div>
                     <!-- Li's Shipping Inner Box Area End Here -->
                     <!-- Begin Li's Shipping Inner Box Area -->
                     <div class="col-lg-3 col-md-6 col-sm-6 pb-xs-30">
                         <div class="li-shipping-inner-box">
                             <div class="shipping-icon">
                                 <img src="{{ asset('frontend') }}/images/shipping-icon/4.png" alt="Shipping Icon">
                             </div>
                             <div class="shipping-text">
                                 <h2>24/7 Help Center</h2>
                                 <p>Have a question? Call a Specialist or chat online.</p>
                             </div>
                         </div>
                     </div>
                     <!-- Li's Shipping Inner Box Area End Here -->
                 </div>
             </div>
             <!-- Footer Shipping Area End Here -->
         </div>
     </div>
     <!-- Footer Static Top Area End Here -->
     <!-- Begin Footer Static Middle Area -->
     <div class="footer-static-middle">
         <div class="container">
             <div class="footer-logo-wrap pt-50 pb-35">
                 <div class="row">
                     <!-- Begin Footer Logo Area -->
                     <div class="col-lg-4 col-md-6">
                         <div class="footer-logo">
                             <img src="{{ config('settings.logo_path') }}" class="header-logo-img" alt="Footer Logo">
                             <p class="info">
                                 We are a team of designers and developers that create high quality HTML Template &
                                 Woocommerce, Shopify Theme.
                             </p>
                         </div>
                         <ul class="des">
                             <li>
                                 <span>Address: </span>
                                 6688Princess Road, London, Greater London BAS 23JK, UK
                             </li>
                             <li>
                                 <span>Phone: </span>
                                 <a href="#">(+123) 123 321 345</a>
                             </li>
                             <li>
                                 <span>Email: </span>
                                 <a href="mailto://info@yourdomain.com">info@yourdomain.com</a>
                             </li>
                         </ul>
                     </div>
                     <!-- Footer Logo Area End Here -->
                     <!-- Begin Footer Block Area -->
                     <div class="col-lg-2 col-md-3 col-sm-6">
                         <div class="footer-block">
                             <h3 class="footer-block-title">Product</h3>
                             <ul>
                                 <li><a href="#">Prices drop</a></li>
                                 <li><a href="#">New products</a></li>
                                 <li><a href="#">Best sales</a></li>
                                 <li><a href="#">Contact us</a></li>
                             </ul>
                         </div>
                     </div>
                     <!-- Footer Block Area End Here -->
                     <!-- Begin Footer Block Area -->
                     <div class="col-lg-2 col-md-3 col-sm-6">
                         <div class="footer-block">
                             <h3 class="footer-block-title">Our company</h3>
                             <ul>
                                 <li><a href="#">Delivery</a></li>
                                 <li><a href="#">Legal Notice</a></li>
                                 <li><a href="#">About us</a></li>
                                 <li><a href="#">Contact us</a></li>
                             </ul>
                         </div>
                     </div>
                     <!-- Footer Block Area End Here -->
                     <!-- Begin Footer Block Area -->
                     <div class="col-lg-4">
                         <div class="footer-block">
                             <h3 class="footer-block-title">Follow Us</h3>
                             <ul class="social-link">
                                 @if (config('settings.instagram'))
                                     <li class="instagram">
                                         <a href="{{ config('settings.instagram') }}" data-toggle="tooltip" target="_blank"
                                             title="Instagram">
                                             <i class="fa fa-instagram"></i>
                                         </a>
                                     </li>
                                 @endif
                                 @if (config('settings.facebook'))
                                     <li class="facebook">
                                         <a href="{{ config('settings.facebook') }}" data-toggle="tooltip" target="_blank"
                                             title="Facebook">
                                             <i class="fa fa-facebook"></i>
                                         </a>
                                     </li>
                                 @endif
                                 @if (config('settings.twitter'))
                                     <li class="twitter">
                                         <a href="{{ config('settings.twitter') }}" data-toggle="tooltip" target="_blank"
                                             title="Twitter">
                                             <i class="fa fa-twitter"></i>
                                         </a>
                                     </li>
                                 @endif
                                 @if (config('settings.youtube'))
                                     <li class="youtube">
                                         <a href="{{ config('settings.youtube') }}" data-toggle="tooltip" target="_blank"
                                             title="Youtube">
                                             <i class="fa fa-youtube"></i>
                                         </a>
                                     </li>
                                 @endif
                             </ul>
                         </div>

                     </div>
                     <!-- Footer Block Area End Here -->
                 </div>
             </div>
         </div>
     </div>
     <!-- Footer Static Middle Area End Here -->

 </div>
 <!-- Footer Area End Here -->
