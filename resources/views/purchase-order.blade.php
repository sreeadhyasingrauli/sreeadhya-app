<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Order #{{ $po->po_number }}</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-50 antialiased p-6 sm:p-12">

    <!-- Actions Bar (Hidden on Print) -->
    <div class="max-w-4xl mx-auto mb-6 flex justify-end print:hidden">
        <button onclick="window.print()" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow transition">
            Print Order
        </button>
    </div>

    <!-- PO Card Container -->
    <div class="max-w-4xl mx-auto bg-white p-8 border border-gray-200 rounded-lg shadow-sm print:border-0 print:shadow-none">
        
        <!-- Header Grid -->
        <div class="grid grid-cols-2 gap-4 border-b border-gray-200 pb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 tracking-tight">PURCHASE ORDER</h1>
                <p class="text-sm text-gray-500 mt-1">Your Company Name Ltd.</p>
                <p class="text-xs text-gray-400">123 Business Rd, Tech City, 54321</p>
            </div>
            <div class="text-right">
                <p class="text-sm font-semibold text-gray-700">PO Number</p>
                <p class="text-xl font-mono font-bold text-blue-600">{{ $po->po_number }}</p>
                <p class="text-sm font-semibold text-gray-700 mt-2">Date</p>
                <p class="text-sm text-gray-600">{{ $po->created_at->format('M d, Y') }}</p>
            </div>
        </div>

        <!-- Vendor & Shipping Information -->
        <div class="grid grid-cols-2 gap-4 my-8">
            <div>
                <h2 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Vendor</h2>
                <p class="font-semibold text-gray-800">{{ $po->vendor->name }}</p>
                <p class="text-sm text-gray-600">{{ $po->vendor->address }}</p>
                <p class="text-sm text-gray-600">{{ $po->vendor->email }}</p>
            </div>
            <div>
                <h2 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Ship To</h2>
                <p class="font-semibold text-gray-800">Main Warehouse</p>
                <p class="text-sm text-gray-600">789 Logistics Blvd, Suite 100</p>
                <p class="text-sm text-gray-600">Shipping Center, 99999</p>
            </div>
        </div>

        <!-- Items Table -->
        <div class="overflow-x-auto my-6">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b-2 border-gray-300 bg-gray-50 text-xs font-bold text-gray-600 uppercase tracking-wider">
                        <th class="py-3 px-4">Item Details</th>
                        <th class="py-3 px-4 text-right">Qty</th>
                        <th class="py-3 px-4 text-right">Rate</th>
                        <th class="py-3 px-4 text-right">Amount</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-sm text-gray-700">
                    @foreach($po->items as $item)
                        <tr>
                            <td class="py-4 px-4 font-medium text-gray-900">
                                {{ $item->name }}
                                @if($item->sku)
                                    <span class="block text-xs text-gray-400 mt-0.5">SKU: {{ $item->sku }}</span>
                                @endif
                            </td>
                            <td class="py-4 px-4 text-right font-mono">{{ $item->quantity }}</td>
                            <td class="py-4 px-4 text-right font-mono">${{ number_format($item->price, 2) }}</td>
                            <td class="py-4 px-4 text-right font-mono">${{ number_format($item->quantity * $item->price, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Summary Totals Section -->
        <div class="grid grid-cols-2 gap-4 mt-8 pt-6 border-t border-gray-200">
            <div>
                <h2 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Terms & Notes</h2>
                <p class="text-xs text-gray-500 leading-relaxed">{{ $po->notes ?? 'Payment terms: Net 30 days. Please send confirmation upon receipt.' }}</p>
            </div>
            <div class="flex flex-col items-end justify-start space-y-2 text-sm">
                <div class="flex justify-between w-64 border-b border-gray-100 pb-2">
                    <span class="text-gray-500">Subtotal:</span>
                    <span class="font-mono text-gray-800">${{ number_format($po->subtotal, 2) }}</span>
                </div>
                <div class="flex justify-between w-64 border-b border-gray-100 pb-2">
                    <span class="text-gray-500">Tax ({{ $po->tax_rate }}%):</span>
                    <span class="font-mono text-gray-800">${{ number_format($po->tax_amount, 2) }}</span>
                </div>
                <div class="flex justify-between w-64 text-base font-bold pt-2">
                    <span class="text-gray-900">Total:</span>
                    <span class="font-mono text-blue-600">${{ number_format($po->total_amount, 2) }}</span>
                </div>
            </div>
        </div>

    </div>
</body>
</html>
