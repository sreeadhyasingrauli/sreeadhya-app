<x-app-layout>
    <x-slot:title>
        Dashboard - BillFlow Pro
    </x-slot:title>

    <!-- Main Dashboard Content Grid -->
    <div class="space-y-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Billing Overview</h1>
            <p class="text-sm text-gray-500">Monitor your real-time collections and pending invoicing.</p>
        </div>

        <!-- Metric Cards Dashboard Section -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                <p class="text-sm font-medium text-gray-500">Total Revenue</p>
            <p class="text-2xl font-bold text-emerald-600">{{ number_format($stats['total_revenue'], 2) }}</p>
            </div>
            <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                <div class="text-sm text-gray-500 font-medium">Amount Collected</div>
                <p class="text-2xl font-bold text-emerald-600">{{ number_format(($stats['partial_amount']+$stats['paid_amount']), 2) }}</p>
            </div>
            <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                <div class="text-sm text-gray-500 font-medium">Outstanding  Amount</div>
            <p class="text-2xl font-bold text-emerald-600">{{ number_format(($stats['total_revenue']-$stats['partial_amount']+$stats['paid_amount']), 2) }}</p>
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
    </div>
</x-app-layout>
