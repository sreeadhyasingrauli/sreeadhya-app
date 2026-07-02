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
                 <p><?php echo e($customer->address_line1); ?>, <?php echo e($customer->address_line2); ?></p>
                 <p><?php echo e($customer->city); ?>, <?php echo e($customer->state); ?>-<?php echo e($customer->pin_code); ?></p>
                 
             </td>
        
            <td style="text-align: right;">
                <strong>Offer Number:</strong> <?php echo e($offer->offer_number); ?><br>
                <p><strong>Date:</strong> <?php echo e(date('Y-m-d')); ?></p>
                <strong>Valid Until:</strong> <?php echo e($offer->valid_until); ?>

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
            <?php $__currentLoopData = $offer->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                
                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e($item->part_number); ?></td>
                <td><?php echo e($item->part_description); ?></td>
                <td><?php echo e($item->quantity); ?></td>
                <td>$<?php echo e(number_format($item->price, 2)); ?></td>
                
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
        </tbody>
    </table>
     <table class="details">
               <tr>
                <td style="text-align: left;"> 
                <strong>Terms and Conditions:</strong>
                <p><strong>Price:</strong> <?php echo e($offer->payment_terms); ?></p> 
                <p><strong>GST :</strong> <?php echo e($offer->gst_terms); ?></p> 
                <p><strong>Delivery :</strong> <?php echo e($offer->delivery_terms); ?></p>
                <p><strong>Packing & Forwarding :</strong> <?php echo e($offer->pf_terms); ?></p>
                <p><strong>Basis Of Price :</strong> <?php echo e($offer->pricebasis_terms); ?></p>
                <p><strong>Guarantee/Warranty :</strong> <?php echo e($offer->guarantee_terms); ?></p>
                <p><strong>LD Clause :</strong> <?php echo e($offer->ld_terms); ?></p>
                <p><strong>Any Other  :</strong> <?php echo e($offer->other_terms); ?></p>
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
<?php /**PATH C:\Users\pksso\sreeadhya\resources\views\offers\offer.blade.php ENDPATH**/ ?>