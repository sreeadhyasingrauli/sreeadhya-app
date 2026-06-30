<aside class="w-64 bg-slate-900 text-gray-100 flex flex-col h-full border-r border-slate-800">
    <!-- Brand / Logo Header -->
    <div class="p-5 text-xl font-bold tracking-wider border-b border-slate-800 flex items-center gap-2">
        <span class="text-blue-300">💳</span> Sree Adhya Traders
    </div>

    <!-- Navigation Links -->
    <nav class="flex-1 p-4 space-y-1">
        <p class="text-xs font-semibold text-gray-400 uppercase px-3 mb-2 tracking-wider">Core</p>
        
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-colors {{ request()->routeIs('dashboard') ? 'bg-blue-600 text-black' : 'hover:bg-slate-800 text-gray-300' }}">
            <span>📊</span> Dashboard
        </a>

        <p class="text-xs font-semibold text-gray-400 uppercase px-3 mt-6 mb-2 tracking-wider">Billing Operations</p>

        <a href="{{ route('dashboard.companies') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-slate-800 text-black-300 transition-colors">
            <span>👥</span> Company
        </a>
        <a href="{{ route('dashboard.customers') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-slate-800 text-black-300 transition-colors">
            <span>👥</span> Clients / Customers
        </a>
        <a href="{{ route('dashboard.products') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-slate-800 text-black-300 transition-colors">
            <span>📄</span> Products/Items
        </a>
         <a href="{{ route('dashboard.offers') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-slate-800 text-black-300 transition-colors">
            <span>📄</span> Budgetary Offers
        </a>
        <a href="{{ route('dashboard.purchase-orders') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-slate-800 text-black-300 transition-colors">
            <span>📄</span> Purchase Orders
        </a>
        <a href="{{ route('dashboard.invoices') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-slate-800 text-black-300 transition-colors">
            <span>📄</span> Invoices
        </a>

        

        
    </nav>

    <!-- Sidebar Footer / User Info -->
    <div class="p-4 border-t border-slate-800 bg-slate-950 flex items-center justify-between">
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center text-sm font-bold">
                {{ substr(auth()->user()->name ?? 'U', 0, 1) }}
            </div>
            <div class="text-sm">
                <p class="font-medium text-gray-200 leading-tight">{{ auth()->user()->name ?? 'Guest User' }}</p>
                <p class="text-xs text-gray-400">Billing Admin</p>
            </div>
        </div>
    </div>
</aside>
