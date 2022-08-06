@props(['trigger'])

<div x-data="{show: false}"
     @click.away="show = false"
>
    {{-- Trigger --}}
    <div  @click="show = !show">
        {{ $trigger  }}
    </div>
    {{-- Links --}}
    <div  x-show="show" class="overflow-auto absolute top-20 w-full lg:w-56  bg-gray-100 rounded-xl z-50"  style="display: none">

        {{ $slot  }}

    </div>
 </div>
