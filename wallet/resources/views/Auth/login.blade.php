 
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')

 
<div class="max-w-md mx-auto mt-10 bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>

    @if (session('error'))
        <div class="bg-red-100 text-red-700 border border-red-400 p-4 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{('login_post')}}">
        @csrf

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" class="w-full border-gray-300 rounded shadow-sm" required>
            @error('email')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" name="password" id="password" class="w-full border-gray-300 rounded shadow-sm" required>
            @error('password')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex justify-between items-center mb-6">
            <label class="flex items-center">
                <input type="checkbox" name="remember" class="form-checkbox">
                <span class="ml-2 text-sm text-gray-600">Remember me</span>
            </label>
            <a href="" class="text-sm text-blue-500 hover:underline">Forgot Password?</a>
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">Login</button>
    </form>
</div>