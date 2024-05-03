@props([
    'name' => null,
    'label' => null,
    'helper' => null,
    'options' => null,
    'required' => false,
    'selected' => null,
])


<div class="flex flex-col">
    <label for="{{ $name }}" class="font-semibold mb-2">{{ $label }}@if ($required)
        <span class="text-red-500">*</span>
    @endif</label>
    <select name="{{ $name }}" id="{{ $name }}" class="input">
        @if ($selected == null)
            <option value="" disabled selected>Select a {{$label}}</option>
        @endif
        @foreach ($options as $option => $value)
            <option value="{{ $option }}" @if ($option == $selected)
                selected
            @endif>{{ $value }}</option>
        @endforeach
    </select>
    <span class="text-sm mt-1">{{ $helper }}</span>
</div>
