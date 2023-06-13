<x-layout>
    <x-slot:title>
        {{ $address->name }}
    </x-slot:title>

    <div class="grid grid-cols-1 md:grid-cols-8 xl:grid-cols-12 gap-8 xl:gap-12">
        <div class="col-span-1 md:col-span-3 md:order-last">
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

        <div class="col-span-1 md:col-span-5 xl:col-span-9">
            <div class="flex justify-between items-start">
                <h1 class="h1 text-left">
                    {{ $address->name }}
                </h1>

                <form
                    action="{{ route('address.destroy', $address) }}"
                    method="post" class="delete_address"
                >
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="px-3 py-1 rounded-lg text-xs cursor-pointer font-bold bg-red-500 text-white">
                        Delete Address
                    </button>
                </form>
            </div>

            <div class="p-4 xl:p-8 bg-amber-50 rounded-2xl shadow-lg mt-6">
                <x-address.document-list :documents="$address->documents"/>
            </div>
        </div>
    </div>
</x-layout>
