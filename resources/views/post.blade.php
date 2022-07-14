<a class="text-red-500" href="/category/{{$post->category->slug}}">Category: {{$post->category->name}}</a>

<h1>{!! $post->name !!}</h1>
{!! $post->body !!}
<a href="/author/{{$post->author->username}}">{{$post->author->name}}</a>

<a href="/">Back to home</a>
