@props(['documents'])

<ul class="flex gap-8 flex-col">
    @forelse($documents as $document)
        <li>
            <div class="flex justify-between items-center">
                <h5 class="text-gray-700">
                    {{ $document->file_name }}
                </h5>

                <div class="flex gap-4 items-center">
                    <form
                        action="{{ route('document.destroy', $document) }}"
                        method="post" class="delete_document"
                    >
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="px-3 py-1 rounded-xl text-xs cursor-pointer font-bold bg-red-700 text-red-200">
                            Delete
                        </button>
                    </form>
                    <a href="{{ route('document.show', $document) }}"
                       class="px-3 py-1 rounded-xl text-xs cursor-pointer font-bold bg-amber-700 text-amber-200">
                        Download
                    </a>
                </div>
            </div>
        </li>
    @empty
        <p>No documents found</p>
    @endforelse
</ul>
