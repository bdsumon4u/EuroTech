@extends('layouts.yellow.master')

@push('styles')
    <link rel="stylesheet" href="{{ asset('strokya/vendor/xzoom/xzoom.css') }}">
    <link rel="stylesheet" href="{{ asset('strokya/vendor/xZoom-master/example/css/demo.css') }}">
    <link rel="stylesheet" href="{{ asset('strokya/css/sagartex.css') }}">
    <style>
        #accordion .card-link {
            display: block;
            font-size: 20px;
            padding: 18px 48px;
            border-bottom: 2px solid transparent;
            color: inherit;
            font-weight: 500;
            border-radius: 3px 3px 0 0;
            transition: all .15s;
        }
        #accordion .card-link:not(.collapsed) {
            border-bottom: 2px solid #000;
            color: #000;
        }
        @media (min-width: 767px) {
            .product__name {
                font-size: 28px;
            }
        }

        @media (max-width: 768px) {
            .product__option-label {
                display: block;
                text-align: center;
            }
            .product__actions {
                justify-content: center;
            }
            .product__actions-item {
                width: 100%;
            }
        }
        .product__content {
            grid-template-columns: [gallery] calc(40% - 30px) [info] calc(64% - 35px);
            grid-column-gap: 10px;
        }

        img {
            max-width: 100%;
            /*height: auto;*/
        }
    </style>
@endpush

@section('title', $product->name)

@section('content')

    @include('partials.page-header', [
        'paths' => [
            url('/')                => 'Home',
            route('products.index') => 'Products',
        ],
        'active' => $product->name,
    ])

    <div class="block">
        <div class="container pb-3" style="background: #eeffff;">
            <div class="product product--layout--standard" data-layout="standard">
                <div class="product__content" data-id="{{ $product->id }}" data-max="{{ $product->should_track ? $product->stock_count : -1 }}">
                    <div class="xzoom-container">
                        <img class="xzoom" id="xzoom-default" src="{{ asset($product->base_image->src) }}" xoriginal="{{ asset($product->base_image->src) }}" />
                        <div class="xzoom-thumbs d-flex mt-2">
                            <a href="{{ asset($product->base_image->src) }}"><img class="xzoom-gallery" width="80" src="{{ asset($product->base_image->src) }}"  xpreview="{{ asset($product->base_image->src) }}"></a>
                            @foreach($product->additional_images as $image)
                                <a href="{{ asset($image->src) }}">
                                    <img class="xzoom-gallery" width="80" src="{{ asset($image->src) }}">
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <!-- .product__info -->
                    <div class="product__info">
                        <h1 class="product__name">{{ $product->name }}</h1>
                        <div class="w-100 mb-2 border-top pt-2">Model: <strong>{{ $product->sku }}</strong></div>

                        <div class="product__footer mt-0">
                            <div class="product__tags tags">
                                @if($product->brand)
                                    <p class="text-secondary mb-2">
                                        Brand: <a href="{{ route('brands.products', $product->brand) }}" class="text-primary badge badge-light"><big>{{ $product->brand->name }}</big></a>
                                    </p>
                                @endif
                                <div class="">
                                    <p class="text-secondary mb-2 d-inline-block mr-2">Categories:</p>
                                    @foreach($product->categories as $category)
                                        <a href="{{ route('categories.products', $category) }}" class="badge badge-primary">{{ $category->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        @if($product->price)
                        <div class="product__prices {{$product->selling_price == $product->price ? '' : 'has-special'}}">
                            Price:
                            @if($product->selling_price == $product->price)
                                {!!  theMoney($product->price)  !!}
                            @else
                                <span class="product-card__new-price">{!!  theMoney($product->selling_price)  !!}</span>
                                <span class="product-card__old-price">{!!  theMoney($product->price)  !!}</span>
                            @endif
                        </div>
                        @else
                        <span class="contact-price">Contact for Price</span>
                        @endif
                        <ul class="product__meta">
                            <li class="product__meta-availability w-100 mb-2">
                                <big>
                                    Availability:
                                    @if(! $product->should_track)
                                        <span class="text-success">In Stock</span>
                                    @else
                                        <span class="text-{{ $product->stock_count ? 'success' : 'danger' }}">{{ $product->stock_count }} In Stock</span>
                                    @endif
                                </big>
                            </li>
                        </ul>
                        <!-- .product__sidebar -->
                        <div class="product__sidebar">
                            <!-- .product__options -->
                            <form class="product__options">
                                @if($product->price)
                                <div class="form-group product__option">
                                    {{-- <label class="product__option-label" for="product-quantity">Quantity</label> --}}
                                    <div class="product__actions-item">
                                        <div class="input-number product__quantity">
                                            <input id="product-quantity"
                                                    class="input-number__input form-control form-control-lg"
                                                    type="number" min="1" {{ $product->should_track ? 'max='.$product->stock_count : '' }} value="1">
                                            <div class="input-number__add"></div>
                                            <div class="input-number__sub"></div>
                                        </div>
                                    </div>
                                    <div class="product__actions overflow-hidden">
                                        @exp($available = !$product->should_track || $product->stock_count > 0)
                                        <div class="product__buttons w-100 d-flex">
                                            <div class="w-100 product__actions-item product__actions-item--ordernow">
                                                <button class="btn btn-primary product__ordernow btn-lg btn-block" {{ $available ? '' : 'disabled' }}>অর্ডার করুন</button>
                                            </div>
                                            <div class="w-100 product__actions-item product__actions-item--addtocart">
                                                <button class="btn btn-primary product__addtocart btn-lg btn-block" {{ $available ? '' : 'disabled' }}>কার্টে যোগ করুন</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="call-for-order">
                                    {{-- <img src="{{ asset('call-now-icon-20.jpg') }}" width="135" alt="Call For Order">
                                    <div style="padding: 10px;margin-bottom: 10px;font-weight: bold;color: red;">
                                        {!! implode('<br>', explode(' ', setting('call_for_order'))) !!}
                                    </div> --}}
                                    @foreach (explode(' ', setting('call_for_order')) as $phone)
                                        <a href="tel:{{$phone}}" class="btn ptn-primary text-dark w-100 mb-1" style="background: #dedede; height: auto; border-color: #dedede;">
                                            <div>কল করতে ক্লিক করুন</div>
                                            <div>
                                                <i class="fa fas fa-phone mr-2"></i>
                                                <span>{{$phone}}</span>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </form><!-- .product__options / end -->
                        </div><!-- .product__end -->
                    </div><!-- .product__info / end -->
                </div>
            </div>
            <div id="accordion" class="mt-3">
                <div class="card">
                    <div class="card-header p-0">
                        <a class="card-link px-4" datatoggle="collapse" href="javascript:void(false)">
                            Product Description
                        </a>
                    </div>
                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                        <div class="card-body p-4">
                            {!! $product->description !!}
                        </div>
                    </div>
                </div>
                @if(false)
                <div class="card">
                    <div class="card-header p-0">
                        <a class="card-link px-4" datatoggle="collapse" href="javascript:void(false)">
                            Delivery and Payment
                        </a>
                    </div>
                    <div id="collapseTwo" class="collapse show" data-parent="#accordion">
                        <div class="card-body p-4">
                            {!! setting('delivery_text') !!}
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    <!-- .block-products-carousel -->
    @include('partials.products.pure-grid', [
        'title' => 'Related Products',
        'cols' => $related_products->cols,
        'rows' => $related_products->rows,
    ])
    <!-- .block-products-carousel / end -->
@endsection

@push('scripts')
    <script src="{{ asset('strokya/vendor/xzoom/xzoom.min.js') }}"></script>
    <script src="{{ asset('strokya/vendor/xZoom-master/example/js/vendor/modernizr.js') }}"></script>
    <script src="{{ asset('strokya/vendor/xZoom-master/example/js/setup.js') }}"></script>
    <script>
        $(document).ready(function () {

        });
    </script>
@endpush
