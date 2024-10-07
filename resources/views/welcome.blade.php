<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User-View</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Link to external CSS -->
     <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ time() }}">
     <meta name="csrf-token" content="{{ csrf_token() }}">
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
            <form method="GET" action="{{ url('/') }}" class="nav-item nav-search">
                <select name="category" class="search-select">
                    <option value="">All</option> <!-- This option allows for all categories -->
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
                <input type="search" name="search" class="search-input" placeholder="Search products...">
                <button type="submit" class="search-icon">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>


            <!-- Sign-in Section -->
            <div class="nav-signin">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
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
                    <p><span>Sell & Buy</span></p>
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

    <div class="container">
    <div class="sidebar">
        <h3>Categories</h3>
        <ul>
            @foreach($categories as $category)
                <li><a href="#">{{ $category->category_name }}</a></li>
            @endforeach
        </ul>
    </div>

    <div class="shop-section">
        @foreach($card_item as $product)
            <div class="card">                    
                <img class="card-img" src="{{ asset('uploads/products/' . $product->product_image) }}" alt="{{ $product->product_name }}">
                <div class="card-body">
                    <div class="card-title">
                        <p>{{ $product->product_name }}</p>
                    </div>
                    <div class="card-price">
                        <p>{{ $product->product_price }}: /-</p>
                    </div>
                    <div class="card-action">
                        <div class="card-details">
                            <p><a href="{{ route('product_details', $product->id) }}">Details</a></p>
                        </div>
                        <div class="card-add">
                            <button onclick="addToCart({{ $product->id }})">ADD TO CART</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="advertisements">
        <h3>Advertisements</h3>
        <p>Ad content goes here...</p>
        <!-- You can add more ad content as needed -->
    </div>
</div>

    <!-- Pagination Section -->
    <div class="pagination">
        {{ $card_item->links('vendor.pagination.custom-pagination') }} <!-- Use Laravel's pagination links -->
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

    <script>
        // If you want to handle pagination manually
        function goToPage(page) {
            window.location.href = `?page=${page}`;
        }
    </script>

<script>
        function addToCart(productId) {
            // Get CSRF token from meta tag
            let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            
            fetch('/add-to-cart/' + productId, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token // Include CSRF token for security
                },
                body: JSON.stringify({ product_id: productId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        }
    </script>


</body>
</html>
