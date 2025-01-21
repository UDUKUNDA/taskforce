 
  @vite('resources/css/app.css')
  @vite('resources/js/app.js') 


<div class="max-w-md mx-auto mt-10 bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-6 text-center">Sign Up</h2>

    <form method="POST" action="{{URL('registration_post')}}">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name" class="w-full border-gray-300 rounded shadow-sm" required>
            @error('name')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

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

        <div class="mb-4">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="w-full border-gray-300 rounded shadow-sm" required>
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">Sign Up</button>

        <p class="text-sm text-center mt-4">
            Already have an account? <a href="{{ URL('login') }}" class="text-blue-500 hover:underline">Login here</a>
        </p>
    </form>
</div>
 



