<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_renders_contact_create_view_for_authenticated_user()
    {
        $user = User::factory()->create();

        $this
            ->actingAs($user)
            ->get(route('contacts.create'))
            ->assertStatus(200)
            ->assertViewIs('contacts.create');
    }

    public function test_create_contact(): void
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->followingRedirects()
            ->post(route('contacts.store'), [
            'name' => 'John Doe',
            'contact' => '123456789',
            'email' => 'john@doe.com',
        ]);

        $contact = Contact::first();

        $this->assertEquals(1, Contact::count());
        $this->assertEquals('John Doe', $contact->name);
        $this->assertEquals('123456789', $contact->contact);
        $this->assertEquals('john@doe.com', $contact->email);

        $response->assertSeeText(__('messages.success'));
        $this->assertEquals(route('home'), url()->current());
    }

    public function test_it_only_allows_authenticated_users_create_contacts()
    {
        $response = $this->post(route('contacts.store'), [
            'name' => 'John Doe',
            'contact' => '123456789',
            'email' => 'john@doe.com',
        ]);

        $contact = Contact::first();

        $this->assertEquals(0, Contact::count());
    }
}
