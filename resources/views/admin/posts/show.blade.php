
<x-settings headings="Edit post: {{$post->title}}">
    <x-form.layout action="/admin/posts" enctype="multipart/form-data">

        <x-form.input name="title" :value="old('title', $post->title)"></x-form.input>
        <x-form.input name="slug" :value="old('slug', $post->slug)"></x-form.input>
        <x-form.textarea name="body" >
            {{old('body', $post->body)}}
        </x-form.textarea>
        <x-form.textarea name="excerpt" >
            {{old('excerpt', $post->excerpt)}}
        </x-form.textarea>
        <div class="flex justify-between">
        <x-form.input type="file" name="thumbnail" :value="old('thumbnail', $post->thumbnail)"></x-form.input>
            <img src="{{asset('storage/'.$post->thumbnail)}}" alt="thumbnail" class="w-40 h-40  rounded-lg">
        </div>
        <x-form.selectbox name="category_id"  >
            @foreach(\App\Models\Category::all() as $category)
                <option value="{{$category->id}}" {{old('category_id', $post->category_id) == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
            @endforeach
        </x-form.selectbox>

        <x-form.submit>Submit</x-form.submit>

    </x-form.layout>
</x-settings>
