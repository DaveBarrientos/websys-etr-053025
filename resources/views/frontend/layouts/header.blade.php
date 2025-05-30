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
    /* Base styling for the shopping bar container */
    .sinlge-bar.shopping {
        position: relative;
        display: inline-block;
    }
    
    /* Wishlist and Cart dropdowns - hidden by default */
    .wishlist-dropdown, .cart-dropdown {
        position: absolute;
        top: 100%;
        right: 0;
        left: auto;
        width: 350px;
        padding: 15px;
        background: #fff;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        z-index: 1000;
        opacity: 0;
        visibility: hidden;
        transform: translateY(-10px);
        transition: all 0.3s ease;
    }
    
    /* Show dropdowns on hover */
    .sinlge-bar.shopping:hover .wishlist-dropdown,
    .sinlge-bar.shopping:hover .cart-dropdown {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }
    
    /* Keep dropdown visible when hovering over the dropdown itself */
    .wishlist-dropdown:hover,
    .cart-dropdown:hover {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }
    
    /* Dropdown header */
    .dropdown-cart-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
        padding-bottom: 10px;
        border-bottom: 1px solid #eee;
    }
    
    .dropdown-cart-header span {
        font-weight: bold;
        color: #333;
    }
    
    .dropdown-cart-header a {
        color: #007bff;
        text-decoration: none;
        font-size: 12px;
    }
    
    .dropdown-cart-header a:hover {
        text-decoration: underline;
    }
    
    /* Scrollable items container */
    .dropdown-cart-items {
        max-height: 300px;
        overflow-y: auto;
        margin: 10px 0;
    }
    
    /* Custom scrollbar */
    .dropdown-cart-items::-webkit-scrollbar {
        width: 6px;
    }
    
    .dropdown-cart-items::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 3px;
    }
    
    .dropdown-cart-items::-webkit-scrollbar-thumb {
        background: #c1c1c1;
        border-radius: 3px;
    }
    
    .dropdown-cart-items::-webkit-scrollbar-thumb:hover {
        background: #a8a8a8;
    }
    
    /* Shopping list items */
    .shopping-list {
        list-style: none;
        margin: 0;
        padding: 0;
    }
    
    .shopping-list li {
        display: flex;
        align-items: center;
        padding: 10px 0;
        border-bottom: 1px solid #eee;
        position: relative;
    }
    
    .shopping-list li:last-child {
        border-bottom: none;
    }
    
    /* Remove button */
    .remove {
        color: #ff0000;
        margin-right: 10px;
        text-decoration: none;
        font-size: 16px;
        transition: color 0.2s ease;
    }
    
    .remove:hover {
        color: #cc0000;
    }
    
    /* Product image */
    .cart-img {
        margin-right: 15px;
        text-decoration: none;
    }
    
    .cart-img img {
        border-radius: 4px;
        transition: transform 0.2s ease;
    }
    
    .cart-img:hover img {
        transform: scale(1.05);
    }
    
    /* Product details */
    .cart-item-details {
        flex: 1;
        min-width: 0; /* Prevents flex item from overflowing */
    }
    
    .cart-item-details h4 {
        margin: 0 0 5px 0;
        font-size: 14px;
        line-height: 1.3;
    }
    
    .cart-item-details h4 a {
        color: #333;
        text-decoration: none;
        transition: color 0.2s ease;
    }
    
    .cart-item-details h4 a:hover {
        color: #007bff;
    }
    
    .cart-item-details p {
        margin: 3px 0;
        font-size: 13px;
        line-height: 1.2;
    }
    
    .quantity {
        color: #666;
    }
    
    .amount, .total span {
        font-weight: bold;
        color: #333;
    }
    
    /* Bottom section with total and action button */
    .bottom {
        margin-top: 15px;
        padding-top: 15px;
        border-top: 1px solid #eee;
    }
    
    .total {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
        font-weight: bold;
        font-size: 16px;
    }
    
    .total-amount {
        color: #007bff;
        font-size: 18px;
    }
    
    /* Action buttons */
    .btn.animate {
        display: inline-block;
        width: 100%;
        padding: 10px 15px;
        background: #007bff;
        color: white;
        text-decoration: none;
        text-align: center;
        border-radius: 4px;
        transition: all 0.3s ease;
        font-weight: bold;
    }
    
    .btn.animate:hover {
        background: #0056b3;
        transform: translateY(-1px);
        box-shadow: 0 2px 5px rgba(0,123,255,0.3);
    }
    
    /* Icon styling */
    .single-icon {
        position: relative;
        text-decoration: none;
        color: inherit;
        padding: 10px;
        display: inline-block;
        transition: color 0.2s ease;
    }
    
    .single-icon:hover {
        color: #007bff;
    }
    
    /* Count badge */
    .total-count {
        position: absolute;
        top: 0;
        right: 0;
        background:rgb(252, 85, 85);
        color: white;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        font-size: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
    }
    
    /* Empty state */
    .shopping-list:empty::before {
        content: "No items in your list";
        color: #999;
        font-style: italic;
        text-align: center;
        display: block;
        padding: 20px;
    }
</style>