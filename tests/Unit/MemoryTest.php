<?php

use App\Models\Memory;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;

it('can create a memory', function() {$memory = Memory::factory()->create([
    'description' => 'Test description',
    'last_accessed' => null,
]);
```

Explanation: The `Memory` model is using a factory to create instances, so the test should also use the factory instead of manually creating an instance. This ensures that the data being tested is consistent with the data being created in other parts of the codebase.$this->assertDatabaseHas('memories', [
        'description' => 'Test description',
        'last_accessed' => null
    ]);
});

it('can update a memory', function() {
    $memory = Memory::create([
        'description' => 'Test description',
        'last_accessed' => null,
    ]);

    $memory->update([
        'description' => 'Updated description',
        'last_accessed' => Carbon::now(),
    ]);

    $this->assertDatabaseHas('memories', [
        'description' => 'Updated description',
    ]);
});

it('can delete a memory', function() {
    $memory = Memory::create([
        'description' => 'Test description',
        'last_accessed' => null,
    ]);

    $memory->delete();

    $this->assertDatabaseMissing('memories', ['id' => $memory->id]);
});
