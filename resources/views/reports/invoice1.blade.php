<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice {{ $invoice_number }}</title>
    <style>
        body { font-family: sans-serif; font-size: 14px; color: #333; }
        .invoice-box { max-width: 800px; margin: auto; padding: 20px; }
        .header { display: flex; justify-content: space-between; margin-bottom: 30px; }
        table { width: 100%; line-height: inherit; text-align: left; border-collapse: collapse; }
        table th { background: #f4f4f4; padding: 8px; font-weight: bold; }
        table td { padding: 8px; border-bottom: 1px solid #eee; }
        .total-row { font-weight: bold; text-align: right; }
    </style>
</head>
<body>
    <div class="invoice-box">
        <div class="header">
            <div>
                <h2>Your Company Name</h2>
                <p>123 Business Road, City, Country</p>
            </div>
            <div style="text-align: right;">
                <h3>INVOICE</h3>
                <p><strong>Invoice #:</strong> {{ $invoice_number }}</p>
                <p><strong>Date:</strong> {{ $date }}</p>
            </div>
        </div>
    </div>
        <hr>

        <div style="margin-bottom: 30px;">
            <strong>Bill To:</strong><br>
            {{ $customer_id }}<br>
            
        </div>

        <table>
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Qty</th>
                    <th>Unit Price</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                <tr>
                    <td>{{ $item->part_description }}</td>
                    <td>{{ $item->inv_quantity }}</td>
                    <td>${{ number_format($item->unit_price, 2) }}</td>
                    <td>${{ number_format($item->inv_quantity * $item->unit_price, 2) }}</td>
                </tr>
                @endendforeach
                
                <tr class="total-row">
                    <td colspan="3">Subtotal:</td>
                    <td>${{ number_format($subtotal, 2) }}</td>
                </tr>
                <tr class="total-row">
                    <td colspan="3">Tax:</td>
                    <td>${{ number_format($tax, 2) }}</td>
                </tr>
                <tr class="total-row" style="font-size: 18px; color: #000;">
                    <td colspan="3">Total Due:</td>
                    <td>${{ number_format($total, 2) }}</td>
                </tr>
            </tbody>
        </table>
   
</body>
</html>
