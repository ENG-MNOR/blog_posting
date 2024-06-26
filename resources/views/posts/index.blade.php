<x-layout>
    <div class="container mx-auto mt-10">
        <h1 class="text-4xl mb-6 text-center">Posts</h1>
        @if ($posts->isEmpty())
            <p class="text-center">No posts available.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($posts as $post)
                    <x-postCard :post="$post" />
                @endforeach
            </div>

        @endif
    </div>
    <div>
        {{ $posts->links() }}
    </div>



</x-layout>
