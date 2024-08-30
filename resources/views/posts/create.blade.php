<x-layout>
    <div class="px-10">
        <a href="{{ route('posts.index') }}" class="inline-block mb-6 text-black hover:text-blue-500 text-3xl font-bold">
            &larr;
            Back to all
            posts</a>
        <h1 class="text-3xl text-center font-bold mt-10">Create a new post</h1>
        <div class="pb-10">
            <form method="POST" action="{{ route('posts.store') }}" class="max-w-md mx-auto mt-10">
                @csrf
                <div class="mb-6">
                    <label for="title" class="block mb-2 uppercase font-bold text-gray-700">Title</label>
                    <input type="text" class="border border-gray-400 p-2 w-full" name="title" id="title"
                        value="{{ old('title') }}">
                    @error('title')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="body" class="block mb-2 uppercase font-bold text-gray-700">Body</label>
                    <textarea class="border border-gray-400 p-2 w-full" rows="10" name="body" id="body">{{ old('body') }}</textarea>
                    @error('body')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <button type="submit"
                        class="bg-blue-900 text-white rounded py-2 px-4 hover:bg-blue-500">Submit</button>
                </div>
            </form>
        </div>
    </div>

</x-layout>
