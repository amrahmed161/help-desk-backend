<?php

namespace App\Models;

use App\Enums\TicketPriority;
use App\Enums\TicketStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
        use HasFactory;
    protected $fillable = [
        'customer_id',
        'agent_id',
        'subject',
        'description',
        'status',
        'priority',
    ];
    protected function casts(): array{
        return [
            'status'=> TicketStatus::class,
            'priority'=> TicketPriority::class,
        ];
    }
    public function customer():BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }
}
