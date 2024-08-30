<x-layout>
    <div class="flex justify-between mb-6 px-10 md:px-20 items-center">

        <h1 class="text-3xl text-center font-bold my-6">Latest Posts</h1>
        <a href="{{ route('posts.create') }}"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">New
            Post</a>
    </div>
    <div class="grid gap-8 lg:grid-cols-3 mb-5 px-10 md:px-20">
        @foreach ($posts as $post)
            <x-post-card :post="$post" />
        @endforeach
    </div>

    <div class="py-10 px-3">
        {{ $posts->links() }}
    </div>
</x-layout>
