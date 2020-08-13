<?php

namespace App\Http\Controllers;

use App\Address;
use App\Contact;
use App\Http\Requests\CreateAddress;
use App\Http\Requests\UpdateAddress;

class AddressController extends Controller
{
    public function index(Contact $contact)
    {
        $addresses = $contact->addresses()->get();

        return view('addresses.index', compact('addresses', 'contact'));
    }

    public function create(Contact $contact)
    {
        return view('addresses.create', compact('contact'));
    }

    public function store(CreateAddress $request)
    {
        Address::create($request->all());

        return response()->redirectToRoute('addresses', ['contact'=> $request->contact_id])->with('alert', 'Address Created!');
    }

    public function edit(Address $address)
    {
        return view('addresses.edit', compact('address'));
    }

    public function update(UpdateAddress $request, Address $address)
    {
        $address->update($request->all());

        return response()->redirectToRoute('addresses', ['contact'=> $address->contact()->pluck('id')])->with('alert', 'Address updated!');
    }
}
