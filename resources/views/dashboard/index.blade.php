<x-app-layout>
    <!-- Top KPI Cards Overview -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
            <p class="text-sm font-medium text-gray-500 uppercase">Total Revenue</p>
            <p class="text-2xl font-bold text-green-600">{{ number_format($metrics['total_revenue'], 2) }}</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
            <p class="text-sm font-medium text-gray-500 uppercase">Pending Payments</p>
            <p class="text-2xl font-bold text-amber-500">{{ number_format($metrics['pending_amount'], 2) }}</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
            <p class="text-sm font-medium text-gray-500 uppercase">Overdue Collections</p>
            <p class="text-2xl font-bold text-red-600">{{ number_format($metrics['overdue_amount'], 2) }}</p>
        </div>
    </div>

    <!-- Data Table: Recent Invoices -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Recent Invoices</h2>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200 text-gray-600 text-sm font-medium">
                        <th class="p-3">Invoice ID</th>
                        <th class="p-3">Client</th>
                        <th class="p-3">Amount</th>
                        <th class="p-3">Status</th>
                        <th class="p-3">Due Date</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm">
                    @foreach($recentInvoices as $invoice)
                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                        <td class="p-3 font-semibold text-blue-600">{{ $invoice->invoice_number }}</td>
                        <td class="p-3">{{ $invoice->customer_id }}</td>
                        <td class="p-3">{{ number_format($invoice->invoice_amount, 2) }}</td>
                        <td class="p-3">
                            <span class="px-2 py-1 rounded text-xs font-semibold 
                                {{ $invoice->status == 'paid' ? 'bg-green-100 text-green-800' : '' }}
                                {{ $invoice->status == 'unpaid' ? 'bg-amber-100 text-amber-800' : '' }}
                                {{ $invoice->status == 'overdue' ? 'bg-red-100 text-red-800' : '' }}">
                                {{ ucfirst($invoice->status) }}
                            </span>
                        </td>
                        <td class="p-3 text-gray-500">{{ $invoice->invoice_date }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
