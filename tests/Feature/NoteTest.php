<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\{Note, User};

class NoteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Check if unauthorized users are redirected after trying to access
     * the note creation page
     */
    public function testRedirectUnauthorizedFromShowingCreate()
    {
        $res = $this->get(route('note.create'));
        $res->assertRedirect(route('home'));
    }

    /**
     * Check if unauthorized user is redirected after trying to create a note
     *
     * Even if we pass user_id (implicitly from the factory), this
     * should not work because user_id has to be taken from session
     *
     * @return void
     */
    public function testForbidUnauthorizedNoteCreation()
    {
        $this->post(route('note.store'), (array) Note::factory()->make())
             ->assertRedirect(route('home'));
    }

    /**
     * Check if a guest is redirected when trying to edit a note
     */
    public function testForbidGuestEdit()
    {
        $note = Note::factory()->create();
        $this->get(route('note.edit', $note))
             ->assertRedirect(route('home'));
    }

    /**
     * Check if authorized user is allowed (not redirected) to edit their note
     */
    public function testAllowAuthorizedEdit()
    {
        $user = User::factory()->create();
        $note = Note::factory()->state([
            'user_id' => $user->id,
        ])->create();
        $this->actingAs($user)
             ->get(route('note.edit', $note))
             ->assertStatus(200);
    }

    /**
     * Check if unauthorized user is redirected after trying to edit a foreign
     * note
     */
    public function testForbidUnauthorizedUserEdit()
    {
        $user = User::factory()->create();
        $note = Note::factory()->create();
        $this->actingAs($user)
             ->get(route('note.edit', $note))
             ->assertRedirect(route('home'));
    }
}
