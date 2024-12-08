<?php

namespace App\Services;

use App\DataTransferObject\ContactDto;
use App\Models\Contact;

class ContactService
{
    public function store(ContactDto $contactDto)
    {
        $contact = Contact::create([
           'name' => $contactDto->name,
           'email' => $contactDto->email,
           'contact' => $contactDto->contact,
        ]);
    }

    public function update(ContactDto $contactDto, Contact $contact)
    {
        $contact->update([
            'name' => $contactDto->name,
            'email' => $contactDto->email,
            'contact' => $contactDto->contact,
        ]);
    }

    public function delete(Contact $contact)
    {
        $contact->delete();
    }
}
