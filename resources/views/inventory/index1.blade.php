<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sree Adhya Traders</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" crossorigin="anonymous">
    <style>
    html {
        font-size: 12px; /* Adjust as needed (e.g., 0.85rem, 85%) */
    }
</style>
</head>
<body>   
    <div class="max-w-6xl mx-auto">
        <h4 class="text-3xl font-bold mb-6">Inventory Management</h4>

        <!-- Status Alerts -->
        @if(session('success'))
            <div class="bg-green-500 text-blue p-3 rounded mb-4">{{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="bg-red-500 text-blue p-3 rounded mb-4">{{ $errors->first() }}</div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Form: Create New Product -->
              
            <div class="table table-striped table-bordered">
                <h4 class="text-xl font-semibold mb-4">Add New Item Stock</h4>
                <form action="{{ route('inventory.storeProduct') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium">Part Number</label>
                        <input type="text" name="part_number" required class="w-full border p-2 rounded">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Alternate Part Number</label>
                        <input type="text" name="alt_part_number" required class="w-full border p-2 rounded">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Part Description</label>
                        <input type="text" name="part_description" required class="w-full border p-2 rounded">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Make</label>
                        <input type="text" name="make" required class="w-full border p-2 rounded">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Price</label>
                        <input type="number" step="0.01" name="price" required class="w-full border p-2 rounded">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Unit Of Measurement</label>
                        <input type="text" name="uom" required class="w-full border p-2 rounded">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">HSN Code</label>
                        <input type="number" name="hsn_code" value="0" required class="w-full border p-2 rounded">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">GST Rate (%)</label>
                        <input type="number" step="0.01" name="gst_rate" required class="w-full border p-2 rounded">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Current Stock</label>
                        <input type="number" name="current_stock" value="0" required class="w-full border p-2 rounded">
                    </div>
                    
                    <button type="submit" class="w-full bg-blue-600 text-blue p-2 rounded hover:bg-blue-700">Save Item</button>
                </form>
            </div>

            <!-- List Inventory Table & Adjustment Tools -->
            <div class="bg-white p-6 rounded shadow md:col-span-2">
                <h4 class="text-xl font-semibold mb-4">Current Stock Dashboard</h4>
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b bg-gray-50">
                            <th class="p-2">Part Number</th>
                            <th class="p-2">Alternate Part Number</th>
                              <th class="p-2">Part Description</th>
                            <th class="p-2">Make</th>
                            <th class="p-2">Price</th>
                            <th class="p-2">Unit Of Measurement</th>
                             <th class="p-2">HSN Code</th>
                              <th class="p-2">GST Rate (%)</th>
                            <th class="p-2">Stock On Hand</th>
                             <th class="p-2">Alert Stock</th>
                            <th class="p-2 text-right">Quick Stock Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr class="border-b hover:bg-blue-50">
                            <td class="p-2 font-medium">{{ $product->part_number }}</td>
                            <td class="p-2 text-gray-600">{{ $product->alt_part_number }}</td>
                            <td class="p-2 text-gray-600">{{ $product->part_description }}</td>
                             <td class="p-2 text-gray-600">{{ $product->make }}</td>
                            <td class="p-2">{{ number_format($product->price, 2) }}</td>
                            <td class="p-2 text-gray-600">{{ $product->uom }}</td>
                            <td class="p-2 text-gray-600">{{ $product->hsn_code }}</td>
                              <td class="p-2">{{ number_format($product->gst_rate, 2) }}</td>
                                <td class="p-2 text-gray-600">{{ $product->current_stock }}</td>
                                
                            <td class="p-2">
                                <span class="px-2 py-1 rounded text-xs font-bold {{ $product->current_stock < 5 ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                                    {{ $product->alert_stock }} units
                                </span>
                            </td>
                            
                            <td class="p-2">
                                <!-- Fast Entry Stock Modifying form -->
                                <form action="{{ route('inventory.adjustStock', $product->product_id) }}" method="POST" class="flex items-center justify-end space-x-1">
                                    @csrf
                                    <select name="type" class="border p-1 text-sm rounded">
                                        <option value="in">+ Add</option>
                                        <option value="out">- Remove</option>
                                    </select>
                                    <input type="number" name="quantity" min="1" placeholder="Qty" required class="w-16 border p-1 text-sm rounded">
                                    <input type="text" name="reference" placeholder="Reason" class="w-20 border p-1 text-sm rounded">
                                    <button type="submit" class="bg-gray-800 text-blue px-2 py-1 text-xs rounded hover:bg-gray-900">Go</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
