<x-layout>
    <x-slot:title>{{'Home | '. config('app.name')  }}</x-slot:title>

    <h1 class="text-3xl font-bold text-amber-700">
        {{ config('app.name') }}
    </h1>

    @if($message = Session::get('success'))
        <span class="text-green-200 bg-green-700">
            {{ $message }}
        </span>
    @endif
</x-layout>
