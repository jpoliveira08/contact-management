<?php

declare(strict_types=1);

namespace App\DataTransferObject;

use Illuminate\Foundation\Http\FormRequest;

class ContactDto
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $contact,
    )
    {
    }

    public static function fromRequest(FormRequest $request): ContactDto
    {
        return new self(
            name: $request->validated('name'),
            email: $request->validated('email'),
            contact: $request->validated('contact')
        );
    }
}
