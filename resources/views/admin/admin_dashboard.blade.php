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

        .sidebar {
            width: 250px;
            background-color: #f4f4f4;
            padding: 20px;
            position: fixed;
            top: 90px; /* Adjust based on header height */
            bottom: 60px; /* Adjust based on footer height */
            overflow-y: auto; /* Enable vertical scrolling */
            box-shadow: 2px 0 4px rgba(0, 0, 0, 0.1);
            transition: width 0.3s;
        }

        .sidebar.collapsed {
            width: 80px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 20px 0;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #333;
            padding: 10px;
            display: block;
            border-radius: 4px;
            transition: background-color 0.3s;
            font-size: 16px;
        }

        .sidebar ul li a:hover {
            background-color: #ddd;
        }

        .sidebar .toggle-btn {
            display: none;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            overflow-y: auto;
            height: calc(100vh - 120px); /* Adjust height to account for header and footer */
            box-sizing: border-box;
            transition: margin-left 0.3s;
        }

        .main-content.collapsed {
            margin-left: 80px;
        }


        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .form-label {
            margin-bottom: 15px;
        }

        .form-label label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-label input[type="text"],
        .form-label input[type="file"],
        .form-label input[type="submit"],
        .form-label textarea,
        .form-label select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .form-label input[type="submit"] {
            background-color: #333;
            color: white;
            cursor: pointer;
        }

        .form-label input[type="submit"]:hover {
            background-color: #555;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                position: static;
                height: auto;
                overflow: hidden;
                box-shadow: none;
            }

            .main-content {
                margin-left: 0;
            }

            .sidebar.collapsed {
                width: 100%;
            }

            .header .navbar ul {
                flex-direction: column;
                align-items: flex-start;
            }

            .header .navbar ul li {
                margin: 5px 0;
            }
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

    <div class="sidebar">
        <ul>
            <li><a href="{{ route('admin.posts.insert_products') }}">Insert Product</a></li>
            <li><a href="{{ route('admin.posts.insert_categories') }}">Insert Categories</a></li>
            <li><a href="{{ route('admin.posts.view_categories') }}">View Categories</a></li>
            <li><a href="{{ route('admin.posts.insert_brands') }}">Insert Brands</a></li>
            <li><a href="{{ route('admin.posts.view_brands') }}">View Brands</a></li>
            <li><a href="{{ route('admin.posts.all_orders') }}">All Orders</a></li>
            <li><a href="{{ route('admin.posts.all_payments') }}">All Payments</a></li>
            <li><a href="{{ route('admin.posts.list_users') }}">List Users</a></li>
            <!-- Add other dashboard links here -->
        </ul>
    </div>

    <div class="main-content">
        @yield('content')
    </div>

    <div class="footer">
        <ul>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Terms of Service</a></li>
            <li><a href="#">Contact Us</a></li>
        </ul>
        <p>&copy; 2024 Jaldhaka-bazar. All rights reserved.</p>
    </div>
</body>
</html>
