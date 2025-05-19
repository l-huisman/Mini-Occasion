@props(['label', 'name'])

@php
$defaults = [
    'type' => 'text',
    'id' => $name,
    'name' => $name,
    'class' => 'rounded-xl bg-black/2 border border-black/10 px-5 py-4 w-full my-4',
    'value' => old($name)
];
@endphp

<x-forms.field :$label :$name>
    <input {{ $attributes($defaults) }}">
</x-forms.field>
