<x-layout>
    {{-- Heading --}}
    <h1 class="title">Welcome {{ auth()->user()->username }}, you have {{ $posts->total() }} posts</h1>

    <div class="card mb-4">
        <h2 class="font-bold mb-4">Create a new post</h2>
        @if (session('success'))
            <x-flashmsg msg="{{ session('success') }}" bg="bg-green-500" />
        @elseif (session('delete'))
            <x-flashmsg msg="{{ session('delete') }}" bg="bg-green-500" />
        @endif

        {{-- Session Messages --}}

        {{-- Create Post Form --}}
        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            {{-- Post Title --}}
            <div class="mb-4">
                <label for="title">Post Title</label>
                <input type="text" name="title" value="{{ old('title') }}"
                    class="input @error('title') ring-red-500 @enderror">

                @error('title')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Post Body --}}
            <div class="mb-4">
                <label for="body">Post Content</label>

                <textarea name="body" rows="4" class="input @error('body') ring-red-500 @enderror">{{ old('body') }}</textarea>

                @error('body')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Post Image --}}
            <div class="mb-4">
                <label for="image">Cover photo</label>
                <input type="file" name="image" id="image">

                @error('image')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit Button --}}
            <button class="btn">Create</button>

        </form>
    </div>
    <div class="container mx-auto mt-10">
        <h1 class="text-4xl mb-6 text-center">your latest posts</h1>
        @if ($posts->isEmpty())
            <p class="text-center">No posts available.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($posts as $post)
                    <x-postCard :post="$post">
                        <a href="{{ route('posts.edit', $post) }}"
                            class="text-white bg-green-500 px-4 py-1 text-xs rounded-md mr-1">Update</a>
                        <form action="{{ route('posts.destroy', $post) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="text-white bg-red-500 px-2 py-1 text-xs rounded-md">Delete</button>
                        </form>
                    </x-postCard>
                @endforeach
            </div>

        @endif
    </div>
    <div>
        {{ $posts->links() }}
    </div>



</x-layout>
