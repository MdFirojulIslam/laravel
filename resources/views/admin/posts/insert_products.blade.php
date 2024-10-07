@extends('admin.admin_dashboard')

@section('content')
<div class="form-container">
    <h2>Insert Product</h2>
    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        
        <div class="form-label">
            <label for="product_code">Product Code</label>
            <input type="text" name="product_code" id="product_code" required>
        </div>

        <div class="form-label">
            <label for="product_name">Product Name</label>
            <input type="text" name="product_name" id="product_name" required>
        </div>

        <div class="form-label">
            <label for="product_sku">Stock Keeping Unit</label>
            <input type="text" name="product_sku" id="product_sku" required>
        </div>

        <div class="form-label">
            <label for="product_details">Product Details</label>
            <textarea name="product_details" id="product_details" required></textarea>
        </div>

        <div class="form-label">
            <label for="product_price">Product Price</label>
            <input type="text" name="product_price" id="product_price" required>
        </div>

        <div class="form-label">
            <label for="product_quantity">Product Quantity</label>
            <input type="text" name="product_quantity" id="product_quantity" required>
        </div>

        <div class="form-label">
            <label for="product_category">Product Category</label>
            <select name="product_category" id="product_category">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-label">
            <label for="product_brand">Product Brand</label>
            <select name="product_brand" id="product_brand">
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-label">
            <label for="product_status">Product Status</label>
            <select name="product_status" id="product_status">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
                <option value="out_of_stock">Out of Stock</option>
                <!-- Add other categories with their IDs -->
            </select>
        </div>

        <div class="form-label">
            <label for="product_weight">Product Weight</label>
            <input type="text" name="product_weight" id="product_weight">
        </div>

        <div class="form-label">
            <label for="product_dimensions">Product Dimensions (L x W x H)</label>
            <input type="text" name="product_dimensions" id="product_dimensions">
        </div>

        <div class="form-label">
            <label for="product_color">Available Colors</label>
            <input type="text" name="product_color" id="product_color">
        </div>

        <div class="form-label">
            <label for="product_size">Available Sizes</label>
            <input type="text" name="product_size" id="product_size">
        </div>

        <div class="form-label">
            <label for="product_image">Product Image</label>
            <input type="file" name="product_image" id="product_image">
        </div>

        <div class="form-label">
            <input type="submit" name = "submit" value="Insert Product">
        </div>
    </form>
</div>
@endsection
