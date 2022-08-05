<x-layout>
    <main class="max-w-2xl mx-auto mt-10 lg:mt-20 space-y-6">
        <h1 class="my-2 font-semi-bold text-center">Create new post</h1>

        <form method="POST" action="/admin/posts" class="rounded border-gray-100 bg-gray-50 p-4">
            @csrf
            <div class="mb-6">
                <label class="block mb-2 text-xs font-bold text-gray-700 uppercase"
                       for="title">
                    Title
                </label>
                <input class="w-full p-2 border border-gray-400 rounded"
                       type="text" value="{{old('title')}}" name="title"
                       required>
                @error('title')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">

                <label class="block mb-2 text-xs font-bold text-gray-700 uppercase"
                       for="body">
                    Body
            <textarea class="w-full p-2 border border-gray-400 rounded"
                     name="body"
                   required>
                {{old('body')}}
            </textarea>
                </label>
                @error('body')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-2 text-xs font-bold text-gray-700 uppercase"
                       for="excerpt">
                        Excerpt

                <textarea class="w-full p-2 border border-gray-400 rounded"
                        required>
                    {{old('excerpt')}}
                </textarea>
                </label>
                @error('excerpt')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <select name="category" id="category">
                @php
                    $categories = App\Models\Category::all();
                @endphp
                @foreach($categories as $category)
                        <option value="{{$category->id}}">{{ ucwords($category->name)}}</option>
                @endforeach
                </select>
            </div>

            <button type="submit" class="py-2 px-4 bg-blue-500 text-white rounded">
                Submit
            </button>
        </form>
    </main>
</x-layout>
