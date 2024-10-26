@extends('layout')
@section('page-title', __('Dashboard'))
@section('content')
<div class="container py-3">
    <h3>Shopping Cart</h3>
    <div class="row">
      <div class="col-12 col-sm-12 col-md-12 col-lg-8">
        <!-- single cart item  -->
        <hr />
        <div class="cart-item py-2">
          <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
              <div class="d-flex justify-content-between mb-3">
                <img
                  class="cart-image d-block"
                  src="https://images.pexels.com/photos/8532616/pexels-photo-8532616.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                  alt=""
                />
                <div class="mx-3">
                  <h5>Basic Tee</h5>
                  <p>Lorem ipsum, dolor sit</p>
                  <h5>Rs. 800</h5>
                  <small
                    class="text-white bg-success px-2 py-1 d-inline-block rounded-3 mt-2"
                    >In Stock</small
                  >
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
              <div class="d-flex justify-content-between">
                <div>
                  <select class="form-select">
                    <option selected>1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                </div>
                <div>
                  <button
                    type="button"
                    class="btn-close"
                    aria-label="Close"
                  ></button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- ./ single cart item end  -->
        <!-- single cart item  -->
        <hr />
        <div class="cart-item py-2">
          <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
              <div class="d-flex justify-content-between mb-3">
                <img
                  class="cart-image d-block"
                  src="https://images.pexels.com/photos/8532616/pexels-photo-8532616.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                  alt=""
                />
                <div class="mx-3">
                  <h5>Basic Tee</h5>
                  <p>Lorem ipsum, dolor sit</p>
                  <h5>Rs. 800</h5>
                  <small
                    class="text-white bg-success px-2 py-1 d-inline-block rounded-3 mt-2"
                    >In Stock</small
                  >
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
              <div class="d-flex justify-content-between">
                <div>
                  <select class="form-select">
                    <option selected>1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                </div>
                <div>
                  <button
                    type="button"
                    class="btn-close"
                    aria-label="Close"
                  ></button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr />
        <!-- ./ single cart item end  -->
      </div>
      <div class="col-12 col-sm-12 col-md-8 col-lg-4 z-n1">
        <div class="bg-light rounded-3 p-4 sticky-top">
          <h6 class="mb-4">Order Summary</h6>
          <div class="d-flex justify-content-between align-items-center">
            <div>Subtotal</div>
            <div><strong>Rs. 5000</strong></div>
          </div>
          <hr />
          <div class="d-flex justify-content-between align-items-center">
            <div>Delivery Charge</div>
            <div><strong>Rs. 100</strong></div>
          </div>
          <hr />
          <div class="d-flex justify-content-between align-items-center">
            <div>Total</div>
            <div><strong>Rs.5100</strong></div>
          </div>
          <button class="btn btn-primary w-100 mt-4">Checkout</button>
        </div>
      </div>
    </div>
  </div>


@endsection
@push('styles')
<style>

.product-listing {
    transition: all 0.3s linear;
}
.product-listing:hover {
    box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.3);
}
.product-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
}
.cart-image {
    width: 200px;
    height: 200px;
    object-fit: cover;
    border-radius: 5px;
}
.brand-img{
    width: 100%;
    height: 100px;
    object-fit: cover;
}

.footer-title{
    position: relative;
    padding-bottom: 10px;
    margin-bottom: 15px;
}
.footer-title::after{
    z-index: 999;
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    background-color: #0d6efd;
    width: 15%;
    height: 2px;
}
.footer-app{
    width: 150px;
    object-fit: contain;
}

@media screen and (max-width: 789px) {
    .cart-image {
        width: 120px;
        height: 120px;
    }
}

</style>
@endpush
