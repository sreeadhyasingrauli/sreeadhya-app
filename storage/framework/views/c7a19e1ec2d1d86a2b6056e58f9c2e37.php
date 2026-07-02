<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice <?php echo e($invoice->invoice_number); ?></title>
    <style>
         body { font-family: sans-serif; color: #333; font-size: 12px; line-height: 1.5; }
        .header { margin-bottom: 5px; border-bottom: 2px solid #334155; padding-bottom: 5px; }
        .footer { margin-bottom: 50px; border-bottom: 2px solid #334155; padding-bottom: 15px; }
        .company-name { font-size: 24px; font-weight: bold; color: #1e293b; }
        .info-table { width: 100%; margin-bottom: 5px; border-collapse: collapse; }
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
        <table>
            <tr>
            <td style="text-align: right;">
            <th>Tax Invoice</th>
            </td >
        </tr>
        </table>          
    </div>
    <div class="header">
        <div>
            <img src="<?php echo e(public_path('images/sat-logo.png')); ?>" width="100" height="auto" alt="Logo">
            <h2>Sree Adhya Traders</h2>
            <p>New Market, Near Gayatri Mandir, Singrauli, Dist. Singrauli, MP-486889</p>
            <p>Mobile No. 9425176589, 8319738607,Email : adhya2003@yahoo.com,website : sreeadhya.com  </p>
            </div>
            </div>
    <table class="info-table">
             <tr>
            <td style="text-align: left;">
                <strong>Customer's Name & Address</strong> <br>
                <strong></strong> <?php echo e($customer->customer_name); ?><br>
                 <strong></strong><?php echo e($customer->address_line1); ?>, <?php echo e($customer->address_line2); ?><br>
                 <strong></strong><?php echo e($customer->city); ?>, <?php echo e($customer->state); ?>-<?php echo e($customer->pin_code); ?><br>
                 <strong>Contact Number:</strong> <?php echo e($customer->contact_number); ?><br>
                 <strong>Email:</strong> <?php echo e($customer->email); ?><br>
                 <strong>Website:</strong> <?php echo e($customer->website); ?><br>
                 <strong>GST Number:</strong> <?php echo e($customer->gst_number); ?><br>
             </td>
                
            <td style="text-align: right;">
                <strong>Invoice Number:</strong> <?php echo e($invoice->invoice_number); ?><br>
                <p><strong>Invoice Date:</strong> <?php echo e(\Illuminate\Support\Carbon::parse($invoice->invoice_date)->format('d-m-Y')); ?></p>
                <strong>PO Number:</strong> <?php echo e($order->po_number); ?><br>
                <p><strong>PO Date:</strong> <?php echo e(\Illuminate\Support\Carbon::parse($order->po_date)->format('d-m-Y')); ?></p>
                <strong>Delivery End Date :</strong> <?php echo e(\Illuminate\Support\Carbon::parse($order->del_end_date)->format('d-m-Y')); ?> 
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
                <th>Qty</th>
                <th>Unit</th>
                <th>Price</th>
                <th>Ext. Value</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $invoice->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e($item->part_number); ?></td>
                <td><?php echo e($item->part_description); ?></td>
                <td><?php echo e($item->inv_quantity); ?></td>
                 <td><?php echo e($item->uom); ?></td>
                <td><?php echo e($item->unit_price); ?></td>
                <td><?php echo e($item->sub_total); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
            </table>
    <table class="info-table">
             <tr>
            <td style="text-align: left;">
            <strong></strong>
                
             </td>
        
            <td style="text-align: right;">
                <strong>Sub-Total :</strong> <?php echo e($invoice->basic_amount); ?><br>
                <p><strong>GST Amount:</strong> <?php echo e($invoice->gst_amount); ?></p>
                <strong>Invoice Amount :</strong> <?php echo e($invoice->invoice_amount); ?>

            </td>
        </tr>
            </table>
            
            
    </div>
        <div class="header">
        <table>
            <tr>
            <td style="text-align: right;">
            </td >
        </tr>
         </table>
        </div>
            <div class="total">
            Total Invoice Amount: <?php echo e(number_format($invoice->invoice_amount, 2)); ?>

             </div>
            <div class="invoice-box">
                    <div class="words-section">
                    <strong>Amount in Words:</strong> <?php echo e($amountInWords); ?>

             </div>
            </div>
        <table class="info-table">
             <tr>
            <td style="text-align: left;">
                <strong>Company's Bank Details : </strong> <br>
                <strong>Bank Name : State Bank Of India</strong> <br>
                <strong>Account Number : 101773236025</strong> <br>
                <strong>IFSC Code : SBIN0003767</strong> <br>
                <strong>Branch Name : Morwa</strong> <br>
             </td>
            </tr>
        </table>         
        <div class="footer">
        <table>
            <tr>
            <td style="text-align: right;">
              
                <tr> </tr>
                             
                 <p>For Sree Adhya Traders</p>
                 <tr> </tr>
                 <tr> </tr>
                 <p><strong>(Proprietor)</strong></p> 
                </td>
            </td >
        </tr>
         </table>
        
         
    </div>
</body>
</html>
<?php /**PATH C:\Users\pksso\sreeadhya\resources\views\reports\invoice.blade.php ENDPATH**/ ?>