@props(['name'])


<x-form.field-layout>
    <x-form.label name="{{$name}}" > </x-form.label>
    <textarea name="{{$name}}" cols="10" rows="3" class="w-full  border border-gray-400 rounded"
              required>
                    {{$slot ?? old('excerpt')}}
                </textarea>

    <x-form.error name="{{$name}}" ></x-form.error>

</x-form.field-layout>

