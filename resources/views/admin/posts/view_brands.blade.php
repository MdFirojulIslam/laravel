<!-- resources/views/admin/brands/view_brands.blade.php -->

@extends('admin.admin_dashboard')

@section('content')
<style>
    .table-container {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }

    .table-container h2 {
        margin-bottom: 20px;
        font-size: 1.5em;
        color: #333;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th, td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #333;
        color: white;
        font-weight: bold;
    }

    tr:hover {
        background-color: #f4f4f4;
    }

    .action-buttons {
        display: flex;
        gap: 10px;
    }

    .action-buttons a {
        text-decoration: none;
        color: #333;
        padding: 5px 10px;
        border-radius: 4px;
        border: 1px solid #333;
        transition: background-color 0.3s;
    }

    .action-buttons a:hover {
        background-color: #333;
        color: white;
    }
</style>

<div class="table-container">
    <h2>Brands List</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($brands as $brand)
            <tr>
                <td>{{ $brand->id }}</td>
                <td>{{ $brand->brand_name }}</td>
                <td>{{ $brand->brand_description}}</td>
                <td class="action-buttons">
                    <a href="#">Edit</a>
                    <a href="#">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
