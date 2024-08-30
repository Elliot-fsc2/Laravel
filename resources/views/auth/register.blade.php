<x-layout>

    <div class="px-10">
        <h1 class="text-3xl text-center font-bold my-6">Register</h1>

        <form method="POST" action="{{ route('register') }}"
            class="max-w-md mx-auto mt-10 bg-gray-800 p-4 md:p-6 rounded-lg shadow-lg">
            @csrf
            <div class="mb-6">
                <label for="name" class="block mb-2 uppercase font-bold text-xs text-white">
                    Name
                </label>
                <input type="text" name="name" value="{{ old('name') }}" class="border border-gray-600 p-2 w-full"
                    required>
                @error('name')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="block mb-2 uppercase font-bold text-xs text-white">
                    Email
                </label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="border border-gray-600 p-2 w-full" required>
                @error('email')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password" class="block mb-2 uppercase font-bold text-xs text-white">
                    Password
                </label>
                <input type="password" name="password" class="border border-gray-600 p-2 w-full" required>
                @error('password')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="block mb-2 uppercase font-bold text-xs text-white">
                    Confirm Password
                </label>
                <input type="password" name="password_confirmation" class="border border-gray-600 p-2 w-full" required>
            </div>

            <div class="mb-6 flex justify-center">
                <button type="submit" class="bg-blue-500 text-white block rounded py-2 px-4 hover:bg-blue-700">
                    Register
                </button>
            </div>

            <p class="text-center text-white">
                Already have an account?
                <a href="{{ route('login') }}" class="text-blue-500 hover:text-blue-700">
                    Log in
                </a>
            </p>
        </form>
    </div>
</x-layout>
