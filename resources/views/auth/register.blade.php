<x-layout>
    <div class="container mx-auto max-w-screen-sm">
        <h1 class="text-4xl mb-4">Register new account</h1>
        <div class="card p-6 bg-white rounded-lg shadow-md">
            <form action="" method="post">
                @csrf
                {{-- username --}}
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Username</label>
                    <input type="text" name="name"
                        class="input w-full p-2 border rounded-md @error('name') border-red-500 @enderror"
                        value="{{ old('name') }}">
                    @error('name')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>
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
                        class="input w-full p-2 border rounded-md  @error('password') border-red-500 @enderror"
                        ">
                    @error('password')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>
                {{-- confirm --}}
                <div class="mb-4">
                    <label for="confirm" class="block text-gray-700">confirm</label>
                    <input type="password" name="password_confirmation"
                        class="input w-full p-2 border rounded-md  @error('password') border-red-500 @enderror"
                        >
                    @error('password')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>
                {{-- submit button --}}
                <button class="bg-blue-900 hover:bg-blue-700 text-white font-bold py-2 px-8 rounded w-32 ">
                    Register
                </button>

            </form>
        </div>
    </div>
</x-layout>
