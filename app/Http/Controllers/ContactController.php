<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\DataTransferObject\ContactDto;
use App\Http\Requests\Contact\StoreContactRequest;
use App\Http\Requests\Contact\UpdateContactRequest;
use App\Models\Contact;
use App\Services\ContactService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function __construct(protected ContactService $contactService)
    {
    }

    public function show(Contact $contact): View
    {
        return view('contacts.show', compact('contact'));
    }

    public function create(): View
    {
        return view('contacts.create');
    }

    public function store(StoreContactRequest $request)
    {
        $this->contactService->store(ContactDto::fromRequest($request));

        return to_route('dashboard')
            ->with('success', __('messages.success'));
    }

    public function edit(Contact $contact): View
    {
        return view('contacts.edit', compact('contact'));
    }

    public function update(UpdateContactRequest $request, Contact $contact)
    {
        $this->contactService->update(ContactDto::fromRequest($request), $contact);

        return to_route('dashboard')
            ->with('success', __('messages.success'));
    }

    public function delete(Contact $contact)
    {
        return view('contacts.delete', compact('contact'));
    }

    public function destroy(Contact $contact)
    {
        $this->contactService->delete($contact);

        return to_route('dashboard')
            ->with('success', __('messages.success'));
    }
}
