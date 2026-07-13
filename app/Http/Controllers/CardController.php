<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cards = Card::paginate(5);

        return Inertia::render('cards/Index', ['cards' => $cards]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('cards/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'card_number' => 'required|string|size:20|unique:cards,card_number',
            'pin' => 'required|string|size:4',
            'activation_date' => 'required|date',
            'expiration_date' => 'required|date|after:activation_date',
            'balance' => 'required|numeric|min:0'
        ]);

        Card::create($validated);
        return redirect()->route('cards.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Card $card)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Card $card)
    {
        return Inertia::render('cards/Edit', [
            'card' => $card
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Card $card)
    {
        $validated = $request->validate([
            'card_number' => 'required|string|size:20|unique:cards,card_number,' . $card->id,
            'pin' => 'required|string|size:4',
            'balance' => 'required|numeric|min:0'
        ]);

        $card->update($validated);
        return redirect()->route('cards.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Card $card)
    {
        $card->delete();
        return redirect()->route('cards.index');
    }
}
