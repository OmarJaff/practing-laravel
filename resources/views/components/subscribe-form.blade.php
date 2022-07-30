<form method="POST" action="/newsletter/member/add" class="lg:flex text-sm">
    @csrf
    <div class="lg:py-3 lg:px-5 flex items-center">
        <label for="email" class="hidden lg:inline-block">
            <img src="/images/mailbox-icon.svg" alt="mailbox letter">
        </label>
        <div>
            <input id="email" name="email" type="text" placeholder="Your email address"
                   class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">

            @error('email')
            <span class="text-sm text-red-500">{{$message}}</span>
            @enderror
        </div>
    </div>

    <button type="submit"
            class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
    >
        Subscribe
    </button>
</form>
