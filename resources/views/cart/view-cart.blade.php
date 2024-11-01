@extends('layout')
@section('page-title', __('Dashboard'))
@section('content')
    <div class="container py-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a   href="{{ route('home',['locale' => app()->getLocale() ?? config('app.locale', 'ar')]) }}">{{ __('Home') }} /</a></li>
              <li class="breadcrumb-item"><a  href="{{ route('product', ['locale' => app()->getLocale() ?? config('app.locale', 'ar')]) }}"> {{ __('Products') }}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ __('Checkout') }}</li>
            </ol>
          </nav>

        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-8">
                @if ($cartItems->isEmpty())

                        <div class="cart-item py-2">

                            <div class="card-body cart">
                                <div class="col-sm-12 empty-cart-cls text-center">
                                    <img src="{{ asset('img/empty-card.png') }}" width="130" height="130"
                                        class="img-fluid mb-4 mr-3">
                                    <h3><strong>{{ __('Your Cart is Empty') }}</strong></h3>
                                    <h4>{{ __('Add something to make me happy :)') }}</h4>
                                    <a href="{{ route('product', ['locale' => app()->getLocale() ?? config('app.locale', 'ar')]) }}" class="btn btn-primary cart-btn-transform m-3"
                                        data-abc="true">{{ __('continue shopping') }}</a>


                                </div>
                            </div>
                        </div>
                    @else
                        <!-- single cart item  -->

                        @foreach ($cartItems as $cartItem)
                            <div class="cart-item py-2" data-product-id="{{ $cartItem->product->id }}"
                                data-remove-url="{{ route('cart.remove', ['locale' => app()->getLocale() ?? config('app.locale', 'ar'), 'productId' => $cartItem->product->id]) }}">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                        <div class="d-flex justify-content-between mb-3">
                                            @if ($cartItem->product->images->isNotEmpty())
                                                @foreach ($cartItem->product->images as $image)
                                                    <img src="{{ asset($image->image_path) }}"
                                                        alt="{{ $cartItem->product->name }}" class="cart-image d-block">
                                                @endforeach
                                            @endif

                                            <div class="mx-3">
                                                <h5> {{ app()->getLocale() == 'en' ? $cartItem->product->name : $cartItem->product->name_ar }}
                                                </h5>
                                                <p>{{ app()->getLocale() == 'en' ? $cartItem->product->des : $cartItem->product->des_ar }}
                                                </p>
                                                <p>
                                                    {{ __('quantity') }} : {{ $cartItem->quantity }}
                                                </p>
                                                <small
                                                    class="text-white bg-success px-2 py-1 d-inline-block rounded-3 mt-2">{{__('In Stock')}}</small>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                        <div class="d-flex justify-content-between">
                                            <div>

                                            </div>
                                            <div>
                                                <button type="button" class="btn-close" aria-label="Close"></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr />
                        @endforeach
                @endif
                <!-- ./ single cart item end  -->

            </div>
            <div class="col-12 col-sm-12 col-md-8 col-lg-4 z-n1">
                <div class="bg-light rounded-3 p-4 sticky-top">
                    <h6 class="mb-4">{{__('Order Summary')}}</h6>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>{{__('Subtotal')}}</div>
                        <div><strong>0 {{ __('EGP') }}</strong></div>
                    </div>
                    <hr />
                    <div class="d-flex justify-content-between align-items-center">
                        <div>{{__('Delivery Charge')}}</div>
                        <div><strong> 0 {{ __('EGP') }}</strong></div>
                    </div>
                    <hr />
                    <div class="d-flex justify-content-between align-items-center">
                        <div>{{__('Total')}}</div>
                        <div><strong> 0 {{ __('EGP') }}</strong></div>
                    </div>
                    <form
                        action="{{ route('cart.submit', ['locale' => app()->getLocale() ?? config('app.locale', 'ar')]) }}"
                        method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary w-100 mt-4">{{ __('Submit Order') }}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>


@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.btn-close').on('click', function() {
                // Get the closest cart item element
                var $cartItem = $(this).closest('.cart-item');
                var productId = $cartItem.data('product-id');
                var removeUrl = $cartItem.data('remove-url');
                // Fade out the item


                // Send AJAX request to remove the item from the cart
                $.ajax({
                    url: removeUrl,
                    type: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            console.log(response.success);
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Product removed successfully',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $cartItem.fadeOut(500, function() {
                                // Remove the item after fade out completes
                                $(this).remove();
                            });

                        } else {
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'Validation Error',
                                text: 'Error removing product.',
                                showConfirmButton: true
                            });
                            console.error('Error removing product');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            });
        });
    </script>
@endpush
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

        .brand-img {
            width: 100%;
            height: 100px;
            object-fit: cover;
        }

        .footer-title {
            position: relative;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        .footer-title::after {
            z-index: 999;
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            background-color: #0d6efd;
            width: 15%;
            height: 2px;
        }

        .footer-app {
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
