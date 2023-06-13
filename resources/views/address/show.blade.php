<x-layout>
    <x-slot:title>
        {{ $address->name }}
    </x-slot:title>

    <div class="w-full flex flex-col items-start justify-between gap-4 md:flex-row">
        <h1 class="h1 text-left">
            {{ $address->name }}
        </h1>

        <form
            action="{{ route('address.document.store', $address) }}"
            method="post"
            enctype="multipart/form-data"
        >
            @csrf
            <x-misc.input-group>
                <label for="file">Upload document</label>
                <input type="file" name="file" id="file" class="input" required>
            </x-misc.input-group>

            <x-misc.button type="submit" class="px-2 py-1">Upload</x-misc.button>
        </form>
    </div>
</x-layout>
