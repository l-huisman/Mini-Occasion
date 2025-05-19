@props(['vehicle'])

<x-panel class="flex flex-col text-center">
    <div class="self-start text-sm">{{ $vehicle->employer->name }}</div>
    <div class="py-8">
        <h3 class="group-hover:text-blue-700 text-xl font-bold">
            <a href="{{ $vehicle->url }}" target="_blank">
                {{ $vehicle->title }}
            </a>
        </h3>
        <p class="text-sm mt-4">{{ $vehicle->schedule }} - From {{ $vehicle->salary }}</p>
    </div>
    <div class="flex justify-between items-center mt-auto">
        <div>
            @foreach($vehicle->tags as $tag)
                <x-tag :$tag size="small"/>
            @endforeach
        </div>

        <x-employer-logo :employer="$vehicle->seller" :width="42"/>
    </div>
</x-panel>
