@php
    $addresses = \App\Models\Address::with('documents')->get();
    $params = \Illuminate\Support\Facades\Route::current()->parameters;
    $slug = isset($params['address']['slug']) ? $params['address']['slug'] : null;
@endphp

<form>
    <x-misc.input-group>
        <label for="address">Select Address</label>
        <select name="address" id="address" class="address_select">
            <option value="INVALID">Select one</option>
            @forelse($addresses as $address)
                <option value="{{ $address->slug }}" @selected($address->slug === $slug)>
                    {{ $address->name }}
                </option>
            @empty
            @endforelse
        </select>
    </x-misc.input-group>
</form>
