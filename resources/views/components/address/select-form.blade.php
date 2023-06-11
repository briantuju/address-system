<form>
    <x-misc.input-group>
        <label for="address">Select Address</label>
        <select name="address" id="address" class="address_select">
            <option value="INVALID">Select one</option>
            <option>Option 1</option>
            <option>Option 2</option>
            <option>Option 3</option>
        </select>
    </x-misc.input-group>

    @push('scripts')
        <script>
            window.routes = {{ Js::from(['address' => route('address.create')]) }};
        </script>
    @endpush
</form>
