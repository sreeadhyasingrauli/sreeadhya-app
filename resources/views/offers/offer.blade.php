<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Budgetary Offer</title>
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
        <div>
            <div class="offer-title">BUDGETARY OFFER</div>
           
        </div>
</div>
        
   <div class="header"></div>
            
        </div>
        <div>
            <img src="{{ public_path('images/sat-logo.png') }}" width="100" height="auto" alt="Logo">
            <h2>Sree Adhya Traders</h2>
            <p>New Market, Near Gayatri Mandir, Singrauli, Dist. Singrauli, MP-486889</p>
            <p>Mobile No. 9425176589, 8319738607,Email : adhya2003@yahoo.com,website : sreeadhya.com  </p>
            </div>
        
    </div>
    

    <table class="info-table">
         
        <tr>
            <td style="text-align: left;">
                <strong>Customer's Name & Address</strong> <br>
            <strong></strong> {{ $customer->customer_name }}<br>
                 <p>{{ $customer->address_line1}}, {{ $customer->address_line2}}</p>
                 <p>{{ $customer->city}}, {{ $customer->state}}-{{ $customer->pin_code}}</p>
                 
             </td>
        
            <td style="text-align: right;">
                <strong>Offer Number:</strong> {{ $offer->offer_number }}<br>
                <p><strong>Date:</strong> {{ date('Y-m-d') }}</p>
                <strong>Valid Until:</strong> {{ $offer->valid_until }}
            </td>
        </tr>
        
    </table>

    <table class="items-table">
        <thead>
            <tr>
                <th>SL#</th>
                <th>Part Number</th>
                <th>Part Description</th>
                <th>Qty</th>
                <th>Unit Price</th>
                 
            </tr>
        </thead>
        <tbody>
            @foreach($offer->items as $item)
            <tr>
                
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->part_number }}</td>
                <td>{{ $item->part_description }}</td>
                <td>{{ $item->quantity }}</td>
                <td>${{ number_format($item->price, 2) }}</td>
                
            </tr>
            @endforeach
            
        </tbody>
    </table>
     <table class="details">
               <tr>
                <td style="text-align: left;"> 
                <strong>Terms and Conditions:</strong>
                <p><strong>Price:</strong> {{ $offer->payment_terms }}</p> 
                <p><strong>GST :</strong> {{ $offer->gst_terms }}</p> 
                <p><strong>Delivery :</strong> {{ $offer->delivery_terms }}</p>
                <p><strong>Packing & Forwarding :</strong> {{ $offer->pf_terms }}</p>
                <p><strong>Basis Of Price :</strong> {{ $offer->pricebasis_terms }}</p>
                <p><strong>Guarantee/Warranty :</strong> {{ $offer->guarantee_terms }}</p>
                <p><strong>LD Clause :</strong> {{ $offer->ld_terms }}</p>
                <p><strong>Any Other  :</strong> {{ $offer->other_terms }}</p>
                </td>
             </tr>
        </table>
            <table class="content">
               <tr>
                <td style="text-align: left;"> 
                <tr> </tr>
                <p>Thanking you,</p>
                <p>Yours faithfully,</p> 
                 <tr> </tr>
                 <p>For Sree Adhya Traders</p>
                 <tr> </tr>
                 <tr> </tr>
                 <p><strong>(J D CHATTERJEE)</strong></p> 
                </td>
             </tr>
            </table>
</body>
</html>
