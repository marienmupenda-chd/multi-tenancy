<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\TicketRequest;
use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        //
        return TicketResource::collection(Ticket::all());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TicketRequest $request
     * @return TicketResource
     */
    public function store(TicketRequest $request)
    {
        //
        $ticket = Ticket::create($request->all());

        return new TicketResource($ticket);
    }

    /**
     * Display the specified resource.
     *
     * @param Ticket $ticket
     * @return TicketResource
     */
    public function show(Ticket $ticket)
    {
        //

        return new TicketResource($ticket);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TicketRequest $request
     * @param Ticket $ticket
     * @return TicketResource
     */
    public function update(TicketRequest $request, Ticket $ticket)
    {
        //

        $ticket->title = $request->title;
        $ticket->issue = $request->issue;
        $ticket->contact = $request->contact;
        $ticket->status = $request->status;
        $ticket->save();

        return new TicketResource($ticket);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Ticket $ticket
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Ticket $ticket)
    {
        //

        return response()->json($ticket->delete(), 202);
    }
}
