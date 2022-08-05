<x-layout>
    <main class="max-w-2xl mx-auto mt-10 lg:mt-20 space-y-6">
        <h1 class="my-2 font-semi-bold text-center">Create new post</h1>

        <form method="POST" action="/admin/posts" class="rounded border-gray-100 bg-gray-50 p-4" enctype="multipart/form-data">
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
                       for="title">
                    Slug
                </label>
                <input class="w-full p-2 border border-gray-400 rounded"
                       type="text" value="{{old('slug')}}" name="slug">

                @error('slug')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">

                <label class="block mb-2 text-xs font-bold text-gray-700 uppercase"
                       for="body">
                    Body
                </label>
            <textarea class="w-full   border border-gray-400 rounded"
                     name="body"
                   required>
                {{old('body')}}
            </textarea>

                @error('body')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-2 text-xs font-bold text-gray-700 uppercase"
                       for="excerpt">
                        Excerpt
                </label>
                <textarea name="excerpt" class="w-full  border border-gray-400 rounded"
                        required>
                    {{old('excerpt')}}
                </textarea>

                @error('excerpt')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <input type="file" name="thumbnail" id="thumbnail">
                @error('thumbnail')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <select name="category_id" id="category_id" >

                @foreach(\App\Models\Category::all() as $category)
                        <option value="{{$category->id}}"  {{$category->id == old('category_id') ? 'selected' : ''}}>{{ ucwords($category->name)}}</option>
                @endforeach

                </select>

                @error('category_id')
                <p class="text-red-500">{{$message}}</p>
                @enderror

            </div>

            <button type="submit" class="py-2 px-4 bg-blue-500 text-white rounded">
                Submit
            </button>
        </form>
    </main>
</x-layout>
