@if (session()->has('success'))
    <div class="bg-green-500/20 text-green-700 px-8 py-4 rounded-lg mb-4 flex">
        <x-icon name="success" />
        <span class="px-3">{{ session()->get('success') }}</span>
    </div>
@endif

@if (session()->has('error'))
    <div class="alert-error">
        <x-icon name="error" />
        <span>{{ session()->get('error') }}</span>
    </div>
@endif

@if (session()->has('warning'))
    <div class="alert-warning">
        <x-icon name="warning" />
        <span>{{ session()->get('warning') }}</span>
    </div>
@endif

@if (session()->has('info'))
    <div class="alert-info">
        <x-icon name="info" />
        <span>{{ session()->get('info') }}</span>
    </div>
@endif
