<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User-View</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Link to external CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ time() }}">

	 <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .item-take-center {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            background-color: #fff;
        }

        .product-details-alignment {
            display: flex;
            max-width: 900px;
            width: 100%;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .image-details {
            flex: 1;
            padding: 20px;
        }

        .product-details-image {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .details-about-product {
            flex: 2;
            padding: 20px;
        }

        .details-about-product p {
            color: #555;
        }

        .details-about-product h1 {
            font-size: 2em;
            margin: 10px 0;
            color: #333;
        }

        .details-about-product h4 {
            font-size: 1.5em;
            margin: 10px 0;
            color: #ff6f61;
        }

        .details-about-product select,
        .details-about-product input[type="number"] {
            display: block;
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }

        .cart-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.3s;
            text-decoration: none;
            margin-top: 10px;
        }

        .cart-button:hover {
            background-color: #218838;
        }

        .product-details h3 {
            margin-top: 20px;
            color: #333;
        }

        .product-details p {
            color: #777;
        }

        .related-products {
            max-width: 900px;
            width: 100%;
            height:350px;
            margin-top: 40px;
        }

        .related-products h3 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.8em;
            color: #333;
        }

        .related-products .products {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .related-products .product {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 200px;
            padding: 15px;
            text-align: center;
        }

        .related-products .product img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .related-products .product h4 {
            font-size: 1.2em;
            margin: 10px 0;
            color: #333;
        }

        .related-products .product p {
            color: #ff6f61;
            font-size: 1em;
            margin-bottom: 10px;
        }

        .related-products .product a {
            display: inline-block;
            padding: 8px 15px;
            background-color: #28a745;
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .related-products .product a:hover {
            background-color: #218838;
        }

    </style>
</head>
<body>
    <header>
        <div class="navbar">
            <!-- Logo Section -->
            <div class="nav-item nav-logo">
                <a href="/">
                    <div class="logo"></div>
                </a>
            </div>

            <!-- Address Section -->
            <div class="nav-item nav-address">
                <p class="add-first">Delivered to
                    <i class="fa-solid fa-location-dot"></i>
                </p>
                <div class="add-icon">
                    <p class="add-sec">Rangpur District</p>
                </div>
            </div>

            <!-- Search Bar -->
            <form method="GET" action="" class="nav-item nav-search">
                <select class="search-select">
                    <option>All</option>
                </select>
                <input type="search" name="search" class="search-input" placeholder="Search products...">
                <button type="submit" class="search-icon">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>


            <!-- Sign-in Section -->
            <div class=" nav-signin">
                @if (Route::has('login'))
                    @auth
                        <a  href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Log in</a>
            </div>
            <div class="nav-item nav-signin border">
                @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif

                    @endauth
                @endif
            </div>

            <!-- Returns & Orders -->
            <div class="nav-item nav-signin">
                <a href="">
                    <p><span>Returns & Orders</span></p>
                </a>
            </div>

            <div class="nav-item nav-signin">
                <a href="">
                    <p><span>sell & buy</span></p>
                </a>
            </div>

            <!-- Cart Section -->
            <div class="nav-item nav-cart">
                <a href="">
                    <i class="fa-solid fa-cart-shopping"></i> Cart
                </a>
            </div>

            <!-- User Profile Section -->
            <div class="nav-item user-profile">
                <img src="" alt="Profile Image">
            </div>
        </div> 
    </header>

    <div class="item-take-center">
        <div class="product-details-alignment">
            <div class="image-details">
                <div class="col-2">
                    <img src="{{ asset('uploads/products/' . $product_details->product_image) }}" class="product-details-image" alt="{{ $product_details->product_name }}">
                </div>
            </div>
            <div class="details-about-product">
                <div class="col-2">
                    <p>Home / {{ $product_details->product_name }}</p>
                    <h1>{{ $product_details->product_details }}</h1>
                    <h4>{{ $product_details->product_price }} Taka</h4>
                    <select name="" id="">
                        <option value="">Select Size</option>
                        <option value="XXL">XXL</option>
                        <option value="XL">XL</option>
                        <option value="L">L</option>
                    </select>
                    <input type="number" value="1" min="1">
                    <button class="cart-button"><a href="cart.html" style="color: #fff; text-decoration: none;">Add To Cart</a></button>
                    <div class="product-details">
                        <h3>Product Details</h3>
                        <p>{{ $product_details->product_description }}</p>
                    </div>
                </div>
            </div>
        </div>
    <!-- Related products section -->
        <div class="related-products">
            <h3>Related Products</h3>
            <div class="products">
                @if($related_products->isNotEmpty())
                @foreach($related_products as $related_product)
                    <div class="product">
                        <img src="{{ asset('uploads/products/' . $related_product->product_image) }}" alt="{{ $related_product->product_name }}">
                        <h4>{{ $related_product->product_name }}</h4>
                        <p>{{ $related_product->product_price }} Taka</p>
                        <a href="{{ route('product_details', $related_product->id) }}">View Product</a>
                    </div>
                @endforeach
            @else
                <p>No related products found.</p>
            @endif
            </div>
        </div>
    </div>


	<div class="footer">
        <div class="foot-panel1">
            Back to Top
        </div>

        <div class="foot-panel2">
            <ul>
                <p>Get to know</p>
                <a>Careers</a>
                <a>Blog</a>
            </ul>

            <ul>
                <p>Get to know</p>
                <a>Careers</a>
                <a>Blog</a>
            </ul>

            <ul>
                <p>Get to know</p>
                <a>Careers</a>
                <a>Blog</a>
            </ul>

            <ul>
                <p>Get to know</p>
                <a>Careers</a>
                <a>Blog</a>
            </ul>
        </div>

        <div class="foot-panel3">
            <div class="logo-image"></div>
        </div>
    </div>

</body>
</html>