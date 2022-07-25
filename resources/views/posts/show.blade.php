<x-layout>

    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
            <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                <img src="/images/illustration-1.png" alt="" class="rounded-xl">

                <p class="mt-4 block text-gray-400 text-xs">
                    Published <time>{{$post->created_at->diffForHumans()}}</time>
                </p>

                <div class="flex items-center lg:justify-center text-sm mt-4">
                    <img src="/images/lary-avatar.svg" alt="Lary avatar">
                    <div class="ml-3 text-left">
                        <a href="/?author={{$post->author->username}}" class="font-bold">{{$post->author->name}}</a>
                    </div>
                </div>
            </div>

            <div class="col-span-8">
                <div class="hidden lg:flex justify-between mb-6">
                    <a href="/"
                       class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                        <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                <path class="fill-current"
                                      d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                </path>
                            </g>
                        </svg>

                        Back to Posts
                    </a>

                    <div class="space-x-2">
                       <x-category-button :category="$post->category"></x-category-button>

                    </div>
                </div>

                <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                        {{$post->name}}
                </h1>

                <div class="space-y-4 lg:text-lg leading-loose">
                   <p>
                       {{$post->body}}
                   </p>
                </div>
            </div>
            <section class="col-span-12 my-10 space-y-6">
                @auth()
                <form  method="POST" action="/posts/{{$post->slug}}/comments">

                @csrf
                <div class="border border-gray-200 px-6 py-4 rounded rounded-xl">
                    <div class="flex space-x-2">
                        <img class="rounded w-12 h-50" src="https://i.pravatar.cc/100?u={{auth()->id()}}" alt="avatar">
                        <p>Want to participate?</p>
                    </div>
                    <div>
                        <textarea name="body" required placeholder="participate and share your views!" class="focus:none focus:ring w-full rounded  my-4 pl-2" cols="20" rows="4"></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button class="text-white bg-blue-500 py-2 px-5 rounded-full">Post</button>
                    </div>
                    @error('body')
                    <span class="text-red-500 text-sm">{{$message}}</span>
                    @enderror
                </div>
                </form>
                @else
                  <p class="my-4"><a href="/register" class="text-underline">Register</a> or <a href="/login" class="text-underline">Login</a> to leave a comment</p>
                @endauth

                @foreach($post->comments as $comment)
                <x-comment :comment="$comment"></x-comment>
                @endforeach

            </section>
        </article>
    </main>

</x-layout>
