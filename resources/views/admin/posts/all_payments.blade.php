<!-- resources/views/admin/payments/all_payments.blade.php -->

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

    .status.pending {
        color: orange;
    }

    .status.completed {
        color: green;
    }

    .status.failed {
        color: red;
    }
</style>

<div class="table-container">
    <h2>All Payments</h2>

    <table>
        <thead>
            <tr>
                <th>Payment ID</th>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Payment Date</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example data, replace with dynamic data from the database -->
            <tr>
                <td>5001</td>
                <td>1001</td>
                <td>John Doe</td>
                <td>2024-08-25</td>
                <td>$150.00</td>
                <td class="status.completed">Completed</td>
                <td class="action-buttons">
                    <a href="#">View</a>
                    <a href="#">Manage</a>
                </td>
            </tr>
            <tr>
                <td>5002</td>
                <td>1002</td>
                <td>Jane Smith</td>
                <td>2024-08-26</td>
                <td>$200.00</td>
                <td class="status.pending">Pending</td>
                <td class="action-buttons">
                    <a href="#">View</a>
                    <a href="#">Manage</a>
                </td>
            </tr>
            <tr>
                <td>5003</td>
                <td>1003</td>
                <td>Michael Brown</td>
                <td>2024-08-27</td>
                <td>$300.00</td>
                <td class="status.failed">Failed</td>
                <td class="action-buttons">
                    <a href="#">View</a>
                    <a href="#">Manage</a>
                </td>
            </tr>
            <!-- Add more rows as needed -->
        </tbody>
    </table>
</div>
@endsection
