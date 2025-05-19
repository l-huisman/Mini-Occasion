@props(['label', 'name'])
<div class="inline-flex items-center gap-x-2">
    <span class="w-2 h-2 bg-white inline-block"></span>
    <label {{ $attributes->merge(['class' => 'block text-md/6 font-medium text-white-900'])}}>{{ $label }}</label>
</div>
