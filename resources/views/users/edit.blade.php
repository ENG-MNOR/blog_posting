<x-layout>
    <div>
        <a href="{{ route('home') }}" class="text-2xl text-blue-500">Go back to the dashbaord &rarr;</a>
    </div>
    <div class="card mb-4">
        <h2 class="font-bold mb-4">update apost</h2>
        @if (session('success'))
            <x-flashmsg msg="{{ session('success') }}" bg="bg-green-500" />
        @elseif (session('delete'))
            <x-flashmsg msg="{{ session('delete') }}" bg="bg-green-500" />
        @endif

        {{-- Session Messages --}}

        {{-- Create Post Form --}}


        <form action="{{ route('posts.update', $post) }}" method="put" enctype="multipart/form-data">
            @csrf
            {{-- Post Title --}}
            <div class="mb-4">
                <label for="title">Post Title</label>
                <input type="text" name="title" value="{{ $post->title }}"
                    class="input @error('title') ring-red-500 @enderror">

                @error('title')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Post Body --}}
            <div class="mb-4">
                <label for="body">Post Content</label>

                <textarea name="body" rows="4" class="input @error('body') ring-red-500 @enderror">{{ $post->body }}</textarea>

                @error('body')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            @if ($post->image)
                <div class="h-64 rounded-md w-1/4 object-cover overflow-hidden">
                    <label>current cover phote</label>
                    <img src="{{ asset('storage/' . $post->image) }}" alt="">
                </div>
            @endif

            {{-- Post Image --}}
            <div class="mb-4">
                <label for="image">Cover photo</label>
                <input type="file" name="image" id="image">

                @error('image')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit Button --}}
            <button type="submit" class="btn">update</button>

        </form>
    </div>

</x-layout>
