
it('forbids a user from seeing another user\'s contact message thread', function () {
    $userA = User::factory()->create();
    $userB = User::factory()->create();

    $message = ContactMessage::factory()->for($userB)->create();

    $this->actingAs($userA)
        ->get(route('contacts.thread', $message))
        ->assertForbidden();
});

it('shows only the authenticated user\'s contact messages in the user index', function () {
    $userA = User::factory()->create();
    $userB = User::factory()->create();

    $messageA = ContactMessage::factory()->for($userA)->create(['subject' => 'A subject']);
    $messageB = ContactMessage::factory()->for($userB)->create(['subject' => 'B subject']);

    $this->actingAs($userA)
        ->get(route('contacts.user.index'))
        ->assertOk()
        ->assertSee('A subject')
        ->assertDontSee('B subject');
});
