<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\DataTransferObject\ContactDto;
use App\Http\Requests\Contact\StoreContactRequest;
use App\Models\Contact;
use App\Services\ContactService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function __construct(protected ContactService $contactService)
    {
    }

    public function create(): View
    {
        return view('contacts.create');
    }

    public function show(Contact $contact): View
    {
        return view('contacts.show', compact('contact'));
    }

    public function store(StoreContactRequest $request)
    {
        $this->contactService->store(ContactDto::fromRequest($request));

        return to_route('home')
            ->with('success', __('messages.success'));
    }
}
