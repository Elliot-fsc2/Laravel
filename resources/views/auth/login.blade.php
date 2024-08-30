<x-layout>
    <div class="flex items-center justify-center">
        <form action="{{ route('login') }}" method="post"
            class="max-w-6xl mx-auto mt-10 space-y-6 bg-gray-800 p-10 rounded-lg shadow-lg">
            @csrf

            <h1 class="text-4xl text-center font-bold text-white">Login</h1>

            <div class="space-y-2">
                <label for="email" class="block text-lg font-medium text-white">Email address</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="block w-full px-5 py-3 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm appearance-none focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('email') ring-red-500 @enderror">
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="space-y-2">
                <label for="password" class="block text-lg font-medium text-white">Password</label>
                <input type="password" name="password"
                    class="block w-full px-5 py-3 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm appearance-none focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('password') ring-red-500 @enderror">
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember"
                        class="focus:ring-blue-500 h-6 w-6 border-gray-300 rounded bg-white">
                    <label for="remember" class="ml-2 block text-lg text-white">Remember me</label>
                </div>

                <div class="text-lg">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-blue-500 hover:text-blue-700">
                            Forgot your password?
                        </a>
                    @endif
                </div>
            </div>

            <button type="submit"
                class="w-full flex justify-center py-3 px-5 border border-transparent rounded-md shadow-sm text-lg font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Log in
            </button>

            <p class="mt-6 text-center text-lg text-white">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-blue-500 hover:text-blue-700">
                    Sign up
                </a>
            </p>
        </form>
    </div>
</x-layout>
