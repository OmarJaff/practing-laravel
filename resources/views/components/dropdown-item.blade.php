@props(['active' => false])

@php

$classes= "flex px-2 py-1 hover:bg-blue-500 hover:text-white focus:bg-blue-500 focus:text-white w-full";

if($active)  $classes .= ' bg-blue-500 text-white';

@endphp

<a  {{ $attributes(['class' => $classes]) }}>
   {{ $slot }}
</a>
