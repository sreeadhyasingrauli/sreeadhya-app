<!DOCTYPE html>
<html>
<head>
    <title>Delivery Challan</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 14px; }
        .header { width: 100%; margin-bottom: 20px; }
        .header h2 { text-align: center; text-transform: uppercase; }
        .details { margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Delivery Challan</h2>
    </div>

    <div class="details">
        <strong>Challan No:</strong> {{ $challan->challan_no }}<br>
        <strong>Date:</strong> {{ $challan->challan_date }}<br>
        <strong>Customer:</strong> {{ $challan->customer->customer_name }}<br>
    </div>

    <table>
        <thead>
            <tr>
                <th>Item Description</th>
                <th>Quantity</th>
                <th>Unit</th>
            </tr>
        </thead>
        <tbody>
            @foreach($challan->items as $item)
                <tr>
                    <td>{{ $item->part_number }}</td>
                    <td>{{ $item->part_description }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->unit }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
