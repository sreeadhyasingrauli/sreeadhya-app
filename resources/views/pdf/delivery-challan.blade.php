<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delivery Challan</title>
    <style>
        body { font-family: sans-serif; font-size: 14px; }
        .header { width: 100%; margin-bottom: 20px; }
        .header h2 { margin: 0; }
        .details-table, .items-table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .details-table td { padding: 5px; }
        .items-table th, .items-table td { border: 1px solid #000; padding: 8px; text-align: left; }
    </style>
</head>
<body>

<div class="header">
    <h2>DELIVERY CHALLAN</h2>
    <p>Your Company Name</p>
</div>

<table class="details-table">
    <tr>
        <td><strong>Challan No:</strong> #{{ $order->challan_no }}</td>
        <td><strong>Date:</strong> {{ $order->challan_date }}</td>
    </tr>
    <tr>
        <td><strong>Customer:</strong> {{ $order->customer->name }}</td>
        <td><strong>Address:</strong> {{ $order->customer->address }}</td>
    </tr>
</table>

<table class="items-table">
    <thead>
        <tr>
            <th>Item Description</th>
            <th>Qty</th>
            <th>Unit</th>
        </tr>
    </thead>
    <tbody>
        @foreach($order->items as $item)
        <tr>
            <td>{{ $item->product_name }}</td>
            <td>{{ $item->quantity }}</td>
            <td>{{ $item->unit }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<p><strong>Remarks:</strong> Subject to verification at destination.</p>

</body>
</html>
