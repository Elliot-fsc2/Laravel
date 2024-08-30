<x-layout>
    <div class="px-9">
        <a href="{{ route('posts.index') }}" class="inline-block mb-6 text-black hover:text-blue-500 text-3xl font-bold">
            &larr;
            Back to all
            posts</a>

        <h1 class="text-3xl text-center font-bold">Edit Post</h1>

        <form action="{{ route('posts.update', $post) }}" method="post" class="max-w-md mx-auto mt-10 space-y-6">
            @csrf
            @method('PUT')

            <div class="space-y-2">
                <label for="title" class="block text-sm font-medium text-gray-700">Post Title</label>
                <input type="text" name="title" value="{{ $post->title }}"
                    class="block w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm appearance-none focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('title') ring-red-500 @enderror">

                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Post Body --}}
            <div class="space-y-2">
                <label for="body" class="block text-sm font-medium text-gray-700">Post Content</label>
                <textarea name="body" rows="4"
                    class="block w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm appearance-none focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('body') ring-red-500 @enderror">{{ $post->body }}</textarea>

                @error('body')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-6">
                <button type="submit"
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Update Post
                </button>
            </div>
        </form>
    </div>
</x-layout>
