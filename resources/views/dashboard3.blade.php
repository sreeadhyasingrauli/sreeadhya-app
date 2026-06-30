<x-layouts.app>
    <x-slot:title>Billing Dashboard</x-slot:title>
    <x-slot:header>Billing Overview</x-slot:header>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Metrics Grid -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-6 rounded-lg shadow-sm border-l-4 border-blue-500">
            <div class="text-sm font-medium text-gray-500 uppercase">Total Invoiced</div>
            <div class="text-2xl font-bold text-gray-900">{{ number_format($stats['total_invoiced'], 2) }}</div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-sm border-l-4 border-green-500">
            <div class="text-sm font-medium text-gray-500 uppercase">Total Collected</div>
            <div class="text-2xl font-bold text-green-600">{{ number_format(($stats['total_paid'] + $stats['total_partial']) , 2) }}</div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-sm border-l-4 border-yellow-500">
            <div class="text-sm font-medium text-gray-500 uppercase">Pending Collection</div>
            <div class="text-2xl font-bold text-yellow-600"> {{ number_format(($stats['total_invoiced'] - $stats['total_paid']- $stats['total_partial']), 2) }} </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-sm border-l-4 border-red-500">
            <div class="text-sm font-medium text-gray-500 uppercase">Overdue Amount</div>
            <div class="text-2xl font-bold text-red-600">{{ number_format($stats['total_overdue'], 2) }}</div>
        </div>
    </div>

    <!-- Data Layout: Recent Invoices Table -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <div class="px-6 py-4 font-semibold border-b text-gray-800">Recent Generated Invoices</div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-600 text-sm uppercase">
                        <th class="p-4 border-b">Invoice #</th>
                        <th class="p-4 border-b">Customer Code</th>
                        <th class="p-4 border-b">Invoice Date</th>
                        <th class="p-4 border-b">Invoice Amount</th>
                        <th class="p-4 border-b">Payment Status</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm">
                    @forelse($recentInvoices as $invoice)
                        <tr class="hover:bg-gray-50 border-b">
                            <td class="p-4 font-medium text-indigo-600">#{{ $invoice->invoice_number }}</td>
                            <td class="p-4">{{ $invoice->customer_id }}</td>
                            <td class="p-4">{{ \Carbon\Carbon::parse($invoice->invoice_date)->format('d-m-Y') }}</td>
                            <td class="p-4 font-semibold">{{ number_format($invoice->invoice_amount, 2) }}</td>
                            <td class="p-4">
                                <span class="px-2 py-1 rounded-full text-xs font-semibold 
                                    {{ $invoice->payment_status === 'paid' ? 'bg-green-100 text-green-800' : '' }}
                                    {{ $invoice->payment_status === 'unpaid' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                    {{ $invoice->payment_status === 'partial' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                    {{ $invoice->payment_status === 'overdue' ? 'bg-red-100 text-red-800' : '' }}">
                                    {{ ucfirst($invoice->payment_status) }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-6 text-center text-gray-400">No invoices generated yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>
