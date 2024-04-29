@props([
    'name' => null,
    'label' => null,
    'helper' =>null,
    'placeholder' => null,
    'type' => "text",
    'class' => "input",
    'value' =>null,
    'required' => false,
])


<div class="flex flex-col">
    <label for="{{$name}}" class="font-semibold mb-2 text-lg">{{ $label }} @if ($required)
        <span class="text-red-500">*</span>
    @endif</label>
    <input type={{$type}} name={{$name}} id="{{$name}}" class="{{$class}}" placeholder="{{$placeholder}}" value="{{$value}}">
    <span class="text-sm mt-1">{{$helper}}</span>
</div>
