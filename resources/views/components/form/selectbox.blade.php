@props(['name', 'options'])


<x-form.field-layout>

     <x-form.label name="{{$name}}"></x-form.label>

    <select name="{{$name}}" id="$name" >

         {{$slot}}

    </select>

    <x-form.error name="{{$name}}"></x-form.error>

</x-form.field-layout>
