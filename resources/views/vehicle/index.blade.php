<x-layout>
    <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            <section class="text-center pb-8">
                <h1 class="font-bold text-4xl">Let's Find Your Next Vehicle</h1>

                <x-forms.form action="/search">
                    <x-forms.input :label="false" name="q" placeholder="Tesla..."></x-forms.input>
                </x-forms.form>
            </section>

            <h2 class="text-2xl font-bold tracking-tight text-gray-900">Cars you also might like</h2>
            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                @foreach ($vehicles as $vehicle)
                    <x-vehicle-tile :vehicle="$vehicle"/>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
