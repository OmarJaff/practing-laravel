@props(['comment'])

<article class="flex space-x-6 bg-gray-100 rounded-xl border border-gray-200 px-4 py-5">
    <div class="flex-shrink-0">
        <img class="rounded w-16 h-50" src="https://i.pravatar.cc/100?u={{$comment->author->id}}" alt="avatar">
    </div>
    <div class="space-y-2">
        <header>
            <h3 class="font-bold">{{$comment->author->name}}</h3>
            <p class="text-xs">Posted <time>{{$comment->created_at->diffForHumans()}} </time></p>
        </header>
        <p>{{$comment->body}}</p>
    </div>
    @if(auth()->id() === $comment->author->id)
    <div x-data="{show: false}" @click.away="show = false" class="flex justify-end w-full relative">

        <svg @click="show = !show" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500 hover:text-blue-500 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
        </svg>


        <div x-show="show" class=" flex absolute shadow-sm top-8 rounded py-2 px-4 bg-white text-sm">
            <form method="POST" action="/posts/{{$comment->post->slug}}/comments/remove/{{$comment->id}}">
                @csrf
                <button>Delete Comment</button>
            </form>
        </div>
    </div>
    @endif

</article>
