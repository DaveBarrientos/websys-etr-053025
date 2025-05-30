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
                            @auth 
                                @if(Auth::user()->role=='admin')
                                    <li><i class="fa fa-truck"></i> <a href="{{route('order.track')}}">Track Order</a></li>
                                    <li><i class="ti-user"></i> <a href="{{route('admin')}}" target="_blank">Dashboard</a></li>
                                @else 
                                    <li><i class="fa fa-truck"></i> <a href="{{route('order.track')}}">Track Order</a></li>
                                    <li><i class="ti-user"></i> <a href="{{route('user')}}" target="_blank">Dashboard</a></li>
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
                                                    <!-- Wishlist -->
                                                    <a href="{{route('wishlist')}}" class="single-icon"><i class="fa fa-heart-o"></i> <span class="total-count">{{Helper::wishlistCount()}}</span></a>
                                                    <!-- Wishlist Dropdown -->
                                                    @auth
                                                        <div class="shopping-item wishlist-dropdown"> 
                                                            <div class="dropdown-cart-header">
                                                                <span>{{count(Helper::getAllProductFromWishlist())}} Items</span>
                                                                <a href="{{route('wishlist')}}">View Wishlist</a>
                                                            </div>
                                                            <div class="dropdown-cart-items" style="max-height: 300px; overflow-y: auto;">
                                                                <ul class="shopping-list">
                                                                    @foreach(Helper::getAllProductFromWishlist() as $data)
                                                                        @php
                                                                            $photo=explode(',',$data->product['photo']);
                                                                        @endphp
                                                                        <li>
                                                                            <a href="{{route('wishlist-delete',$data->id)}}" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                                                                            <a class="cart-img" href="{{route('product-detail',$data->product['slug'])}}">
                                                                                <img src="{{$photo[0]}}" alt="{{$photo[0]}}" style="width: 70px; height: 70px; object-fit: cover;">
                                                                            </a>
                                                                            <div class="cart-item-details">
                                                                                <h4><a href="{{route('product-detail',$data->product['slug'])}}">{{$data->product['title']}}</a></h4>
                                                                                <p class="quantity">{{$data->quantity}} x <span class="amount">₱{{number_format($data->price,2)}}</span></p>
                                                                                <p class="total">Total: <span>₱{{number_format($data->quantity * $data->price,2)}}</span></p>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                            <div class="bottom">
                                                                <div class="total">
                                                                    <span>Grand Total</span>
                                                                    <span class="total-amount">₱{{number_format(Helper::totalWishlistPrice(),2)}}</span>
                                                                </div>
                                                                <a href="{{route('cart')}}" class="btn animate">View Cart</a>
                                                            </div>
                                                        </div>
                                                    @endauth
                                                </div>
                                            </li>
                                            <li>
                                                <div class="sinlge-bar shopping">
                                                    <!-- Shopping Cart -->
                                                    <a href="{{route('cart')}}" class="single-icon"><i class="ti-bag"></i> <span class="total-count">{{Helper::cartCount()}}</span></a>
                                                    <!-- Shopping Cart Dropdown -->
                                                    @auth
                                                        <div class="shopping-item cart-dropdown">
                                                            <div class="dropdown-cart-header">
                                                                <span>{{count(Helper::getAllProductFromCart())}} Items</span>
                                                                <a href="{{route('cart')}}">View Cart</a>
                                                            </div>
                                                            <div class="dropdown-cart-items" style="max-height: 300px; overflow-y: auto;">
                                                                <ul class="shopping-list">
                                                                    @foreach(Helper::getAllProductFromCart() as $data)
                                                                        @php
                                                                            $photo=explode(',',$data->product['photo']);
                                                                        @endphp
                                                                        <li>
                                                                            <a href="{{route('cart-delete',$data->id)}}" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                                                                            <a class="cart-img" href="{{route('product-detail',$data->product['slug'])}}">
                                                                                <img src="{{$photo[0]}}" alt="{{$photo[0]}}" style="width: 70px; height: 70px; object-fit: cover;">
                                                                            </a>
                                                                            <div class="cart-item-details">
                                                                                <h4><a href="{{route('product-detail',$data->product['slug'])}}">{{$data->product['title']}}</a></h4>
                                                                                <p class="quantity">{{$data->quantity}} x <span class="amount">₱{{number_format($data->price,2)}}</span></p>
                                                                                <p class="total">Total: <span>₱{{number_format($data->quantity * $data->price,2)}}</span></p>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                            <div class="bottom">
                                                                <div class="total">
                                                                    <span>Grand Total</span>
                                                                    <span class="total-amount">₱{{number_format(Helper::totalCartPrice(),2)}}</span>
                                                                </div>
                                                                <a href="{{route('checkout')}}" class="btn animate">Checkout</a>
                                                            </div>
                                                        </div>
                                                    @endauth
                                                </div>
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

<style>
    /* Add these styles to make the dropdowns scrollable and improve layout */
    .wishlist-dropdown, .cart-dropdown {
        width: 350px;
        padding: 15px;
        right: 0;
        left: auto;
    }
    
    .dropdown-cart-items {
        max-height: 300px;
        overflow-y: auto;
        margin: 10px 0;
    }
    
    .shopping-list li {
        display: flex;
        align-items: center;
        padding: 10px 0;
        border-bottom: 1px solid #eee;
    }
    
    .shopping-list li:last-child {
        border-bottom: none;
    }
    
    .cart-img {
        margin-right: 15px;
    }
    
    .cart-item-details {
        flex: 1;
    }
    
    .cart-item-details h4 {
        margin: 0 0 5px 0;
        font-size: 14px;
    }
    
    .cart-item-details p {
        margin: 3px 0;
        font-size: 13px;
    }
    
    .quantity {
        color: #666;
    }
    
    .amount, .total span {
        font-weight: bold;
        color: #333;
    }
    
    .remove {
        color: #ff0000;
        margin-right: 10px;
    }
    
    .bottom {
        margin-top: 15px;
        padding-top: 15px;
        border-top: 1px solid #eee;
    }
    
    .total {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
        font-weight: bold;
    }
</style>