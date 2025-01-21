@extends('layouts.app')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6">
    <h2 class="text-2xl font-semibold mb-4">Add Account</h2>
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('accounts.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Account Name</label>
            <input type="text" id="name" name="name" class="w-full p-2 border rounded" value="{{ old('name') }}" required>
        </div>
        <div class="mb-4">
            <label for="balance" class="block text-gray-700">Initial Balance</label>
            <input type="number" id="balance" name="balance" class="w-full p-2 border rounded" value="{{ old('balance') }}" required>
        </div>
        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Create Account
            </button>
        </div>
    </form>
</div>
@endsection
