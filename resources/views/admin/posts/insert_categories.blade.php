<!-- resources/views/admin/categories/insert_categories.blade.php -->
@extends('admin.admin_dashboard')

@section('content')
<style>
    .form-container {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }

    .form-container h2 {
        margin-bottom: 20px;
        font-size: 1.5em;
        color: #333;
    }

    .form-label {
        margin-bottom: 15px;
    }

    .form-label label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #333;
    }

    .form-label input[type="text"],
    .form-label textarea,
    .form-label input[type="submit"] {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
        border-radius: 4px;
        border: 1px solid #ccc;
    }

    .form-label textarea {
        height: 100px; /* Adjust height for description */
    }

    .form-label input[type="submit"] {
        background-color: #333;
        color: white;
        cursor: pointer;
        border: none;
        padding: 10px;
    }

    .form-label input[type="submit"]:hover {
        background-color: #555;
    }
</style>

<div class="form-container">
    <h2>Insert Category</h2>
    <form action="{{ route('products.categories') }}" method="post">
        @csrf
        <div class="form-label">
            <label for="category_name">Category Name</label>
            <input type="text" name="category_name" id="category_name" required>
        </div>

        <div class="form-label">
            <label for="category_description">Category Description</label>
            <textarea name="category_description" id="category_description"></textarea>
        </div>

        <div class="form-label">
            <input type="submit" value="Insert Category">
        </div>
    </form>
</div>
@endsection
