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
        .offer-title { font-size: 12px; font-weight: bold; color: #2d3748; }
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
                        <strong>COMMERCIAL OFFER</strong>
                        </td>
            </tr>
             </table>
    <table class="info-table">
                 <tr>
            <td style="text-align: left;">
                <strong>Customer's Name & Address</strong> <br>
                 @foreach($customerWithOffers as $customer)
            <strong></strong> {{ $customer->customer_name }}<br>
               <strong></strong>{{ $customer->address_line1}}, {{ $customer->address_line2}}<br>
                <strong></strong>{{ $customer->city}}, {{ $customer->state}}-{{ $customer->pin_code}}<br>
                  @endforeach
             </td>
        
            <td style="text-align: right;">
                <strong>Offer Number:</strong> {{ $offer->offer_number }}<br>
                <strong>Date:</strong> {{ \Illuminate\Support\Carbon::parse($offer->offer_date)->format('d-m-Y') }}<br>
                <strong>Enquiry Number:</strong> {{ $offer->enquiry_number }}<br>
                <strong>Enquiry Date:</strong> {{ \Illuminate\Support\Carbon::parse($offer->enquiry_date)->format('d-m-Y') }}<br>
                
            </td>
        </tr>
            </table>

                
                           
    
     <div class="header">  </div>
            <div class="offer-title"></div>
         

     <table class="info-table">
               <tr>
                <td style="text-align: left;"> 
                <strong>Commercial Terms and Conditions:</strong>
                <p><strong>Basis Of Price :</strong> {{ $offer->pricebasis_terms }}</p>
                <p><strong>Payment Terms:</strong> {{ $offer->payment_terms }}</p> 
                <p><strong>Validity:</strong> {{ $offer->validity }}</p> 
                <p><strong>GST :</strong> {{ $offer->gst_terms }}</p> 
                <p><strong>Delivery :</strong> {{ $offer->delivery_terms }}</p>
                             
                 <p><strong>Discount :</strong> {{ $offer->discount }}</p>
                <p><strong>Guarantee/Warranty :</strong> {{ $offer->guarantee_terms }}</p>
                
                <p><strong>Any Other  :</strong> {{ $offer->other_terms }}</p>
                </td>
             </tr>
             
        </table>
            <table class="info-table">
                       
            <p><strong>Thanking you,</strong> </p> 
            <p><strong>Yours faithfully,</strong> </p> 
            <p><strong>for Sree Adhya Traders,</strong> </p> 
            <p><strong></strong> </p> 
            <p><strong>(J D CHATERJEE)</strong> </p> 
            <p><strong>Proprietor</strong> </p> 
              
        </table>
</body>
</html>
