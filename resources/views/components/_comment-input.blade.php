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


