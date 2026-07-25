<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Current Stock Inventory Report</title>
    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; color: #333; font-size: 12px; }
        .header { margin-bottom: 5px; border-bottom: 2px solid #334155; padding-bottom: 5px; }
        .header h2 { margin: 0; color: #1a202c; text-transform: uppercase; }
        .meta-info { margin-bottom: 20px; font-size: 11px; color: #718096; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #e2e8f0; padding: 10px; text-align: left; }
        th { background-color: #4a5568; color: #ffffff; text-transform: uppercase; font-size: 11px; }
        tr:nth-child(even) { background-color: #f7fafc; }
        .text-right { text-align: right; }
        .badge { padding: 4px 8px; border-radius: 4px; font-size: 10px; font-weight: bold; }
        .badge-success { background-color: #c6f6d5; color: #22543d; }
        .badge-warning { background-color: #feebc8; color: #744210; }
        .badge-danger { background-color: #fed7d7; color: #742a2a; }
    </style>
</head>
<body>
            <div class="header"> 
            <img src="{{ public_path('images/sat-logo.png') }}" width="100" height="auto" alt="Logo">
            </div>
            <strong></strong> <br>
            <div class="company-name"> 
            @foreach($allCompanies as $company)
            <strong></strong> {{ $company ->company_name }}<br>
            </div>
            <div class="header">
            <strong>{{ $company->address_line1}}, {{ $company->address_line2}}</strong><br>
            <strong>{{ $company->city}}, {{ $company->state}}-{{ $company->pin_code}}</strong><br>
            <strong>Mobile No. </strong> {{ $company ->contact_number }}, 
            <strong>Email ID : </strong> {{ $company ->email }},
            <strong>GST No. : </strong> {{ $company ->gst_number }}
              
            @endforeach
            </div>     
    <<div class="header h2">
        <h2>Inventory Stock Valuation Report</h2>
        <p>Generated on: {{ now()->format('d-m-Y ') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>S.No.</th>
                <th>Part Number</th>
                <th>Alternate Part Number</th>
                <th>Part Description</th>
                <th class="text-right">Qty in Stock</th>
                <th class="text-right">Unit Price</th>
                <th class="text-right">Extension Value</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            @php 
                    $itemValue = $product->current_stock * $product->price; 
                @endphp
            <tr>
                <td>{{ $loop->iteration }}</td>
                
                <td><strong>{{ $product->part_number }}</strong></td>
                 <td><strong>{{ $product->alt_part_number }}</strong></td>
                <td>{{ $product->part_description }}</td>
                <td class="text-right">{{ $product->current_stock }}</td>
                <td class="text-right">{{ number_format($product->price, 2) }}</td>
                <td class="text-right">{{ number_format($itemValue, 2) }}</td>
                <td>
                    @if($product->current_stock > 0)
                        <span class="badge badge-success">In Stock</span>
                    @elseif($product->current_stock  > 0)
                        <span class="badge badge-warning">Low Stock</span>
                    @else
                        <span class="badge badge-danger">Out of Stock</span>
                    @endif
                </td>
            </tr>
            @endforeach
            <tr class="total-row">
                <td colspan="6" class="text-right">Total Inventory Value:</td>
                <td class="text-right">{{ number_format($totalValuation, 2) }}</td>
            </tr>
        </tbody>
    </table>

</body>
</html>
