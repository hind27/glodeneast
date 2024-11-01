@extends('layout')
@section('page-title', __('Dashboard'))
@section('content')

    <div class="container-fluid p-5 ">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a class="text-primary"  href="{{ route('home',['locale' => app()->getLocale() ?? config('app.locale', 'ar')]) }}">{{ __('Home') }} /</a></li>
              <li class="breadcrumb-item"><a class="text-primary"  href="{{ route('product', ['locale' => app()->getLocale() ?? config('app.locale', 'ar')]) }}"> {{ __('Products') }}</a></li>
              <li class="breadcrumb-item active" aria-current="page">  {{ app()->getLocale() == 'en' ? $product->name : $product->name_ar }}</li>
            </ol>
          </nav>
        <div class="col-md-12 col-sm-12">
            <div class=" row">
                <div class="col-md-6">
                    <div class="pro-img-details">
                        @php
                            $firstImage = $product->images->first();
                        @endphp
                        <img src="{{ asset($firstImage->image_path) }}"
                            alt="{{ app()->getLocale() == 'en' ? $product->name : $product->name_ar }}"
                            class="img-fluid rounded text-primary">
                    </div>
                    <div class="pro-img-list">
                        @foreach ($product->images as $image)
                            <a href="#">
                                <img src="{{ asset($image->image_path) }}" class="img-thumbnail" alt=""
                                    style="width: 100px; height:100px;">
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-6 ">


                    <form action="{{ route('cart.add', ['locale' => app()->getLocale() ?? config('app.locale', 'ar')]) }}"
                        method="POST">
                        @csrf
                        <!-- Hidden field to send product ID -->
                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                        <h3 class="py-2">
                            <a href="#" class="text-decoration-none text-primary">
                                {{ app()->getLocale() == 'en' ? $product->name : $product->name_ar }}
                            </a>
                        </h3>
                        <p>{{ app()->getLocale() == 'en' ? $product->des : $product->des_ar }}</p>
                        <div class="product_meta">
                            <span class="posted_in">
                                <strong>{{ __('Categories') }} :</strong>
                                <a rel="tag" href="#" class="text-decoration-none text-primary">
                                    {{ app()->getLocale() === 'ar' ? $product->category->title_ar : $product->category->title }}
                                </a>
                            </span>
                        </div>

                        <!-- Size selection dropdown -->
                        <div class="form-group row">
                            <label for="size" class="col-sm-2 col-form-label fw-bolder">{{ __('Size') }}</label>
                            <div class="">
                                <select class="form-control" id="size" name="size" required>
                                    <option value="" disabled selected>{{ __('Select Size') }}</option>
                                    @foreach ($product->productSizes as $size)
                                        <option value="{{ $size->size_id }}">{{ $size->size->size_liter }}
                                            {{ __('Liters') }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- <div class="form-group row align-items-center">
                            <label class="col-sm-3 col-form-label fw-bolder">{{ __('Price') }} :</label>
                            <span class="col-sm-9 juspro-price"> {{ $product->price }} {{ __('EGP') }}</span>
                        </div> --}}

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label fw-bolder">{{ __('Quantity') }}</label>
                            <div class="col-sm-10 qty-input">
                                <button class="qty-count qty-count--minus" data-action="minus" type="button">-</button>
                                <input class="product-qty" type="number" name="product_qty" min="0" max="10"
                                    value="1">
                                <button class="qty-count qty-count--add" data-action="add" type="button">+</button>
                            </div>
                        </div>

                        <p>
                            <button class="btn btn-round btn-primary m-2" type="submit">
                                @if (app()->getLocale() == 'en')
                                    <i class="fa fa-shopping-cart"></i> {{ __('Add to cart') }}
                                @else
                                    {{ __('Add to cart') }} <i class="fa fa-shopping-cart"></i>
                                @endif
                            </button>
                        </p>
                    </form>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        {{ __('Give Feedback') }}
                    </button>

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-center" id="exampleModalLabel">
                                        {{ __('Write Your Feedback') }}</h5>
                                </div>

                                <form
                                    action="{{ route('feedback.store', ['locale' => app()->getLocale() ?? config('app.locale', 'ar')]) }}"
                                    method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="container">
                                            <h4>{{ app()->getLocale() == 'en' ? $product->name : $product->name_ar }}</h4>

                                            @if (session('success'))
                                                <div class="alert alert-success">{{ session('success') }}</div>
                                            @endif

                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                            <input type="hidden" id="score" name="score">

                                            <div class="mb-3">
                                                <label for="comment" class="form-label">{{ __('Your Comment') }}</label>
                                                <textarea class="form-control" id="comment" name="comment" rows="4"></textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label for="score" class="form-label">{{ __('Score') }}</label>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="stars">
                                                            <input class="star star-5" id="star-5" type="radio"
                                                                name="star" value="5" />
                                                            <label class="star star-5" for="star-5"></label>

                                                            <input class="star star-4" id="star-4" type="radio"
                                                                name="star" value="4" />
                                                            <label class="star star-4" for="star-4"></label>

                                                            <input class="star star-3" id="star-3" type="radio"
                                                                name="star" value="3" />
                                                            <label class="star star-3" for="star-3"></label>

                                                            <input class="star star-2" id="star-2" type="radio"
                                                                name="star" value="2" />
                                                            <label class="star star-2" for="star-2"></label>

                                                            <input class="star star-1" id="star-1" type="radio"
                                                                name="star" value="1" />
                                                            <label class="star star-1" for="star-1"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div
                                        class="modal-footer {{ app()->getLocale() == 'en' ? 'text-end float-end' : 'text-start float-start' }}">
                                        <button type="submit"
                                            class="btn btn-primary">{{ __('Submit Feedback') }}</button>
                                        <button type="button" class="btn btn-danger"
                                            data-bs-dismiss="modal">{{ __('Close') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>





                </div>




            </div>

        </div>
        <div class="row">
            <ul class="nav nav-tabs nav-justified mb-3" id="ex1" role="tablist">
                <li class="nav-item" role="presentation">
                    <a data-mdb-tab-init class="nav-link active" id="ex3-tab-1" href="#ex3-tabs-1" role="tab"
                        aria-controls="ex3-tabs-1" aria-selected="true">{{ __('Product Description') }}</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a data-mdb-tab-init class="nav-link" id="ex3-tab-2" href="#ex3-tabs-2" role="tab"
                        aria-controls="ex3-tabs-2" aria-selected="false">{{ __('Product Feedback') }}</a>
                </li>

            </ul>
            <!-- Tabs navs -->

            <!-- Tabs content -->
            <div class="tab-content" id="ex2-content">
                <div class="tab-pane fade show active" id="ex3-tabs-1" role="tabpanel" aria-labelledby="ex3-tab-1">
                    Tab 1 content
                </div>
                <div class="tab-pane fade" id="ex3-tabs-2" role="tabpanel" aria-labelledby="ex3-tab-2">
                    Tab 2 content
                </div>

            </div>
            <!-- Tabs content -->

        </div>
    </div>
    </div>
@endsection
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mainImage = document.querySelector('.pro-img-details img');
            const thumbnails = document.querySelectorAll('.pro-img-list a img');

            thumbnails.forEach(thumbnail => {
                thumbnail.addEventListener('click', (e) => {
                    e.preventDefault();
                    mainImage.src = thumbnail.src;
                });
            });
            var QtyInput = (function() {
                var $qtyInputs = $(".qty-input");

                if (!$qtyInputs.length) {
                    return;
                }

                var $inputs = $qtyInputs.find(".product-qty");
                var $countBtn = $qtyInputs.find(".qty-count");
                var qtyMin = parseInt($inputs.attr("min"));
                var qtyMax = parseInt($inputs.attr("max"));

                $inputs.change(function() {
                    var $this = $(this);
                    var $minusBtn = $this.siblings(".qty-count--minus");
                    var $addBtn = $this.siblings(".qty-count--add");
                    var qty = parseInt($this.val());

                    if (isNaN(qty) || qty <= qtyMin) {
                        $this.val(qtyMin);
                        $minusBtn.attr("disabled", true);
                    } else {
                        $minusBtn.attr("disabled", false);

                        if (qty >= qtyMax) {
                            $this.val(qtyMax);
                            $addBtn.attr('disabled', true);
                        } else {
                            $this.val(qty);
                            $addBtn.attr('disabled', false);
                        }
                    }
                });

                $countBtn.click(function() {
                    var operator = this.dataset.action;
                    var $this = $(this);
                    var $input = $this.siblings(".product-qty");
                    var qty = parseInt($input.val());

                    if (operator == "add") {
                        qty += 1;
                        if (qty >= qtyMin + 1) {
                            $this.siblings(".qty-count--minus").attr("disabled", false);
                        }

                        if (qty >= qtyMax) {
                            $this.attr("disabled", true);
                        }
                    } else {
                        qty = qty <= qtyMin ? qtyMin : (qty -= 1);

                        if (qty == qtyMin) {
                            $this.attr("disabled", true);
                        }

                        if (qty < qtyMax) {
                            $this.siblings(".qty-count--add").attr("disabled", false);
                        }
                    }

                    $input.val(qty);
                });
            })();



            document.querySelectorAll('input[name="star"]').forEach((star) => {
                star.addEventListener('change', function() {
                    document.getElementById('score').value = this.value; // Set hidden input value
                });
            });

        });
    </script>
@endpush
@push('styles')
    <style>
        .qty-input {
            color: #000;
            background: #fff;
            display: flex;
            align-items: center;
            overflow: hidden;
        }



        .qty-input .product-qty,
        .qty-input .qty-count {
            background: transparent;
            color: inherit;
            font-weight: bold;
            font-size: inherit;
            border: none;
            display: inline-block;
            min-width: 0;
            height: 2.5rem;
            text-align: center;
        }

        .qty-input .qty-count {
            padding: 0;
            cursor: pointer;
            width: 2.5rem;
            font-size: 1.25em;
            position: relative;
        }

        .qty-count--minus {
            border-right: 1px solid #e2e2e2;
        }

        .qty-count--add {
            border-left: 1px solid #e2e2e2;
        }

        .qty-count:before,
        .qty-count:after {
            content: "";
            height: 2px;
            width: 10px;
            background: #000;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
        }

        .qty-count--add:after {
            transform: rotate(90deg);
        }

        .qty-input .product-qty::-webkit-outer-spin-button,
        .qty-input .product-qty::-webkit-inner-spin-button {
            appearance: none;
            margin: 0;
        }

        /* Product List */
        .prod-cat li a {
            border-bottom: 1px dashed #d9d9d9;
            color: #3b3b3b;
        }

        .pro-title {
            color: #5A5A5A;
            font-size: 16px;
            margin-top: 20px;
        }

        .pro-img-details img {
            width: 100%;
        }

        .pro-d-title {
            font-size: 16px;
            margin-top: 0;
        }

        .product_meta {
            border-top: 1px solid #eee;
            border-bottom: 1px solid #eee;
            padding: 10px 0;
            margin: 15px 0;
        }

        .pro-price,
        .amount-old {
            font-size: 18px;
            padding: 0 10px;
        }

        .amount-old {
            text-decoration: line-through;
        }

        .pro-img-list {
            margin: 10px 0 0 -15px;
            display: inline-block;
        }

        .pro-img-list a {
            margin-right: 10px;
            margin-bottom: 10px;
        }

        div.stars {

            width: 270px;

            display: inline-block;

        }

        .mt-200 {
            margin-top: 200px;
        }

        .stars {
            width: 270px;
            /* Adjust width if necessary */
            display: inline-block;
        }

        input.star {
            display: none;
            /* Hide radio inputs */
        }

        label.star {
            float: right;
            /* Align stars to the right */
            padding: 10px;
            /* Space around the stars */
            font-size: 36px;
            /* Size of the stars */
            color: #4A148C;
            /* Default star color */
            transition: all .2s;
            /* Smooth transition */
        }

        input.star:checked~label.star:before {
            content: '\f005';
            /* FontAwesome checked star */
            color: #FD4;
            /* Color of the checked star */
            transition: all .25s;
            /* Transition for checked star */
        }

        input.star-5:checked~label.star:before {
            color: #FE7;
            /* Special color for the highest star */
            text-shadow: 0 0 20px #952;
            /* Glow effect */
        }

        input.star-1:checked~label.star:before {
            color: #F62;
            /* Color for the lowest star */
        }

        label.star:hover {
            transform: rotate(-15deg) scale(1.3);
            /* Effect on hover */
        }

        label.star:before {
            content: '\f006';
            /* FontAwesome empty star */
            font-family: FontAwesome;
            /* Use FontAwesome for star icons */
        }
    </style>
@endpush
