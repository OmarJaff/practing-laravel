@props(['comment'])

<article x-data="{show:false, editable:false}"  @click.away="show = false"

         class="flex space-x-6 bg-gray-100 rounded-xl border border-gray-200 px-4 py-5">
    <div class="flex-shrink-0">
        <img class="rounded w-16 h-50" src="https://i.pravatar.cc/100?u={{$comment->author->id}}" alt="avatar">
    </div>
    <div class="space-y-2 w-full">
        <div x-show="!editable">
            <header>
                <h3 class="font-bold">{{$comment->author->name}}</h3>
                <p class="text-xs">Posted <time>{{$comment->created_at->diffForHumans()}} </time></p>
            </header>
            <p>{{$comment->body}}</p>
        </div>
        <div x-show="editable">
            <form method="POST" action="/posts/{{$comment->post->slug}}/comments/update/{{$comment->id}}" >
                @csrf
                <textarea name="body" required x-ref="input"  class="focus:none focus:ring my-4 pl-2 rounded w-4/5"
                          cols="20" rows="4"  >{{$comment->body}}</textarea>

                <div class="flex">
                        <button class="text-white bg-blue-500 py-2 px-5 rounded-full" type="submit">Update</button>
                 </div>
                @error('body')
                <span class="text-red-500 text-sm">{{$message}}</span>
                @enderror
            </form>

        </div>



    </div>

    @if(auth()->id() === $comment->author->id)
    <div  class="flex justify-end w-full relative">

        <svg @click="show = !show" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500 hover:text-blue-500 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
        </svg>


        <div x-show="show" class="absolute shadow-sm top-8 rounded bg-white text-sm">
            <ul>
                {{--To Do--}}
                <button class="w-full flex hover:bg-gray-200 p-2 cursor-pointer"
                        @click = "editable = true; show=false;  $nextTick(() => $refs.input.focus());"  >Edit</button>

                <li class="hover:bg-gray-200 p-2 cursor-pointer">
                    <form method="POST" action="/posts/{{$comment->post->slug}}/comments/remove/{{$comment->id}}">
                        @csrf
                        <button>Delete Comment</button>
                    </form>
                </li>
            </ul>


        </div>
    </div>
    @endif

</article>
