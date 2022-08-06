@props(['name','type'=>'text'])

<x-form.field-layout>


<x-form.label name="{{$name}}"></x-form.label>

    <input class="w-full p-2 border border-gray-400 rounded"
           type="{{$type}}"  name="{{$name}}"
           required {{$attributes(['value' => old($name)])}} />

    <x-form.error name="{{$name}}">
    </x-form.error>


</x-form.field-layout>

