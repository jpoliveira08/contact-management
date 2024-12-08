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
}
