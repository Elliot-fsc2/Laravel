@props(['post', 'full' => false])

<article class="p-6 bg-blue-200 rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
    <div class="flex justify-between items-center">
        <a href="{{ route('profile.user', $post->user) }}" class="flex items-center space-x-4 hover:underline">
            <img class="w-10 h-10 rounded-full" src="https://avatarfiles.alphacoders.com/222/222663.jpg"
                alt="Jese Leos avatar" />
            <span class="text-lg font-bold">
                {{ $post->user->name }}
            </span>
        </a>
    </div>
    <div class="flex justify-between items-center my-5">
        <span class="text-md">{{ $post->created_at->diffForHumans() }}</span>
    </div>

    {{-- title  --}}
    @if ($full)
        <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->title }}</h2>
    @else
        <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><a
                href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h2>
    @endif

    {{-- body --}}
    @if ($full)
        <p class="mb-5 dark:text-gray-400">{{ $post->body }}</p>
    @else
        <p class="mb-5   dark:text-gray-400">{{ Str::words($post->body, 15) }}</p>
    @endif


    @if (!$full)
        <a href="{{ route('posts.show', $post) }}"
            class="inline-flex items-center font-medium text-primary-600 dark:text-blue-500 hover:underline">
            Read more
            <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </a>
    @else
        @if (Auth::user()->can('modify', $post))
            <div class="flex justify-end">
                <a href="{{ route('posts.edit', $post) }}"
                    class="mr-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>

                <form method="POST" action="{{ route('posts.destroy', $post) }}">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete
                        Post</button>
                </form>
            </div>
        @endif
    @endif



</article>
