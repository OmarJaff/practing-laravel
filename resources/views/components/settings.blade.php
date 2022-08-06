@props(['headings'])

<x-layout>
    <div class="max-w-4xl mx-auto flex-wrap">

        <div class="border-b mt-16">
            <h2 class="text-lg font-semibold my-2">{{$headings}}</h2>
        </div>

        <div class="flex items-baseline">
            <aside class="w-48 flex flex-col space-y-6">
                <ul class="space-y-2">
                    <li>
                        <a href="/admin/posts" class="{{request()->is('admin/posts') ? 'text-blue-500' : ''}}">Manage Posts</a>
                    </li>
                    <li>
                        <a href="/admin/posts/create" class="{{request()->is('admin/posts/create') ? 'text-blue-500' : ''}}" >New post</a>
                    </li>
                </ul>

            </aside>


            <main class="flex-1">

                <div class="max-w-2xl mx-auto mt-10 lg:mt-20 space-y-6">
                    {{$slot}}
                </div>
            </main>
        </div>
    </div>
</x-layout>
