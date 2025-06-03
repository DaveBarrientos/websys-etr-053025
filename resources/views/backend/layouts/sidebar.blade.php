<ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" 
id="accordionSidebar"> 
 
    <!-- Sidebar - Brand --> 
    <a class="sidebar-brand d-flex align-items-center justify-content-center" 
href="{{route('admin')}}"> 
      <div class="sidebar-brand-icon rotate-n-15"> 
        <i class="fas fa-book-open"></i> 
      </div> 
      <div class="sidebar-brand-text mx-3">NBS ADMIN</div> 
    </a> 
 
    <!-- Divider --> 
    <hr class="sidebar-divider my-0"> 
 
    <!-- Nav Item - Dashboard --> 
    <li class="nav-item active"> 
      <a class="nav-link" href="{{route('admin')}}"> 
        <i class="fas fa-chart-line"></i> 
        <span>Dashboard</span></a> 
    </li> 
 
    <!-- Divider --> 
    <hr class="sidebar-divider"> 
 
    <!-- Heading --> 
    <div class="sidebar-heading"> 
        NBS Management 
    </div> 
 
    <!-- Categories --> 
    <li class="nav-item"> 
        <a class="nav-link collapsed" href="#" data-toggle="collapse" 
data-target="#categoryCollapse" aria-expanded="true" aria-controls="categoryCollapse"> 
          <i class="fas fa-bookmark"></i> 
          <span>Category</span> 
        </a> 
        <div id="categoryCollapse" class="collapse" aria-labelledby="headingTwo" 
data-parent="#accordionSidebar"> 
          <div class="bg-white py-2 collapse-inner rounded"> 
            <h6 class="collapse-header">Genre Options:</h6> 
            <a class="collapse-item" href="{{route('category.index')}}">Category</a> 
            <a class="collapse-item" href="{{route('category.create')}}">Add Category</a> 
          </div> 
        </div> 
    </li> 
 
   
    <li class="nav-item"> 
        <a class="nav-link collapsed" href="#" data-toggle="collapse" 
data-target="#productCollapse" aria-expanded="true" aria-controls="productCollapse"> 
          <i class="fas fa-books"></i> 
          <span>Products</span> 
        </a> 
        <div id="productCollapse" class="collapse" aria-labelledby="headingTwo" 
data-parent="#accordionSidebar"> 
          <div class="bg-white py-2 collapse-inner rounded"> 
            <h6 class="collapse-header">Book Options:</h6> 
            <a class="collapse-item" href="{{route('product.index')}}">All Products</a> 
            <a class="collapse-item" href="{{route('product.create')}}">Add New Product</a> 
          </div> 
        </div> 
    </li> 
 
    <!-- Shipping --> 
    <li class="nav-item"> 
        <a class="nav-link collapsed" href="#" data-toggle="collapse" 
data-target="#shippingCollapse" aria-expanded="true" aria-controls="shippingCollapse"> 
          <i class="fas fa-shipping-fast"></i> 
          <span>Delivery</span> 
        </a> 
        <div id="shippingCollapse" class="collapse" aria-labelledby="headingTwo" 
data-parent="#accordionSidebar"> 
          <div class="bg-white py-2 collapse-inner rounded"> 
            <h6 class="collapse-header">Delivery Options:</h6> 
            <a class="collapse-item" href="{{route('shipping.index')}}">Delivery Methods</a> 
            <a class="collapse-item" href="{{route('shipping.create')}}">Add Delivery</a> 
          </div> 
        </div> 
    </li> 
 
    <!-- Orders --> 
    <li class="nav-item"> 
        <a class="nav-link" href="{{route('order.index')}}"> 
            <i class="fas fa-receipt"></i> 
            <span>Orders</span> 
        </a> 
    </li> 
 
    <!-- Reviews --> 
    <li class="nav-item"> 
        <a class="nav-link" href="{{route('review.index')}}"> 
            <i class="fas fa-star"></i> 
            <span>Reviews</span></a> 
    </li> 
 
    <!-- Divider --> 
    <hr class="sidebar-divider d-none d-md-block"> 
 
    <!-- Heading --> 
    <div class="sidebar-heading"> 
        Store Settings 
    </div> 
 
    <!-- Coupons --> 
    <li class="nav-item"> 
      <a class="nav-link" href="{{route('coupon.index')}}"> 
          <i class="fas fa-tags"></i> 
          <span>Discount Codes</span></a> 
    </li> 
 
    <!-- Users --> 
    <li class="nav-item"> 
        <a class="nav-link" href="{{route('users.index')}}"> 
            <i class="fas fa-users"></i> 
            <span>Customers</span></a> 
    </li> 
 
    <!-- Sidebar Toggler (Sidebar) --> 
    <div class="text-center d-none d-md-inline"> 
      <button class="rounded-circle border-0" id="sidebarToggle"></button> 
    </div> 
 
</ul>