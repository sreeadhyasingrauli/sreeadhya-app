<!-- resources/views/offer.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Business Offer - {{ $offer->id }}</title>
    <style>
        body { font-family: 'Helvetica', sans-serif; color: #333; }
        .header { display: flex; justify-content: space-between; margin-bottom: 30px; }
        .company-info { float: left; }
        .customer-info { float: right; }
        .content { margin-top: 50px; }
        .table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .table th, .table td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        .total { font-weight: bold; font-size: 1.2em; text-align: right; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="header">
        <div class="company-info">
            <h2>Your Company Name</h2>
            <p>123 Business Road, City, Country</p>
        </div>
        <div class="customer-info">
            <h4>Offer To:</h4>
            <p>{{ $offer->customer_id }}</p>
             
        </div>
    </div>

    <div class="content">
        <h3>Special Offer Details</h3>
        <p>Dear {{ $offer->customer_id }}, thank you for your interest. Below are the details of our offer:</p>

        <table class="table">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Description</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $offer->part_number }}</td>
                    <td>{{ $offer->quantity }}</td>
                    <td>$\$ {{ number_format($offer->price, 2) }}</td>
                </tr>
            </tbody>
        </table>

        <div class="total">
            Total Offer Amount: $\$ {{ number_format($offer->price, 2) }}
        </div>
    </div>
</body>
</html>
