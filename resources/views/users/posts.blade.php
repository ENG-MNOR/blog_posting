<x-layout>
    <h1 class="text-4xl mb-4">{{ $user->name }}`s post are {{ $posts->total() }}</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($posts as $post)
            <x-postCard :post="$post" />
        @endforeach
    </div>
    <div>
        {{ $posts->links() }}
    </div>
</x-layout>
