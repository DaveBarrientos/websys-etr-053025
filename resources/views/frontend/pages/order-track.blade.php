@extends('frontend.layouts.master')

@section('title','Ecommerce Laravel || Order Track Page')

@section('main-content')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{route('home')}}">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0);">Order Track</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
<section class="tracking_box_area section_gap py-5">
    <div class="container">
        <div class="tracking_box_inner">
            <p>To track your order please enter your Order ID in the box below and click the "Track" button. This was given
                to you on your receipt and in the confirmation email you should have received or you can get your order id from your user dashboard.</p>
            <form class="row tracking_form my-4" id="orderTrackForm" action="{{route('product.track.order')}}" method="post" novalidate="novalidate">
              @csrf
                <div class="col-md-8 form-group">
                    <input type="text" class="form-control p-2" name="order_number" placeholder="Enter your order number" required>
                </div>
                <div class="col-md-8 form-group">
                    <button type="submit" value="submit" class="btn submit_btn">Track Order</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle form submission
    $('#orderTrackForm').on('submit', function(e) {
        e.preventDefault();
        
        // Show loading indicator
        Swal.fire({
            title: 'Tracking Order',
            html: 'Please wait while we find your order...',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                Swal.fire({
                    icon: response.status,
                    title: response.title,
                    text: response.message,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed && response.redirect) {
                        window.location.href = response.redirect;
                    }
                });
            },
            error: function(xhr) {
                let response = xhr.responseJSON;
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: response?.message || 'Something went wrong! Please try again.',
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'OK'
                });
            }
        });
    });

    // Display any flash messages as SweetAlerts
    
});
</script>
@endpush