<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CreateTicketRequest;
use App\Http\Resources\Api\TicketResource;
use App\Services\TicketService;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function __construct( private TicketService $ticketService){

    }
    public function store(CreateTicketRequest $request){
        $ticket = $this->ticketService->createTicket(
            customerId: $request->user()->id,
            subject: $request->input('subject'),
            description: $request->input('description')
        );
        return ApiResponse::success(data: new TicketResource($ticket),
            message: 'Ticket created successfully',statusCode: 201);
    }
}
