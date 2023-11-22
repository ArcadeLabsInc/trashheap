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
  'memory_id' => null, // add memory_id field to the created agent
]);return response()->json([
      'name' => $name,
    ], 201);
  }
}
