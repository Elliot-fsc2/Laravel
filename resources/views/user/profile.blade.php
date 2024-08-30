<x-layout>
    <a href="{{ route('posts.index') }}"
        class="inline-block mb-6 text-black hover:text-blue-500 text-3xl font-bold md:ml-10 ml-3">
        &larr;
        Back to all
        posts
    </a>
    <h1 class="text-3xl text-center font-bold mb-6">{{ $user->name }}'s Posts</h1>


    <div class="grid gap-8 lg:grid-cols-4 mb-5 px-10 md:px-20">
        @foreach ($posts as $post)
            <x-post-card :post="$post" />
        @endforeach
    </div>

    <div>
        {{ $posts->links() }}
    </div>
</x-layout>
