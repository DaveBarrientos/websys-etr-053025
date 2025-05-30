<header class="header shop">
    <!-- Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12">
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <!-- Top Right -->
                    <div class="right-content">
                        <ul class="list-main">
                            {{-- <li><i class="ti-alarm-clock"></i> <a href="#">Daily deal</a></li> --}}
                            @auth 
                                @if(Auth::user()->role=='admin')
                                    <li><i class="fa fa-truck"></i> <a href="{{route('order.track')}}">Track Order</a></li>
                                    <li><i class="ti-user"></i> <a href="{{route('admin')}}"  target="_blank">Dashboard</a></li>
                                @else 
                                    <li><i class="fa fa-truck"></i> <a href="{{route('order.track')}}">Track Order</a></li>
                                    <li><i class="ti-user"></i> <a href="{{route('user')}}"  target="_blank">Dashboard</a></li>
                                @endif
                            @endauth
                        </ul>
                    </div>
                    <!-- End Top Right -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->
    <div class="middle-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-12">
                    
                    <!-- Search Form -->
                    <div class="search-top">
                        <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                        <!-- Search Form -->
                        <div class="search-top">
                            <form class="search-form">
                                <input type="text" placeholder="Search here..." name="search">
                                <button value="search" type="submit"><i class="ti-search"></i></button>
                            </form>
                        </div>
                        <!--/ End Search Form -->
                    </div>
                    <!--/ End Search Form -->
                    <div class="mobile-nav"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Inner -->
    <div class="header-inner">
        <div class="container">
            <div class="cat-nav-head">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="menu-area">
                            <!-- Main Menu -->
                            <nav class="navbar navbar-expand-lg">
                                <div class="navbar-collapse">	
                                    <div class="nav-inner">
                                        <div class="logo">
                                            @php
                                                $settings = DB::table('settings')->first();
                                            @endphp
                                            <a href="{{ route('home') }}">
                                                <img 
                                                    src="{{ $settings && $settings->logo ? asset($settings->logo) : asset('default-logo.png') }}" 
                                                    alt="logo" 
                                                    class="logo-default"
                                                    style="height:30px; max-width:100px;"
                                                >
                                                <img 
                                                    src="{{ $settings && $settings->logo2 ? asset($settings->logo2) : asset('default-logo2.png') }}" 
                                                    alt="logo scrolled" 
                                                    class="logo-scrolled"
                                                    style="height:30px; max-width:100px; display:none;"
                                                >
                                            </a>
                                        </div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                var defaultLogo = document.querySelector('.logo-default');
                                                var scrolledLogo = document.querySelector('.logo-scrolled');
                                                window.addEventListener('scroll', function() {
                                                    if(window.scrollY > 50) {
                                                        if(defaultLogo) defaultLogo.style.display = 'none';
                                                        if(scrolledLogo) scrolledLogo.style.display = 'inline';
                                                    } else {
                                                        if(defaultLogo) defaultLogo.style.display = 'inline';
                                                        if(scrolledLogo) scrolledLogo.style.display = 'none';
                                                    }
                                                });
                                            });
                                        </script>
                                        <ul class="nav main-menu menu navbar-nav">
                                            <li class="{{Request::path()=='home' ? 'active' : ''}}"><a href="{{route('home')}}">Home</a></li>
                                            <li class="{{Request::path()=='about-us' ? 'active' : ''}}"><a href="{{route('about-us')}}">About Us</a></li>
                                            <li class="@if(Request::path()=='product-grids'||Request::path()=='product-lists')  active  @endif"><a href="{{route('product-grids')}}">Products</a><span class="new">New</span></li>												
                                                {{Helper::getHeaderCategory()}}								
                                               
                                            <li class="{{Request::path()=='contact' ? 'active' : ''}}"><a href="{{route('contact')}}">Contact Us</a></li>

                                            <li class="search-bar">
                                                <form method="POST" action="{{route('product.search')}}">
                                                    @csrf
                                                    <input name="search" placeholder="Search Products Here....." type="search">
                                                    <button class="btnn" type="submit"><i class="ti-search"></i></button>
                                                </form>
                                            </li>
                                            <li>
                                                <div class="sinlge-bar shopping">
                                                    <!-- Same parent container as the cart -->
                                                    <a href="{{route('wishlist')}}" class="single-icon"><i class="fa fa-heart-o"></i> <span class="total-count">{{Helper::wishlistCount()}}</span></a>
                                                    <!-- Wishlist Modal Content -->
                                                    @auth
                                                        <div class="shopping-item"> 
                                                            <div class="dropdown-cart-header">
                                                                <span>{{count(Helper::getAllProductFromWishlist())}} Items</span>
                                                                <a href="{{route('wishlist')}}">View Wishlist</a>
                                                            </div>
                                                            <ul class="shopping-list">
                                                                @foreach(Helper::getAllProductFromWishlist() as $data)
                                                                    @php
                                                                        $photo=explode(',',$data->product['photo']);
                                                                    @endphp
                                                                    <li>
                                                                        <a href="{{route('wishlist-delete',$data->id)}}" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                                                                        <a class="cart-img" href="#"><img src="{{$photo[0]}}" alt="{{$photo[0]}}"></a>
                                                                        <h4><a href="{{route('product-detail',$data->product['slug'])}}" target="_blank">{{$data->product['title']}}</a></h4>
                                                                        <p class="quantity">{{$data->quantity}} x - <span class="amount">₱{{number_format($data->price,2)}}</span></p>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                            <div class="bottom">
                                                                <div class="total">
                                                                    <span>Total</span>
                                                                    <span class="total-amount">₱{{number_format(Helper::totalWishlistPrice(),2)}}</span>
                                                                </div>
                                                                <a href="{{route('cart')}}" class="btn animate">Cart</a>
                                                            </div>
                                                        </div>
                                                    @endauth
                                                </div>
                                            </li>
                                            <li>
                                                {{-- <div class="sinlge-bar">
                                                <a href="{{route('wishlist')}}" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                                </div> --}}
                                                <div class="sinlge-bar shopping">
                                                    <a href="{{route('cart')}}" class="single-icon"><i class="ti-bag"></i> <span class="total-count">{{Helper::cartCount()}}</span></a>
                                                    <!-- Shopping Item -->
                                                    @auth
                                                        <div class="shopping-item">
                                                            <div class="dropdown-cart-header">
                                                                <span>{{count(Helper::getAllProductFromCart())}} Items</span>
                                                                <a href="{{route('cart')}}">View Cart</a>
                                                            </div>
                                                            <ul class="shopping-list">
                                                                {{-- {{Helper::getAllProductFromCart()}} --}}
                                                                    @foreach(Helper::getAllProductFromCart() as $data)
                                                                            @php
                                                                                $photo=explode(',',$data->product['photo']);
                                                                            @endphp
                                                                            <li>
                                                                                <a href="{{route('cart-delete',$data->id)}}" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                                                                                <a class="cart-img" href="#"><img src="{{$photo[0]}}" alt="{{$photo[0]}}"></a>
                                                                                <h4><a href="{{route('product-detail',$data->product['slug'])}}" target="_blank">{{$data->product['title']}}</a></h4>
                                                                                <p class="quantity">{{$data->quantity}} x - <span class="amount">₱{{number_format($data->price,2)}}</span></p>
                                                                            </li>
                                                                    @endforeach
                                                            </ul>
                                                            <div class="bottom">
                                                                <div class="total">
                                                                    <span>Total</span>
                                                                    <span class="total-amount">₱{{number_format(Helper::totalCartPrice(),2)}}</span>
                                                                </div>
                                                                <a href="{{route('checkout')}}" class="btn animate">Checkout</a>
                                                            </div>
                                                        </div>
                                                    @endauth
                                                <!--/ End Shopping Item -->
                                            </li>
                                            @auth
                                                <li>
                                                    <a href="{{route('user.logout')}}">Logout</a>
                                                </li>
                                            @else
                                                <li>
                                                    <a href="{{route('login.form')}}">Login</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('register.form')}}">Register</a>
                                                </li>
                                            @endauth
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                            <!--/ End Main Menu -->	
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
</header>