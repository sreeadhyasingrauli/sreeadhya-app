<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice {{ $invoice->invoice_number }}</title>
    <style>
        body { font-family: sans-serif; color: #333; font-size: 12px; line-height: 1.5; }
        .header { margin-bottom: 5px; border-bottom: 2px solid #334155; padding-bottom: 5px; }
        .footer { margin-top: 30px; padding: 10px; background-color: #f9f9f9; border-left: 4px solid #333; }
        .company-name { font-size: 24px; font-weight: bold; color: #1e293b; }
        .info-table { width: 100%; margin-bottom: 5px; border-collapse: collapse; }
        .info-table2 { width: 100%; padding: 10px; margin-top: 10px; border-collapse: collapse; }
        .info-table td { width: 50%; vertical-align: top; }
        .items-table { width: 100%; border-collapse: collapse; margin-top: 5px; }
        .items-table th { background-color: #f1f5f9; text-align: left; padding: 10px; font-weight: bold; border: 1px solid #cbd5e1; }
        .items-table td { padding: 10px; border: 1px solid #cbd5e1; }
        .total-row { font-weight: bold; background-color: #f8fafc; }
        .text-right { text-align: right; }
        .text-left { text-align: left; }
        .table th, .table td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        .offer-title { font-size: 14px; font-weight: bold; color: #2d3748; }
        .invoice-box { max-width: 800px; margin: auto; border: 1px solid #eee; }
        .words-section { margin-top: 30px; padding: 10px; background-color: #f9f9f9; border-left: 4px solid #333; }
        .total { text-align: right; font-weight: bold; margin-top: 20px; }
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
                        <strong>TAX INVOICE</strong>
                        </td>
            </tr>
             </table>
    <table class="info-table">
             <tr>
            <td style="text-align: left;">
                <strong>Customer's Name & Address</strong> <br>
                @foreach($customerWithInvoice as $customer)
                <strong></strong> {{ $customer->customer_name }}<br>
                 <strong></strong>{{ $customer->address_line1}}, {{ $customer->address_line2}}<br>
                 <strong></strong>{{ $customer->city}}, {{ $customer->state}}-{{ $customer->pin_code}}<br>
                 <strong>Contact Number:</strong> {{ $customer->contact_number }}<br>
                 <strong>Email:</strong> {{ $customer->email }}<br>
                 <strong>Website:</strong> {{ $customer->website }}<br>
                 <strong>GST Number:</strong> {{ $customer->gst_number }}<br>
                 @endforeach
             </td>
                
            <td style="text-align: right;">
                <strong>Invoice Number:</strong> {{ $invoice->invoice_number }}<br>
                <p><strong>Invoice Date:</strong> {{ \Illuminate\Support\Carbon::parse($invoice->invoice_date)->format('d-m-Y') }}</p>
                 
                 @foreach($poWithInvoice as $po)
                 <strong>PO Number:</strong> {{  $po->po_number }}<br>
                 <p><strong>PO Date:</strong> {{ \Illuminate\Support\Carbon::parse($po->po_date)->format('d-m-Y') }}</p>
                 <p><strong>Delivery End Date:</strong> {{ \Illuminate\Support\Carbon::parse($po->del_end_date)->format('d-m-Y') }}</p>
                  @endforeach
                 </td>
            </tr>
            </table>
     
            <div class="header">
            <table>
            <tr>
            <td style="text-align: right;">
            </td >
            </tr>
            </table>
            </div>

         <table class="items-table">
        <thead>
            <tr>
                <th>SL#</th>
                <th>Part Number</th>
                <th>Part Description</th>
                <th>HSN Code</th>
                <th>Qty</th>
                <th>Unit</th>
                <th>Price</th>
                <th>Ext. Value</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoice->items as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->part_number }}</td>
                <td>{{ $item->part_description }}</td>
                <td>{{ $item->hsn_code }}</td>
                <td>{{ $item->inv_quantity }}</td>
                 <td>{{ $item->uom }}</td>
                <td>{{ $item->unit_price }}</td>
                <td>{{ $item->sub_total }}</td>
            </tr>
            @endforeach
        </tbody>
            </table>
                    <div class="header">
        <table>
            <tr>
            <td style="text-align: right;">
            </td >
        </tr>
         </table>
        </div>
    <table class="info-table">
             <tr>
            <td style="text-align: left;">
            <strong></strong>
             </td>
        
            <td style="text-align: right;">
                <strong>Sub-Total :</strong> {{ $invoice->basic_amount }}<br>
                <p><strong>GST Amount @</strong> {{ $item->gst_rate }}% : {{ $invoice->gst_amount }}</p>
                <strong>Invoice Amount :</strong> {{ $invoice->invoice_amount }}
            </td>
        </tr>
        </table>
            <div class="header">
        <table>
            <tr>
            <td style="text-align: right;">
            </td >
        </tr>
         </table>
        </div>
                  
                    <div class="words-section">
                    <strong>Amount in Words:</strong> {{ $amountInWords }}
             </div>
            

        <table class="info-table">
             <tr>
            <td style="text-align: left;">
                @foreach($allCompanies as $company)
                <strong>Company's Bank Details : </strong> <br>
                <strong>Bank Name : </strong> {{$company->bank_name }}<br>
                <strong>Account Number : </strong> {{$company->account_number }} <br>
                <strong>IFSC Code : </strong> {{$company->ifsc_code }}<br>
                <strong>Branch Name :</strong> {{$company->branch_name }}<br>
                 @endforeach
            </td>
            </tr>
        </table> 
            <div class="header">
        <table>
            <tr>
            <td style="text-align: right;">
            </td >
        </tr>
         </table>
        </div>
        
        
        
        <table class="info-table2">
             <tr>
            <td style="text-align: right;">
                <strong>For Sree Adhya Traders </strong> <br>
                <strong></strong> <br>
                <strong></strong> <br>
                <strong>(Proprietor)</strong> <br>
             </td>
            </tr>
        </table> 
           
</body>
</html>
