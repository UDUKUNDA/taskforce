@extends('layouts.app')
@section('content')
<div class="bg-white shadow-md rounded-lg p-6">
    <h2 class="text-2xl font-semibold mb-4">Accounts</h2>
    <a href="{{URL('accounts/create')}}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add Account</a>
    <table class="min-w-full bg-white mt-6">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Name</th>
                <th class="py-2 px-4 border-b">Balance</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($accounts as $account)
            <tr>
                <td class="py-2 px-4 border-b">{{ $account->name }}</td>
                <td class="py-2 px-4 border-b">${{ number_format($account->balance, 2) }}</td>
                <td class="py-2 px-4 border-b">
                <a href="{{ route('accounts.edit', $account->id) }}" class="text-blue-500 hover:underline">Edit</a>
                <form action="{{ route('accounts.destroy', $account->id) }}" method="POST" class="inline-block">
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
