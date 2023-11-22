<?php

use App\Models\Agent;
use App\Models\File;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;it('has many agents', function () {
  $user = User::factory()->create();
  // Create multiple agents for the user
  $agents = Agent::factory(3)->create(['user_id' => $user->id]);

  // Check if the user has a collection of agents
  $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $user->agents);

  // Check if the first agent in the collection is an instance of the Agent model
  $this->assertInstanceOf(Agent::class, $user->agents->first());
});it('has many conversations', function () {
  $user = User::factory()->create();
  $conversation = Conversation::factory()->create(['user_id' => $user->id]);

  $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $user->conversations);
  $this->assertInstanceOf(Conversation::class, $user->conversations->first());
});

it('has many messages', function () {
  $user = User::factory()->create();
  $conversation = Conversation::factory()->create(['user_id' => $user->id]);
  $message = Message::factory()->create(['user_id' => $user->id, 'conversation_id' => $conversation->id]);

  $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $user->messages);
  $this->assertInstanceOf(Message::class, $user->messages->first());
});

it('has many files', function () {
  $user = User::factory()->create();
  $file = File::factory()->create(['user_id' => $user->id]);

  $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $user->files);
  $this->assertInstanceOf(File::class, $user->files->first());
});
