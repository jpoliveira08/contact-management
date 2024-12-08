<?php

namespace App\Http\Controllers;

use App\DataTransferObject\ContactDto;
use App\Http\Requests\Contact\StoreContactRequest;
use App\Models\Contact;
use App\Services\ContactService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct(protected ContactService $contactService)
    {
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(StoreContactRequest $request)
    {
        $this->contactService->store(ContactDto::fromRequest($request));

        return to_route('home')
            ->with('success', __('messages.success'));
    }
}
