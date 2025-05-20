@props(['vehicle'])

<div class="group relative">
    <img
        src="{{ asset($vehicle->url) }}"
        alt="Front of men&#039;s Basic Tee in black."
        class="aspect-square w-full rounded-md bg-gray-200 object-cover group-hover:opacity-75 lg:aspect-auto lg:h-80">
    <div class="mt-4 flex justify-between">
        <div>
            <h3 class="text-sm text-gray-700">
                <a href="#">
                    <span aria-hidden="true" class="absolute inset-0"></span>
                    {{ $vehicle->brand->name }} {{ $vehicle->type->name }}
                </a>
            </h3>
            <p class="mt-1 text-sm text-gray-500">{{ $vehicle->license_plate }}</p>
        </div>
        <p class="text-sm font-medium text-gray-900">&euro; {{ $vehicle->available_at }}</p>
    </div>
</div>
