
<x-settings headings="Manage Posts">

     <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-xl font-semibold text-gray-900">Posts</h1>
                <p class="mt-2 text-sm text-gray-700">A list of all the posts in your blog.</p>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <a href="/admin/posts/create" type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Add Post</a>
            </div>
        </div>
        <div class="mt-8 flex flex-col">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">

                            <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach($posts as $post)
                            <tr>
                                 <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$post->title}}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$post->slug}}</td>
                                 <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 space-x-2">
                                    <a href="/admin/posts/{{$post->slug}}/edit" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                     <a href="#" class=" text-sm text-gray-500 hover:text-gray-600">Delete</a>
                                 </td>
                            </tr>
                            @endforeach

                             </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-settings>
