@extends('Dashboards.admin.dashboard')

@section('Adash')
<div class="p-6">
    <h1 class="text-2xl font-semibold text-white mb-6">Financials & Audit</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <div class="p-5 bg-gray-800/40 rounded-xl border border-gray-700/50">
            <h2 class="text-gray-300">Monthly Revenue</h2>
            <p class="text-4xl font-bold text-green-400 mt-2">₹1,24,500</p>
        </div>

        <div class="p-5 bg-gray-800/40 rounded-xl border border-gray-700/50">
            <h2 class="text-gray-300">Instructor Payouts</h2>
            <p class="text-4xl font-bold text-accent-blue mt-2">₹45,200</p>
        </div>

    </div>

</div>
@endsection
