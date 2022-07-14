<x-layout>

    <x-posts-header />

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

        <x-post-featured-card />

        <div class="lg:grid lg:grid-cols-2">

            <x-post-card />
            <x-post-card />


        </div>

        <div class="lg:grid lg:grid-cols-3">
            <x-post-card />
            <x-post-card />
            <x-post-card />

        </div>
    </main>


    {{--<div class="space-y-12">--}}
{{--    @foreach($posts as $post)--}}
{{--        <a class="text-blue-500" href="/posts/{{$post->slug}}">{{ $post->name }}</a>--}}
{{--        <p>{{$post->body}}</p>--}}
{{--        <a href="/author/{{$post->author->username}}">Author: {{$post->author->name}}</a>--}}
{{--    <div>--}}
{{--    <a class="text-red-500" href="/category/{{$post->category->slug}}">Category: {{$post->category->name}}</a>--}}
{{--    </div>--}}
{{--    @endforeach--}}
{{--</div>--}}

</x-layout>
