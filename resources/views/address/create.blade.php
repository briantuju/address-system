<x-layout>
    <x-slot:title>
        {{ 'Create Address | ' . config('app.name') }}
    </x-slot:title>

    <div class="max-w-sm mx-auto">
        <h1 class="h1">Create address</h1>

        <form
            action="{{ route('address.store') }}"
            method="post"
            class="p-6 shadow-lg rounded-2xl"
        >
            @csrf

            <x-misc.input-group>
                <label for="name">Address</label>
                <input
                    type="text" id="name" name="name"
                    placeholder="Enter address name"
                    class="input" required
                    value="{{ old('name') }}"/>
            </x-misc.input-group>

            <x-misc.button type="submit">
                Submit
            </x-misc.button>
        </form>
    </div>
</x-layout>
