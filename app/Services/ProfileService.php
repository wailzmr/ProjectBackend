<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileService
{
    /**
     * Store an uploaded avatar file and return the storage path.
     */
    public function storeAvatar(UploadedFile $file): string
    {
        return $file->store('avatars', 'public');
    }

    /**
     * Update the user's profile with the provided data.
     *
     * @param  User  $user
     * @param  array<string, mixed>  $data
     * @return User
     */
    public function update(User $user, array $data): User
    {
        // If email_verified_at is provided (null when email changed), apply it directly
        if (array_key_exists('email_verified_at', $data)) {
            $user->email_verified_at = $data['email_verified_at'];
            unset($data['email_verified_at']);
        }

        if (isset($data['avatar_path'])) {
            // delete old avatar if present
            if ($user->avatar_path) {
                Storage::disk('public')->delete($user->avatar_path);
            }
        }

        $user->update($data);

        return $user->refresh();
    }
}
