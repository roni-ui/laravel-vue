<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Inertia\Inertia;

use function Laravel\Prompts\text;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::query()->latest()->get();
        return Inertia::render("Event/Index", ["events"=>$events]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render("Event/Create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $this->validate($request, [
            "title" => ["string","max:30", "required"],
            "description" => ["string", "required"],
            "location" => ["string", "required"],
            "datetime" => ["date", "required"]
        ]);

        Event::create($validated);

        return redirect("/events")->with("notif", "Berhasil menambahkan Data");
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return Inertia::render("Event/Edit", ["event"=>$event]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $event = Event::findOrFail($id);

        $validated = $this->validate($request, [
            "title" => ["string","max:30", "required"],
            "description" => ["string", "required"],
            "location" => ["string", "required"],
            "datetime" => ["date", "required"]
        ]);

        $event->update($validated);
        return redirect("/events")->with("notif", "Berhasil mengedit Data");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect("/events")->with("notif", "Berhasil menghapus Data");
    }
}
