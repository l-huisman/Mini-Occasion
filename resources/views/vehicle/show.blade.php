<x-layout>
    <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            <div class="lg:grid lg:grid-cols-2 lg:gap-x-8 lg:items-start">
                <div>
                    <div class="aspect-w-1 aspect-h-1 w-full max-h-0">
                        @if($vehicle->url)
                            <img src="{{ $vehicle->url }}" alt="{{ $vehicle->brand->name }} {{ $vehicle->type->name }}"
                                 class="object-center object-cover w-full h-full rounded-lg">
                        @elseif($vehicle->brand->url)
                            <img src="{{ asset($vehicle->brand->slug) }}" alt="Placeholder"
                                 class="object-center object-cover w-full h-full rounded-lg">
                        @else
                            <img src="{{ asset('https://picsum.photos/id/111/300/300') }}" alt="Placeholder"
                                 class="object-center object-cover w-full h-full rounded-lg">
                        @endif
                    </div>
                </div>

                <div class="mt-10 px-4 sm:px-0 sm:mt-16 lg:mt-0">
                    <h1 class="text-3xl font-extrabold tracking-tight text-gray-900">{{ $vehicle->brand->name }} {{ $vehicle->model }}</h1>

                    <div class="mt-3">
                        <h2 class="sr-only">Vehicle information</h2>
                        <p class="text-3xl text-gray-900"> Available at
                            &euro; {{ number_format($vehicle->available_at, 2, ',', '.') }}</p>
                    </div>

                    <div class="mt-4">
                        <h3 class="sr-only">Description</h3>
                        <div class="text-base text-gray-700 space-y-6" itemprop="description">
                            <p> {{ $vehicle->description }} </p>
                        </div>
                    </div>

                    <section aria-labelledby="details-heading" class="mt-8">
                        <h2 id="details-heading" class="sr-only">Additional details</h2>

                        <div class="border-t divide-y divide-gray-200">
                            <div>
                                <h3 class="text-sm font-medium text-gray-900">License Plate</h3>
                                <p class="mt-2 text-sm text-gray-500">{{ $vehicle->license_plate }}</p>
                            </div>
                            @if($vehicle->build_date)
                                <div>
                                    <h3 class="text-sm font-medium text-gray-900 pt-4">Build Date</h3>
                                    <p class="mt-2 text-sm text-gray-500">{{ \Carbon\Carbon::parse($vehicle->build_date)->format('F j, Y') }}</p>
                                </div>
                            @endif
                            @if($vehicle->bought_at)
                                <div>
                                    <h3 class="text-sm font-medium text-gray-900 pt-4">Mileage</h3>
                                    <p class="mt-2 text-sm text-gray-500">{{ number_format($vehicle->mileage, 0, ",", '.') }} KM</p>
                                </div>
                            @endif
                            @if($vehicle->brand->slug)
                                <div>
                                    <h3 class="text-sm font-medium text-gray-900 pt-4">Brand Website</h3>
                                    <p class="mt-2 text-sm text-gray-500"><a href="{{ $vehicle->brand->slug }}"
                                                                             target="_blank"
                                                                             class="text-indigo-600 hover:text-indigo-500">{{ $vehicle->brand->slug }}</a>
                                    </p>
                                </div>
                            @endif
                            @if($vehicle->categories->isNotEmpty())
                                <div>
                                    <h3 class="text-sm font-medium text-gray-900 pt-4">Categories</h3>
                                    <div class="mt-2 text-sm text-gray-500">
                                        @foreach($vehicle->categories as $category)
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800 mr-2 mb-2">
                                            {{ $category->name }}
                                        </span>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </section>
                    @if($vehicle->url)
                        <div class="mt-10">
                            <a href="{{ $vehicle->brand->slug }}" target="_blank"
                               class="w-full bg-indigo-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                View Original Listing
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layout>
