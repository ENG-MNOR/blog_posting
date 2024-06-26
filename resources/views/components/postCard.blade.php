@props(['post', 'full' => false])

<div class="bg-white rounded-lg shadow-lg overflow-hidden">
    @if ($post->image)
        <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
    @else
        <img class="w-full h-48 object-cover" src="https://via.placeholder.com/600x400" alt="{{ $post->title }}">
    @endif

    @if ($full)
        <div class="p-6">
            <h2 class="text-2xl font-bold mb-2">{{ $post->title }}</h2>
            <p class="text-gray-700 mb-4">{{ $post->body }}</p>
            <p class="text-gray-600 text-sm">
                Posted by <a href="{{ route('user.posts', $post->user) }}"
                    class="text-blue-800 font-bold text-lg">{{ $post->user->name }} </a>on
                {{ $post->created_at->diffForHumans() }}
            </p>
        @else
            <div class="p-6">
                <h2 class="text-2xl font-bold mb-2">{{ $post->title }}</h2>
                <p class="text-gray-700 mb-4">{{ Str::words($post->body, 10) }}</p>
                <p class="text-gray-600 text-sm">
                    Posted by <a href="{{ route('user.posts', $post->user) }}"
                        class="text-blue-800 font-bold text-lg">{{ $post->user->name }} </a>on
                    {{ $post->created_at->diffForHumans() }}
                </p>
                <a href="{{ route('posts.show', $post->id) }}"
                    class="text-blue-500 hover:text-blue-700 font-bold mt-4 block">Read More &rarr;</a>
            </div>
    @endif
    <div class="flex items-center justify-end ">
        {{ $slot }}
    </div>
</div>
