@if(Session::has('message'))
    <div x-data="{isVisible: true}" x-show="isVisible" x-init="setTimeout(()=> isVisible = false, 5000)"
         class="bg-blue-500 rounded-lg px-6 py-2  bg-blue fixed flex items-center right-0 top-36 mx-6">
        <p class="text-white text-sm">{{Session::get('message')}}</p>
        <span class="flex absolute h-3 w-3 top-0 left-0 -mt-1 -mr-1">
        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-500 opacity-75"></span>
        <span class="relative inline-flex rounded-full h-3 w-3 bg-red-400"></span>
      </span>
    </div>
@endif
