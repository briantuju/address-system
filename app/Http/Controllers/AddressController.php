<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAddressRequest;
use App\Http\Requests\UpdateAddressRequest;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('address.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAddressRequest $request)
    {
        $address = Address::create([
            'name' => $request->name,
            'slug' => str($request->name)->slug(),
            'user_id' => auth()->id()
        ]);

        return to_route('address.show', $address)
            ->with('toast_success', 'Address created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Address $address)
    {
        return view('address.show', compact('address'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address)
    {
        $address->delete();

        return to_route('home')
            ->with('toast_info', 'Address deleted successfully');
    }
}
