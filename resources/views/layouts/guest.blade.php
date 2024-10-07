<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User-View</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Link to external CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ time() }}">
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
                <img src="photos/profile.jpg" alt="Profile Image">
            </div>
        </div> 
    </header>

    <div class="login-container">
        {{ $slot }} <!-- This is where the login form will be injected -->
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
