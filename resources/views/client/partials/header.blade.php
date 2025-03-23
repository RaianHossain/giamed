<header>
    <!-- Menu Area -->
    <div class="header-menu-area">
        <div class="container">
            <div class="row">
                <!-- Logo -->
                <div class="col-xl-3 col-lg-3 col-md-5 d-flex align-items-center">
                    <div class="logo pos-rel">
                        <a href="/" class="d-flex justify-content-between align-items-center">
                            <!-- SVG Logo -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="88" height="87" viewBox="0 0 33 32" fill="none">
                                <g fill="none" fill-rule="evenodd" stroke="none" stroke-width="1">
                                    <g transform="translate(-71.000000, -207.000000)">
                                        <g transform="translate(71.428571, 207.000000)">
                                            <path d="M10,0 L22,0 C27.5228475,0 32,4.4771525 32,10 L32,22 C32,27.5228475 27.5228475,32 22,32 L10,32 C4.4771525,32 0,27.5228475 0,22 L0,10 C0,4.4771525 4.4771525,0 10,0 Z" fill="white" />
                                            <path stroke="rgba(15, 191, 151, 1)" stroke-linecap="round" stroke-width="1.3" d="M7,16.2964521 C10.0319936,16.2964521 11.3785735,18.1607115 11.6442424,18.1153545 C12.1294083,18.0325235 11.6525482,13.9560076 12.9174351,15.5024231 C14.1823221,17.0488387 12.7557605,21.8087492 14.2373887,19.8957446 C15.719017,17.9827399 15.4068303,7.59036727 16.5201075,8.01250578 C17.6333847,8.43464429 17.7882931,21.8740486 18.4865214,22.9037782 C19.1847498,23.9335078 19.910292,16.3602962 20.5033257,16.2964521 C20.8986815,16.2538894 22.7309063,16.2538894 26,16.2964521" />
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            <!-- Logo Text -->
                            <h4 class="mt-1">GIA Medical</h4>
                        </a>
                    </div>
                </div>

                <!-- Header Right -->
                <div class="col-xl-9 col-lg-9 col-md-9">
                    <!-- Social Icons -->
                    <div class="header-right f-right">
                        <div class="header-social-icons f-right d-none d-xl-block">
                            <ul>
                                <li>
                                    <a href="https://www.facebook.com/GiaMedical" target="_blank">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/company/giamedical/about/" target="_blank">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Navigation Menu -->
                    <div class="header__menu f-right">
                        <nav id="mobile-menu">
                            <ul>
                                <li>
                                    <a href="{{ route('about-us') }}">About Us</a>
                                </li>
                                <li>
                                    <a href="{{ route('all-services') }}">Services</a>
                                </li>
                                <li>
                                    <a href="{{ route('shop') }}">Shop +</a>
                                    {{-- <ul class="submenu">
                                        <li>
                                            <a href="{{ route('shop') }}">Shop Page</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('product-details') }}">Shop Details</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('cart') }}">Shopping Cart</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('checkout') }}">Checkout</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('wishlist') }}">Wishlist</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('login') }}">Login</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('register') }}">Register</a>
                                        </li>
                                    </ul> --}}
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Mobile Menu -->
                <div class="col-12">
                    <div class="mobile-menu"></div>
                </div>
            </div>
        </div>
    </div>
</header>