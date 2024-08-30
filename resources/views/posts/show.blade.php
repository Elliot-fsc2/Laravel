<x-layout>
    <div class="px-9">
        <a href="{{ route('posts.index') }}" class="inline-block mb-6 text-black hover:text-blue-500 text-3xl font-bold">
            &larr;
            Back to all
            posts</a>
        <x-post-card :post="$post" full />

        <div class="mt-10 p-12">
            <h2 class="text-xl font-semibold text-black dark:text-white text-center mb-10">Comments</h2>
            @foreach ($comments as $comment)
                <x-comments :comment="$comment" />
            @endforeach

            <div>
                {{ $comments->links() }}
            </div>

            <div class="mt-10 p-12">
                <form method="POST" action="{{ route('comments.store', $post) }}">
                    @csrf

                    <textarea name="body" rows="5" class="border border-gray-400 p-2 w-full" placeholder="write your comment"></textarea>
                    @error('body')
                        <p class="text-red-500 text-xs mt-2 mb-2 font-bold">{{ $message }}</p>
                    @enderror

                    <button class="bg-blue-900 text-white rounded py-2 px-4 hover:bg-blue-500">Comment</button>
                </form>
            </div>
        </div>

    </div>
</x-layout>
