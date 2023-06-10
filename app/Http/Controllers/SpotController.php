<?php

namespace App\Http\Controllers;

use App\Models\Spot;
use App\Models\Booking;
use App\Models\Ticket;
use App\Http\Requests\SpotBookingRequest;





use Illuminate\Http\Request;

class SpotController extends Controller
{
    public function index()
    {
        $spots = Spot::all();
        return view('spots.index', compact('spots'));
    }

    public function create()
    {
        return view('spots.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'capacity' => 'required|integer|min:0',
        ]);

        Spot::create($validatedData);

        return redirect()->route('spots.index')->with('success', 'Spot created successfully.');
    }

    public function edit(Spot $spot)
    {
        return view('spots.edit', compact('spot'));
    }

    public function update(Request $request, Spot $spot)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'capacity' => 'required|integer|min:0',
        ]);

        $spot->update($validatedData);

        return redirect()->route('spots.index')->with('success', 'Spot updated successfully.');
    }

    public function destroy(Spot $spot)
    {
        $spot->delete();

        return redirect()->route('spots.index')->with('success', 'Spot deleted successfully.');
    }

    public function bookForm(Spot $spot)
{
    return view('spots.booking-form', compact('spot'));
}

public function book(Spot $spot, SpotBookingRequest $request)
{
    $validatedData = $request->validated();

    // Create the booking
    $booking = Booking::create($validatedData);

    // Generate a unique ticket ID
    $ticketId = $this->generateTicketId();

    // Create the ticket and associate it with the booking
    $ticket = new Ticket([
        'ticket_id' => $ticketId,
    ]);

    $booking->ticket()->save($ticket);

    // Optionally, you can perform additional actions like sending confirmation emails, etc.

    return redirect()->route('spots.index')->with('success', 'Spot booked successfully. Ticket ID: ' . $ticketId);
}

private function generateTicketId()
{
    // Generate a unique ticket ID using any desired logic
    // You can use libraries like UUID or custom logic based on your requirements
    return 'TICKET-' . uniqid();
}

}
