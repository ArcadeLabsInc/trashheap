<?php


namespace App\Http\Controllers;

use App\Models\Agent;
use Inertia\Inertia;
use Inertia\Response;

class AgentController extends Controller
{
  public function store() {
    request()->validate([
      'name' => 'required',
    ]);

    $name = request('name');// create agent in database
$agent = Agent::create([
  'user_id' => auth()->user()->id,
  'name' => $name,
]);

// associate the agent with a memory instance
$memory = Memory::create([
  'agent_id' => $agent->id,
]);

return response()->json([
  'agent_id' => $agent->id,
], 201);}
}
