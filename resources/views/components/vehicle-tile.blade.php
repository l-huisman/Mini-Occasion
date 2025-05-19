@props(['vehicle'])

<x-panel class="flex flex-col gap-x-6 mx-4 my-5">
    <div>
        <x-car-image :$vehicle/>
    </div>

    <div class="flex flex-col">
        <a href="#" class="self-start text-sm text-gray-400">{{ $vehicle->brand }}</a>

        <h3 class="font-bold text-xl mt-3 group-hover:text-blue-700">
            {{ $vehicle->license_plate }}
        </h3>
        <p class="text-sm text-gray-400 mt-auto">{{ $vehicle->build_date }}</p>
    </div>


    <div>
        @foreach($vehicle->categories as $category)
{{--            <x-category :$category/>--}}
        @endforeach
    </div>
</x-panel>
