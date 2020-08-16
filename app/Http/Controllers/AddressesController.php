<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Contact;
use App\Http\Requests\CreateAddress;
use App\Http\Requests\UpdateAddress;

class AddressesController extends Controller
{
    public function index(Contact $contact)
    {
        $addresses = $contact->addresses()->paginate(15);

        return view('addresses.index', compact('addresses', 'contact'));
    }

    public function create(Contact $contact)
    {
        $address = new Address;
        return view('addresses.create', compact('contact', 'address'));
    }

    public function store(CreateAddress $request, Contact $contact)
    {
        $address = array_merge($request->all(), ['contact_id' => $contact->id]);
        Address::create($address);

        return response()->redirectToRoute('addresses', ['contact'=> $contact->id])->with('alert', 'Address Created!');
    }

    public function edit(Address $address)
    {
        return view('addresses.edit', compact('address'));
    }

    public function update(UpdateAddress $request, Address $address)
    {
        $address->update($request->all());

        return response()->redirectToRoute('addresses', ['contact'=> $address->contact])->with('alert', 'Address updated!');
    }
}
