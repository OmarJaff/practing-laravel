<!doctype html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<style>
    html {
        scroll-behavior: smooth;
    }
</style>

<body style="font-family: Open Sans, sans-serif">
<section class="px-6 py-8">
    <nav class="md:flex md:justify-between md:items-center">
        <div>
            <a href="/">
                <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
            </a>
        </div>

        <div class="mt-8 md:mt-0 flex space-x-3 items-center">
            @auth

                <x-dropdown>
                    <x-slot name="trigger">
                        <button>Welcome Back {{ auth()->user()->name }}!</button>
                    </x-slot>
                    @can('admin')
                    <x-dropdown-item href="/admin/posts">
                        Dashboard
                    </x-dropdown-item>

                    <x-dropdown-item href="/admin/posts/create"
                                     :active="request()->is('admin/post/create')">
                        New Post
                    </x-dropdown-item>
                    @endcan
                    <x-dropdown-item href="/admin/post/create" x-data="{}"
                                     @click.prevent="document.querySelector('#logout-form').submit()">

                        Log out

                        <form id="logout-form" action="/logout" method="POST" hidden>
                            @csrf
                            <button>log out</button>
                        </form>
                    </x-dropdown-item>

                </x-dropdown>



            @else
                <a href="/register" class="text-xs font-bold uppercase">Register</a>
                <a href="/login" class="text-xs font-bold uppercase">Log in</a>

            @endauth
            <a href="#newsletter"
               class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                Subscribe for Updates
            </a>
        </div>
    </nav>
    <x-flash-message></x-flash-message>
    {{ $slot  }}


    <footer id="newsletter"
            class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
        <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
        <h5 class="text-3xl">Stay in touch with the latest posts</h5>
        <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

        <div class="mt-10">
            <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                <x-subscribe-form></x-subscribe-form>

            </div>
        </div>
    </footer>
</section>
</body>
