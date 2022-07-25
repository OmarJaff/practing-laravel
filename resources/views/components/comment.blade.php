@props(['comment'])

<article class="flex space-x-6 bg-gray-100 rounded-xl border border-gray-200 px-4 py-5">
    <div class="flex-shrink-0">
        <img class="rounded w-16 h-50" src="https://i.pravatar.cc/100?u={{$comment->id}}" alt="avatar">
    </div>
    <div class="space-y-2">
        <header>
            <h3 class="font-bold">{{$comment->author->name}}</h3>
            <p class="text-xs">Posted <time>{{$comment->created_at->diffForHumans()}} </time></p>
        </header>
        <p>{{$comment->body}}</p>
    </div>
</article>
