<x-layout>
    <section class="text-center pt-6">
        <h1 class="font-bold text-4xl">Let's Find Your Next Occasion</h1>

        <x-forms.form action="/search">
            <x-forms.input :label="false" name="q" placeholder="Hyundai I10..."></x-forms.input>
        </x-forms.form>
    </section>
    @foreach($vehicles as $vehicle)
        <x-vehicle-tile :$vehicle/>
    @endforeach
</x-layout>
