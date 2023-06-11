<x-layout>
    <x-slot:title>{{'Home | '. config('app.name')  }}</x-slot:title>

    <h1 class="text-3xl font-bold text-amber-700">
        {{ config('app.name') }}
    </h1>
</x-layout>
