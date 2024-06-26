<x-layout>
    <div class="container mx-auto max-w-screen-sm">
        <h1 class="text-4xl mb-4">Welcome back</h1>
        <div class="card p-6 bg-white rounded-lg shadow-md">
            <form action="" method="post">
                @csrf

                {{-- email --}}
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">email</label>
                    <input type="text" name="email"
                        class="input w-full p-2 border rounded-md @error('email') border-red-500 @enderror"
                        value="{{ old('email') }}">
                    @error('email')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>
                {{-- password --}}
                <div class="mb-4">
                    <label for="password" class="block text-gray-700">password</label>
                    <input type="password" name="password"
                        class="input w-full p-2 border rounded-md  @error('password') border-red-500 @enderror" ">
                    @error('password')
    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
@enderror
                </div>
                <div class="mb-4">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Remember</label>
                </div>
                @error('failed')
    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
@enderror
                {{-- submit button --}}
                <button class="bg-blue-900 hover:bg-blue-700 text-white font-bold py-2 px-8 rounded w-32 ">
                    login
                </button>

            </form>
        </div>
    </div>
</x-layout>
