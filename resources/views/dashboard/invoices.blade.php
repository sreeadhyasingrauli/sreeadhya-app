<x-dashboard-layout>
    <x-slot:title>Invoices - BillFlow Pro</x-slot:title>

    <div class="md:flex md:items-center md:justify-between mb-6">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">Invoices</h2>
        </div>
        <div class="mt-4 flex md:mt-0 md:ml-4">
            <button class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700">
                Create Invoice
            </button>
        </div>
    </div>

    <!-- Your Billing Data Table Content Goes Here -->
    <div class="bg-white shadow rounded-lg p-6">
        <p class="text-gray-600">Active invoice lists, payment terms, and tracking history.</p>
    </div>
</x-dashboard-layout>
