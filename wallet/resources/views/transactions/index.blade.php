
@extends('layouts.app')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6">
    <h2 class="text-2xl font-semibold mb-4">Transactions</h2>
    <a href="/transactions/create" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add Transaction</a>
    <table class="min-w-full bg-white mt-6">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Date</th>
                <th class="py-2 px-4 border-b">Type</th>
                <th class="py-2 px-4 border-b">Amount</th>
                <th class="py-2 px-4 border-b">Category</th>
                <th class="py-2 px-4 border-b">Account</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
            <tr>
                <td class="py-2 px-4 border-b">{{ $transaction->transaction_date }}</td>
                <td class="py-2 px-4 border-b">{{ ucfirst($transaction->type) }}</td>
                <td class="py-2 px-4 border-b">${{ number_format($transaction->amount, 2) }}</td>
                <td class="py-2 px-4 border-b">{{ $transaction->category->name ?? 'N/A' }}</td>
                <td class="py-2 px-4 border-b">{{ $transaction->account->name }}</td>
                <td class="py-2 px-4 border-b">
                    <a href="/transactions/{{ $transaction->id }}/edit" class="text-blue-500 hover:underline">Edit</a>
                    <form action="/transactions/{{ $transaction->id }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection