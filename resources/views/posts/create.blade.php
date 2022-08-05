<x-layout>
    <main class="max-w-2xl mx-auto mt-10 lg:mt-20 space-y-6">
        <h1 class="my-2 font-semi-bold text-center">Create new post</h1>

        <x-form.layout action="/admin/posts" enctype="multipart/form-data">

            <x-form.input name="title"></x-form.input>
            <x-form.input name="slug"></x-form.input>
            <x-form.textarea name="body"></x-form.textarea>
            <x-form.textarea name="excerpt"></x-form.textarea>
            <x-form.input type="file" name="thumbnail"></x-form.input>
            <x-form.selectbox name="category_id"  >
                @foreach(\App\Models\Category::all() as $category)
                    <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                @endforeach
            </x-form.selectbox>

            <x-form.submit>Submit</x-form.submit>

        </x-form.layout>

    </main>
</x-layout>
