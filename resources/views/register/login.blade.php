<x-layout>

    <main class="max-w-lg mx-auto my-16">
        <h1 class="my-2 font-semi-bold text-center">Register</h1>

        <form method="POST" action="/login" class="rounded border-gray-100 bg-gray-50 p-4">
            @csrf

            <div class="mb-6">
                <label class="block mb-2 text-xs font-bold text-gray-700 uppercase"
                       for="email">
                    Email Address
                </label>
                <input class="w-full p-2 border border-gray-400 rounded"
                       type="email" name="email" value="{{old('email')}}"
                       required>
                @error('email')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-2 text-xs font-bold text-gray-700 uppercase"
                       for="password">
                    Password
                </label>
                <input class="w-full p-2 border border-gray-400 rounded"
                       type="password" name="password" value="{{old('password')}}"
                       required>
                @error('password')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>

            <button type="submit" class="py-2 px-4 bg-blue-500 text-white rounded">
                login
            </button>
        </form>
    </main>

</x-layout>
