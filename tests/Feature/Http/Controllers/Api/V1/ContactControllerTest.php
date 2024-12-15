<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Controllers\Api\V1;

use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ContactControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function can_get_all_contacts(): void
    {
        $contact = Contact::factory()->create();

        $response = $this->getJson(route('api.contacts.index'));

        $response->assertOk();

        $response->assertJson([
            'data' => [
                [
                    'id' => $contact->id,
                    'name' => $contact->name,
                    'email' => $contact->email,
                    'contact' => $contact->contact,
                ]
            ]
        ]);
    }
}
