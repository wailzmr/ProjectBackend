<?php

namespace Database\Factories;

use App\Models\ContactMessage;
use App\Models\ContactMessageReply;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ContactMessageReply>
 */
class ContactMessageReplyFactory extends Factory
{
    protected $model = ContactMessageReply::class;

    public function definition(): array
    {
        return [
            'contact_message_id' => ContactMessage::factory(),
            'user_id' => User::factory(),
            'is_admin' => false,
            'reply' => $this->faker->paragraph(),
        ];
    }

    public function admin(): self
    {
        return $this->state(fn () => ['is_admin' => true]);
    }
}

