<?php

namespace App\Http\Controllers;

use App\Models\Event;
// use App\Traits\EventTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    // use EventTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderBy('created_at', 'desc')->paginate(5);
        return view('index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required',
            'startAt' => 'required',
            'endAt' => 'required'
        ]);

        if ($validator->fails())
        {
            return redirect()->route('events.create')->withErrors($validator); // redirect to "create" form when validation fails
        }
        
        Event::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'startAt' => $request->startAt,
            'endAt' => $request->endAt
            
        ]); // store event to db

        session()->flash('success', 'Event created successfully');

        return redirect()->route('events.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $events = Event::find($id);
        return view('show', compact('events'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $events = Event::find($id); // displays selected existing event
        return view('edit', compact('events'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required',
            'startAt' => 'required',
            'endAt' => 'required'
        ]);

        if ($validator->fails())
        {
            return redirect()->route('events.edit', ['event'=>$id])->withErrors($validator);
        } // redirect to edit page when validation fails

        $events = Event::findOrFail($id);
        $events->update($request->all());  // modify event list's content

        session()->flash('success', 'Event updated successfully');

        return redirect()->route('events.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Event::where('uuid',$id)->delete(); // remove selected existing todo list

        session()->flash('success', 'Event removed successfully');

        return redirect()->route('events.index');
    }
}
