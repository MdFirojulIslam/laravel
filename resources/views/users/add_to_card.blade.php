<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User-View</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Link to external CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ time() }}">
    
    <style>
        .unique-cart-container {
            max-width: 950px;
            margin: 50px auto;
            padding: 30px;
            background-color: #f9f9f9;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        .unique-cart-container h2 {
            text-align: center;
            font-size: 2.2rem;
            color: #444;
            margin-bottom: 35px;
        }

        .unique-cart-items {
            margin-bottom: 40px;
        }

        .unique-cart-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
            border-bottom: 1px solid #ddd;
            background-color: #fff;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .unique-cart-item:last-child {
            margin-bottom: 0;
        }

        .unique-cart-item-image img {
            width: 110px;
            height: auto;
            border-radius: 8px;
        }

        .unique-cart-item-details {
            flex-grow: 1;
            margin-left: 25px;
        }

        .unique-cart-item-name {
            font-size: 1.6rem;
            margin: 0;
            color: #333;
        }

        .unique-cart-item-description {
            font-size: 1.1rem;
            color: #888;
            margin-top: 8px;
        }

        .unique-cart-item-price {
            font-size: 1.3rem;
            color: #000;
            margin-top: 12px;
        }

        .unique-cart-item-actions {
            display: flex;
            align-items: center;
        }

        .unique-item-quantity {
            width: 70px;
            padding: 7px;
            font-size: 1rem;
            margin-right: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            text-align: center;
        }

        .unique-remove-item {
            background-color: #e74c3c;
            color: white;
            padding: 10px 18px;
            font-size: 1rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .unique-remove-item:hover {
            background-color: #c0392b;
        }

        .unique-cart-summary {
            text-align: right;
            margin-top: 30px;
            font-size: 1.3rem;
            font-weight: bold;
        }

        .unique-checkout-button {
            background-color: #27ae60;
            color: white;
            padding: 18px 30px;
            font-size: 1.1rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .unique-checkout-button:hover {
            background-color: #219150;
        }

        /* Footer Styling */
        .footer {
            text-align: center;
            padding: 20px;
            background-color: #222;
            color: white;
        }

        .footer ul {
            list-style: none;
            padding: 0;
            margin-bottom: 15px;
        }

        .footer ul li {
            display: inline;
            margin-right: 15px;
        }

        .footer ul li a {
            color: white;
            text-decoration: none;
        }

        .footer p {
            margin: 0;
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
                <a href="{{ route('cart-view') }}">
                    <i class="fa-solid fa-cart-shopping"></i> Cart
                </a>
            </div>

            <!-- User Profile Section -->
            <div class="nav-item user-profile">
                <img src="" alt="Profile Image">
            </div>
        </div> 
    </header>

    <div class="unique-cart-container">
    <h2>Your Cart</h2>
    <div class="unique-cart-items">
        @if($cartItems->isEmpty())
            <p>Your cart is empty.</p>
        @else
            @foreach($cartItems as $item)
                <div class="unique-cart-item">
                    <div class="unique-cart-item-image">
                        <img src="{{ asset($item->attributes->image) }}" alt="Product Image">
                    </div>
                    <div class="unique-cart-item-details">
                        <h3 class="unique-cart-item-name">{{ $item->name }}</h3>
                        <p class="unique-cart-item-description">Brief description of the product goes here.</p>
                        <p class="unique-cart-item-price">${{ $item->price }}</p>
                        <div class="unique-cart-item-actions">
                            <input type="number" class="unique-item-quantity" value="{{ $item->qty }}" min="1">
                            <button class="unique-remove-item" data-id="{{ $item->rowId }}">Remove</button>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <div class="unique-cart-summary">
        <p class="total-price">Total: ${{ $totalPrice }}</p>
        <button class="unique-checkout-button">Proceed to Checkout</button>
    </div>
</div>

    <footer class="footer">
        <ul>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Terms of Service</a></li>
            <li><a href="#">Contact Us</a></li>
        </ul>
        <p>&copy; 2024 Jaldhaka-bazar. All rights reserved.</p>
    </footer>
</body>
</html>