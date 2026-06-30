<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Order Acceptance</title>
    <style>
         body { font-family: sans-serif; color: #333; font-size: 12px; line-height: 1.5; }
        .header { margin-bottom: 5px; border-bottom: 2px solid #334155; padding-bottom: 5px; }
        .company-name { font-size: 24px; font-weight: bold; color: #1e293b; }
        .info-table { width: 100%; margin-bottom: 5px; border-collapse: collapse; }
        .info-table td { width: 50%; vertical-align: top; }
        .items-table { width: 100%; border-collapse: collapse; margin-top: 5px; }
        .items-table th { background-color: #f1f5f9; text-align: left; padding: 10px; font-weight: bold; border: 1px solid #cbd5e1; }
        .items-table td { padding: 10px; border: 1px solid #cbd5e1; }
        .total-row { font-weight: bold; background-color: #f8fafc; }
        .text-right { text-align: right; }
        .table th, .table td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        .offer-title { font-size: 14px; font-weight: bold; color: #2d3748; }
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
            <strong>Email ID : </strong> {{ $company ->email }} ,
            <strong>Website : </strong> {{ $company ->website }} 
            @endforeach
            </div>     
            <table class="info-table">
                 <tr>
            <td style="text-align: right;">
                        <strong>ORDER ACCEPTANCE</strong>
                        </td>
            </tr>
             </table>
    <table class="info-table">
             <tr>
            <td style="text-align: left;">
                <strong>Customer's Name & Address</strong> <br>
                @foreach($customerWithPO as $customer)
                <strong></strong> {{ $customer->customer_name }}<br>
                 <p>{{ $customer->address_line1}}, {{ $customer->address_line2}}</p>
                 <p>{{ $customer->city}}, {{ $customer->state}}-{{ $customer->pin_code}}</p>
             @endforeach
                </td>
                
            <td style="text-align: right;">
                <strong>PO Number:</strong> {{ $order->po_number }}<br>
                
                <p><strong>PO Date:</strong> {{ \Illuminate\Support\Carbon::parse($order->po_date)->format('d-m-Y') }}</p>
                <strong>Delivery End Date :</strong> {{ \Illuminate\Support\Carbon::parse($order->del_end_date)->format('d-m-Y') }} 
            </td>
        </tr>
        
    </table>
    <hr>

   
    

    <table class="items-table">
        <thead>
            <tr>
                <th>SL#</th>
                <th>Part Number</th>
                <th>Part Description</th>
                <th>Qty</th>
                <th>Unit Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->part_number }}</td>
                <td>{{ $item->part_description }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->unit_price }}</td>
                <td>{{ $item->subtotal }}</td>
            </tr>
            @endforeach
        </tbody>
        
    </table>
    <div class="header"> </div>
    <table class="info-table">
             <tr>
            <td style="text-align: left;">
            <strong></strong>
                
             </td>
        
            <td style="text-align: right;">
                <strong>Basic Value :</strong> {{ $order->basic_value }}<br>
                <p><strong>GST Value:</strong> {{ $order->gst_value }}</p>
                <strong>Total Value :</strong> {{ $order->total_value }}
            </td>
        </tr>
        
    </table>
                 <div class="header"> </div>
    <div class="clear"></div>
    <p style="margin-top: 50px;">Thank you for your Purchase Order placed on us, this is our official order acceptance.</p>

    <table class="content">
               <tr>
                <tr> </tr>
             
                <td style="text-align: left;"> 
                <tr> </tr>
                
                 <tr> </tr>
                 <<p><strong>for Sree Adhya Traders</strong></p> 
                 <tr> </tr>
                 <tr> </tr>
                 <p><strong>(J D CHATTERJEE)</strong></p> 
                 <p><strong>Proprietor</strong></p>
                </td>
             </tr>
            </table>



</body>
</html>
