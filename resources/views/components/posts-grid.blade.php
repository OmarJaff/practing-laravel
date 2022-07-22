@props(['posts'])

@if($posts->isNotEmpty())
    <x-post-featured-card :post="$posts->first()" > </x-post-featured-card>


    <div class="lg:grid lg:grid-cols-6">

        @foreach ($posts->skip(1) as $post)
            <x-post-card :post="$post" :iteration="$loop->iteration"></x-post-card>
        @endforeach


    </div>
    {{$posts->links()}}
@else
    <h1>No more posts yet, stay toned!</h1>
@endif
