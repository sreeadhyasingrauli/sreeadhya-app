<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice Summary</title>
    <style>
        body { font-family: sans-serif; color: #333; }
        .invoice-box { max-width: 800px; margin: auto; padding: 10px; }
        .header { display: flex; justify-content: space-between; border-bottom: 2px solid #ddd; padding-bottom: 10px; }
        .details-table { width: 100%; margin-top: 20px; border-collapse: collapse; }
        .details-table th, .details-table td { padding: 10px; border: 1px solid #eee; text-align: left; }
        .details-table th { background: #f5f5f5; }
        .total { text-align: right; font-weight: bold; margin-top: 20px; font-size: 18px; }
    </style>
</head>
<body>
    <div class="invoice-box">
        <div class="header">
            <div>
                <h2>YOUR COMPANY INC.</h2>
                <p>billing@yourcompany.com</p>
            </div>
            <div style="text-align: right;">
                <h3>INVOICE</h3>
                <p><strong>Invoice # :</strong> {{ $invoice->invoice_number }}</p>
                <p><strong>Date :</strong> {{ $invoice->invoice_date }}</p>
            </div>
        </div>

        <div style="margin-top: 30px;">
            <h4>Invoiced To:</h4>
            <p><strong>Name:</strong> {{ $invoice->customer_name }}</p>
            <p><strong>Email:</strong> {{ $invoice->customer_email }}</p>
            <p><strong>Address:</strong> {{ $invoice->customer_address }}</p>
        </div>

        <table class="details-table">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Standard Professional Services Provided</td>
                    <td>${{ number_format($invoice->amount, 2) }}</td>
                </tr>
            </tbody>
        </table>

        <div class="total">
            Total Amount Due: ${{ number_format($invoice->amount, 2) }}
        </div>
    </div>
</body>
</html>
