@props(['comment'])

<div class="bg-white p-6 rounded-lg border border-gray-200 mb-3">
    <div class="flex items-center">
        <a href="" class="flex items-center space-x-4 hover:underline">
            <img class="w-10 h-10 rounded-full" src="https://avatarfiles.alphacoders.com/222/222663.jpg"
                alt="Jese Leos avatar" />
            <span class="text-lg font-bold">
                {{ $comment->user->name }}
            </span>
        </a>
    </div>
    <div class="flex justify-between items-center my-5">
        <span class="text-md">{{ $comment->created_at->diffForHumans() }}</span>
    </div>
    <p class="text-lg">{{ $comment->body }}</p>
</div>
