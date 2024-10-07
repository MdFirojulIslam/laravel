<!-- resources/views/admin/users/all_users.blade.php -->

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

    .status {
        font-weight: bold;
    }

    .status.active {
        color: green;
    }

    .status.inactive {
        color: orange;
    }

    .status.suspended {
        color: red;
    }
</style>

<div class="table-container">
    <h2>All Users</h2>

    <table>
        <thead>
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Registration Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example data, replace with dynamic data from the database -->
            <tr>
                <td>001</td>
                <td>John Doe</td>
                <td>john.doe@example.com</td>
                <td>2024-08-25</td>
                <td class="status.active">Active</td>
                <td class="action-buttons">
                    <a href="#">View</a>
                    <a href="#">Edit</a>
                </td>
            </tr>
            <tr>
                <td>002</td>
                <td>Jane Smith</td>
                <td>jane.smith@example.com</td>
                <td>2024-08-26</td>
                <td class="status.inactive">Inactive</td>
                <td class="action-buttons">
                    <a href="#">View</a>
                    <a href="#">Edit</a>
                </td>
            </tr>
            <tr>
                <td>003</td>
                <td>Michael Brown</td>
                <td>michael.brown@example.com</td>
                <td>2024-08-27</td>
                <td class="status.suspended">Suspended</td>
                <td class="action-buttons">
                    <a href="#">View</a>
                    <a href="#">Edit</a>
                </td>
            </tr>
            <!-- Add more rows as needed -->
        </tbody>
    </table>
</div>
@endsection
