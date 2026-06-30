<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Order #{{ $purchaseOrder->po_number }}</title>
    <!-- Tailwind CSS for styling -->
    <script src="https://jsdelivr.net"></script>
    <style>
        @media print {
            .no-print { display: none; }
            body { background: white; color: black; }
        }
    </style>
</head>
<body class="bg-gray-50 font-sans antialiased text-gray-900 critical-path">

    <div class="max-w-4xl mx-auto my-8 p-8 bg-white border border-gray-200 rounded-lg shadow-sm">
        
        <!-- Action Buttons (Hidden on Print) -->
        <div class="flex justify-end gap-3 mb-6 no-print">
            <button onclick="window.print()" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded shadow transition">
                Print PO
            </button>
            <a href="{{ route('purchase-orders.index') }}" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded border transition">
                Back to List
            </a>
        </div>

        <!-- Header Section -->
        <div class="flex justify-between items-start border-b border-gray-200 pb-6 mb-6">
            <div>
                <!-- Company Logo / Branding -->
                <div class="text-2xl font-bold tracking-tight text-gray-900 uppercase">
                    {{ config('app.name', 'Your Company') }}
                </div>
                <p class="text-sm text-gray-500 mt-1">123 Business Rd, Suite 100</p>
                <p class="text-sm text-gray-500">New York, NY 10001</p>
                <p class="text-sm text-gray-500">billing@yourcompany.com</p>
            </div>
            
            <div class="text-right">
                <h1 class="text-3xl font-extrabold tracking-wider text-gray-400 uppercase">Purchase Order</h1>
                <dl class="grid grid-cols-2 gap-x-2 gap-y-1 text-sm mt-4">
                    <dt class="font-semibold text-gray-600 text-left">PO Number:</dt>
                    <dd class="text-gray-900 font-mono">{{ $purchaseOrder->po_number }}</dd>
                    
                    <dt class="font-semibold text-gray-600 text-left">PO Date:</dt>
                    <dd class="text-gray-900">{{ $purchaseOrder->created_at->format('Y-m-d') }}</dd>
                    
                    <dt class="font-semibold text-gray-600 text-left">Delivery Due:</dt>
                    <dd class="text-gray-900 font-medium text-red-600">{{ $purchaseOrder->delivery_due_date->format('Y-m-d') }}</dd>
                    
                    <dt class="font-semibold text-gray-600 text-left">Status:</dt>
                    <dd class="text-left">
                        <span class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset 
                            @match($purchaseOrder->status)
                                'pending' => 'bg-yellow-50 text-yellow-800 ring-yellow-600/20',
                                'approved' => 'bg-green-50 text-green-800 ring-green-600/20',
                                'cancelled' => 'bg-red-50 text-red-800 ring-red-600/20',
                                default => 'bg-gray-50 text-gray-800 ring-gray-600/20',
                            @endmatch">
                            {{ ucfirst($purchaseOrder->status) }}
                        </span>
                    </dd>
                </dl>
            </div>
        </div>

        <!-- Vendor & Shipping Details -->
        <div class="grid grid-cols-2 gap-8 mb-8">
            <div>
                <h2 class="text-xs font-bold uppercase tracking-wider text-gray-400 mb-2">Vendor Information</h2>
                <div class="text-sm">
                    <p class="font-bold text-gray-900 text-base">{{ $purchaseOrder->vendor->name }}</p>
                    <p class="text-gray-600 mt-1">{{ $purchaseOrder->vendor->address }}</p>
                    <p class="text-gray-600">{{ $purchaseOrder->vendor->city }}, {{ $purchaseOrder->vendor->state }} {{ $purchaseOrder->vendor->zip }}</p>
                    <p class="text-gray-600 mt-2">Contact: {{ $purchaseOrder->vendor->contact_name }}</p>
                    <p class="text-gray-600">Email: {{ $purchaseOrder->vendor->email }}</p>
                </div>
            </div>
            <div>
                <h2 class="text-xs font-bold uppercase tracking-wider text-gray-400 mb-2">Ship To / Delivery Address</h2>
                <div class="text-sm">
                    <p class="font-bold text-gray-900 text-base">{{ $purchaseOrder->shipping_address_name ?? config('app.name') }}</p>
                    <p class="text-gray-600 mt-1">{{ $purchaseOrder->shipping_address }}</p>
                    <p class="text-gray-600">{{ $purchaseOrder->shipping_city }}, {{ $purchaseOrder->shipping_state }} {{ $purchaseOrder->shipping_zip }}</p>
                    <p class="text-gray-600 mt-2">Shipping Method: {{ $purchaseOrder->shipping_method ?? 'Standard Ground' }}</p>
                    <p class="text-gray-600">Payment Terms: {{ $purchaseOrder->payment_terms ?? 'Net 30' }}</p>
                </div>
            </div>
        </div>

        <!-- Items Table -->
        <div class="border border-gray-200 rounded-lg overflow-hidden mb-6">
            <table class="w-full text-left text-sm">
                <thead class="bg-gray-50 border-b border-gray-200 uppercase text-xs font-bold text-gray-600">
                    <tr>
                        <th scope="col" class="px-4 py-3 w-12 text-center">#</th>
                        <th scope="col" class="px-4 py-3">Item Description</th>
                        <th scope="col" class="px-4 py-3 text-right w-24">Qty</th>
                        <th scope="col" class="px-4 py-3 text-right w-32">Unit Price</th>
                        <th scope="col" class="px-4 py-3 text-right w-36">Total</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($purchaseOrder->items as $index => $item)
                        <tr class="hover:bg-gray-50/50 transition">
                            <td class="px-4 py-3 text-center text-gray-400 font-mono">{{ $index + 1 }}</td>
                            <td class="px-4 py-3">
                                <div class="font-medium text-gray-900">{{ $item->name }}</div>
                                @if($item->sku)
                                    <div class="text-xs text-gray-400 mt-0.5">SKU: {{ $item->sku }}</div>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-right font-mono">{{ number_format($item->quantity) }}</td>
                            <td class="px-4 py-3 text-right font-mono">${{ number_format($item->unit_price, 2) }}</td>
                            <td class="px-4 py-3 text-right font-mono font-medium">${{ number_format($item->total_price, 2) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-8 text-center text-gray-400">No items listed in this purchase order.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Summary & Notes -->
        <div class="grid grid-cols-12 gap-6 items-start">
            <!-- Left Side: Notes -->
            <div class="col-span-7 text-sm">
                @if($purchaseOrder->notes)
                    <h3 class="font-bold text-gray-700 mb-1">Special Instructions / Notes:</h3>
                    <p class="text-gray-600 bg-gray-50 p-3 rounded border border-gray-100 whitespace-pre-line">
                        {{ $purchaseOrder->notes }}
                    </p>
                @endif
                <div class="mt-4 text-xs text-gray-400">
                    <p>1. Please reference the PO Number on all shipping labels and invoices.</p>
                    <p>2. Notify us immediately if delivery cannot be completed by the specified date.</p>
                </div>
            </div>

            <!-- Right Side: Totals -->
            <div class="col-span-5 border border-gray-100 rounded-lg p-4 bg-gray-50/50">
                <dl class="space-y-2 text-sm">
                    <div class="flex justify-between text-gray-600">
                        <dt>Subtotal:</dt>
                        <dd class="font-mono">${{ number_format($purchaseOrder->subtotal, 2) }}</dd>
                    </div>
                    @if($purchaseOrder->tax_amount > 0)
                        <div class="flex justify-between text-gray-600">
                            <dt>Tax ({{ $purchaseOrder->tax_rate }}%):</dt>
                            <dd class="font-mono">${{ number_format($purchaseOrder->tax_amount, 2) }}</dd>
                        </div>
                    @endif
                    @if($purchaseOrder->shipping_cost > 0)
                        <div class="flex justify-between text-gray-600">
                            <dt>Shipping & Handling:</dt>
                            <dd class="font-mono">${{ number_format($purchaseOrder->shipping_cost, 2) }}</dd>
                        </div>
                    @endif
                    <div class="flex justify-between text-base font-bold text-gray-900 border-t border-gray-200 pt-2 mt-2">
                        <dt>Total Order Amount:</dt>
                        <dd class="font-mono">${{ number_format($purchaseOrder->total, 2) }}</dd>
                    </div>
                </dl>
            </div>
        </div>

        <!-- Signatures Footer -->
        <div class="grid grid-cols-2 gap-12 mt-16 pt-8 border-t border-gray-100 text-sm">
