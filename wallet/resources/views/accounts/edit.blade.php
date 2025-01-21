@extends('layouts.app')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6">
    <h2 class="text-2xl font-semibold mb-4">Edit Account</h2>
    <form action="{{ route('accounts.update', $account->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Name</label>
            <input type="text" name="name" id="name" value="{{ $account->name }}" class="w-full px-4 py-2 border rounded">
        </div>
        <div class="mb-4">
            <label for="balance" class="block text-gray-700">Balance</label>
            <input type="number" name="balance" id="balance" value="{{ $account->balance }}" step="0.01" class="w-full px-4 py-2 border rounded">
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update</button>
    </form>
</div>
@endsection
