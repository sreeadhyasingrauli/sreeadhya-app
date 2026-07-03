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
            <img src="<?php echo e(public_path('images/sat-logo.png')); ?>" width="100" height="auto" alt="Logo">
            </div>
            <strong></strong> <br>
            <div class="company-name"> 
            <?php $__currentLoopData = $allCompanies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <strong></strong> <?php echo e($company ->company_name); ?><br>
            </div>
            <div class="header">
            <strong><?php echo e($company->address_line1); ?>, <?php echo e($company->address_line2); ?></strong><br>
            <strong><?php echo e($company->city); ?>, <?php echo e($company->state); ?>-<?php echo e($company->pin_code); ?></strong><br>
            <strong>Mobile No. </strong> <?php echo e($company ->contact_number); ?>, 
            <strong>Email ID : </strong> <?php echo e($company ->email); ?> ,
            <strong>Website : </strong> <?php echo e($company ->website); ?> 
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                <?php $__currentLoopData = $customerWithPO; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <strong></strong> <?php echo e($customer->customer_name); ?><br>
                 <p><?php echo e($customer->address_line1); ?>, <?php echo e($customer->address_line2); ?></p>
                 <p><?php echo e($customer->city); ?>, <?php echo e($customer->state); ?>-<?php echo e($customer->pin_code); ?></p>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </td>
                
            <td style="text-align: right;">
                <strong>PO Number:</strong> <?php echo e($order->po_number); ?><br>
                
                <p><strong>PO Date:</strong> <?php echo e(\Illuminate\Support\Carbon::parse($order->po_date)->format('d-m-Y')); ?></p>
                <strong>Delivery End Date :</strong> <?php echo e(\Illuminate\Support\Carbon::parse($order->del_end_date)->format('d-m-Y')); ?> 
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
            <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e($item->part_number); ?></td>
                <td><?php echo e($item->part_description); ?></td>
                <td><?php echo e($item->quantity); ?></td>
                <td><?php echo e($item->unit_price); ?></td>
                <td><?php echo e($item->subtotal); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        
    </table>
    <div class="header"> </div>
    <table class="info-table">
             <tr>
            <td style="text-align: left;">
            <strong></strong>
                
             </td>
        
            <td style="text-align: right;">
                <strong>Basic Value :</strong> <?php echo e($order->basic_value); ?><br>
                <p><strong>GST Value:</strong> <?php echo e($order->gst_value); ?></p>
                <strong>Total Value :</strong> <?php echo e($order->total_value); ?>

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
<?php /**PATH C:\Users\pksso\sreeadhya\resources\views/pdf/order-acceptance.blade.php ENDPATH**/ ?>