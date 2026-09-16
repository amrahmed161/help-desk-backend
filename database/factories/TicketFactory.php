<?php

namespace Database\Factories;

use App\Enums\TicketPriority;
use App\Enums\TicketStatus;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Ticket>
 */
class TicketFactory extends Factory
{
    protected $model = Ticket::class;
    public function definition(): array
    {
        return [
            'customer_id' => User::factory()->customer(),
            'agent_id' => null,
            'subject' => fake()->sentence(6),
            'description' => fake()->paragraph(),
            'status'=> TicketStatus::OPEN,
            'priority' => TicketPriority::MEDIUM
        ];
    }
}
