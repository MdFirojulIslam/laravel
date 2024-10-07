<?php

namespace App\Http\Controllers\admin;

use App\Models\Brands;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function store(Request $request) 
    {
        $request->validate([
            'product_code' => 'required',
            'product_name' => 'required',
            'product_sku' => 'required',
            'product_details' => 'required',
            'product_price' => 'required',
            'product_quantity' => 'required',
            'product_category' => 'required',
            'product_brand' => 'required',
            'product_status' => 'required',
            'product_weight' => 'nullable',
            'product_dimensions' => 'nullable',
            'product_color' => 'nullable',
            'product_size' => 'nullable',
            'product_image' => 'nullable',
        ]);
    
        $product = new Product();

        $product->product_code = $request->product_code;
        $product->product_name = $request->product_name;
        $product->product_sku = $request->product_sku;
        $product->product_details = $request->product_details;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $product->product_category = $request->product_category; 
        $product->product_brand = $request->product_brand;    
        $product->product_status = $request->product_status;
        $product->product_weight = $request->product_weight;
        $product->product_dimensions = $request->product_dimensions;
        $product->product_color = $request->product_color;
        $product->product_size = $request->product_size;
        
        
        if ($request->hasFile('product_image')) 
        {
            $file = $request->file('product_image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $file->move('uploads/products', $fileName);
            $product->product_image = $fileName;
        }
    
        $product->save();

        return redirect()->back()->with('success', 'Data inserted successfully');
    }

    public function categories(Request $request)
    {
        $request->validate([
            'category_name'=>'required',
            'category_description'=>'required',
        ]);

        $category = new Category();

        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;

        $category->save();
        return redirect()->back()->with('success', 'Data inserted successfully');
    }

    public function brands(Request $request)
    {
        $request->validate([
            'brand_name'=>'required',
            'brand_description'=>'required',
            'brand_logo'=>'required',
        ]);

        $brands = new Brands();

        $brands->brand_name = $request->brand_name;
        $brands->brand_description = $request->brand_description;

        if ($request->hasFile('brand_logo')) 
        {
            $file = $request->file('brand_logo');
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $file->move('uploads/brands', $fileName);
            $brands->brand_logo = $fileName;
        }

        $brands->save();
        return redirect()->back()->with('success', 'Datainserted successfully');
    }

    public function viewCategories()
    {
        $categories = Category::all(); 
        return view('admin.posts.view_categories', compact('categories')); 
    }

    public function viewCategoriesAndBrandsInto_insertProducts()
    {
        $categories = Category::all();
        $brands = Brands::all();
        return view('admin.posts.insert_products', compact('categories', 'brands'));
    }

    public function view_brands()
    {
        $brands = Brands::all();
        return view('admin.posts.view_brands', compact('brands'));
    }


    //card-view
    public function cart_view(Request $request)
    {
        $query = Product::query(); // Start a query for products

        // Filter by category if one is selected
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }
    
        // Filter by search term if provided
        if ($request->filled('search')) {
            $query->where('product_name', 'like', '%' . $request->search . '%');
        }
    
        $productsPerPage = 6; // Number of products per page
        $card_item = $query->paginate($productsPerPage); // Paginate the filtered results
    
        // Fetch all categories for filtering purposes
        $categories = Category::all();
    
        // Return the view with both paginated products and categories
        return view('welcome', [
            'card_item' => $card_item, // The paginated items
            'categories' => $categories, // Categories for filtering
        ]);
    }


    //product_details
    public function product_details($id)
    {
        $product_details = Product::where('id', $id)->first(); // Fetch the product by ID

        // Check if the product exists
        if (!$product_details) {
            return redirect()->back()->with('error', 'Product not found.');
        }
        $related_products = Product::where('product_category', $product_details->product_category) // Use 'product_category' as your column
        ->where('id', '!=', $product_details->id) // Exclude the current product
        ->take(3) // Limit to 3 related products
        ->get();

        return view('products.product_details', compact('product_details', 'related_products'));
    }
}
