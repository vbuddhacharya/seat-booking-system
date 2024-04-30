@props([
    'name' => null,
    'label' => null,
    'helper' => null,
    'options' => null,
])


<div class="flex flex-col">
    <label for="{{ $name }}" class="font-semibold mb-2">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $name }}">
        @foreach ($options as $option => $value)
            <option value="{{ $option }}">{{ $value }}</option>
        @endforeach
    </select>
    <span class="text-sm mt-1">{{ $helper }}</span>
</div>
