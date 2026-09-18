<?php

namespace App\Services;

use App\Models\Ticket;

class TicketService
{
    /**
     * Create a new class instance.
     */
    public function createTicket(
        int $customerId,
        string $subject,
        string $description
    ): Ticket{
        return Ticket::create([
            'customer_id' => $customerId,
            'subject' => $subject,
            'description' => $description
        ]);
    }
}
