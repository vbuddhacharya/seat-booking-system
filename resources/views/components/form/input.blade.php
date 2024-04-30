@props([
    'name' => null,
    'label' => null,
    'helper' =>null,
    'placeholder' => null,
    'type' => "text",
])


<div class="flex flex-col">
    <label for="name" class="font-semibold mb-2">{{ $label }}</label>
    <input type={{$type}} name={{$name}} id="name" class="input" placeholder="{{$placeholder}}"">
    <span class="text-sm mt-1">{{$helper}}</span>
</div>
