<?php

use App\Models\ForumPost;
use App\Models\ForumThread;
use App\Models\User;

it('allows a user to edit their own post', function () {
    $user = User::factory()->create();
    $thread = ForumThread::create(['user_id' => $user->id, 'title' => 't']);
    $post = ForumPost::create(['thread_id' => $thread->id, 'user_id' => $user->id, 'body' => 'old']);

    $this->actingAs($user)
        ->patch(route('forum.posts.update', $post), ['body' => 'new body'])
        ->assertRedirect(route('forum.show', $thread));

    $this->assertDatabaseHas('forum_posts', [
        'id' => $post->id,
        'body' => 'new body',
    ]);
});

it('forbids a user to edit someone else\'s post', function () {
    $userA = User::factory()->create();
    $userB = User::factory()->create();

    $thread = ForumThread::create(['user_id' => $userB->id, 'title' => 't']);
    $post = ForumPost::create(['thread_id' => $thread->id, 'user_id' => $userB->id, 'body' => 'old']);

    $this->actingAs($userA)
        ->patch(route('forum.posts.update', $post), ['body' => 'hack'])
        ->assertForbidden();
});

it('allows a user to delete their own post', function () {
    $user = User::factory()->create();
    $thread = ForumThread::create(['user_id' => $user->id, 'title' => 't']);
    $post = ForumPost::create(['thread_id' => $thread->id, 'user_id' => $user->id, 'body' => 'hello']);

    $this->actingAs($user)
        ->delete(route('forum.posts.destroy', $post))
        ->assertRedirect(route('forum.show', $thread));

    $this->assertDatabaseMissing('forum_posts', ['id' => $post->id]);
});

it('allows an admin to delete someone else\'s post', function () {
    $admin = User::factory()->create(['is_admin' => true]);
    $user = User::factory()->create();

    $thread = ForumThread::create(['user_id' => $user->id, 'title' => 't']);
    $post = ForumPost::create(['thread_id' => $thread->id, 'user_id' => $user->id, 'body' => 'hello']);

    $this->actingAs($admin)
        ->delete(route('forum.posts.destroy', $post))
        ->assertRedirect(route('forum.show', $thread));

    $this->assertDatabaseMissing('forum_posts', ['id' => $post->id]);
});

it('forbids a user to delete someone else\'s post', function () {
    $userA = User::factory()->create();
    $userB = User::factory()->create();

    $thread = ForumThread::create(['user_id' => $userB->id, 'title' => 't']);
    $post = ForumPost::create(['thread_id' => $thread->id, 'user_id' => $userB->id, 'body' => 'hello']);

    $this->actingAs($userA)
        ->delete(route('forum.posts.destroy', $post))
        ->assertForbidden();
});

