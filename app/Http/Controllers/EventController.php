<?php

namespace App\Http\Controllers;

use App\Models\Event;

use Illuminate\Http\Request;

class EventController extends Controller
{
    //index action
    public function Index()
    {
        $search = request('search');

        if($search) {
            $events = Event::where([
                ['title', 'like', '%' . $search . '%']
            ])->get();
        } else {
            $events = Event::all();
        }
        
        return view('welcome', ['events'=>$events, 'search' => $search]);
    }

    public function create()
    {
        return view('events.create');
    }


    public function store(Request $request)
    {
        $event = new Event();

        $event->title = request('title');
        $event->description = request('description');
        $event->city = request('city');
        $event->private = request('private');
        $event->items = request('items');
        $event->date = request('date');

        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . "." . $extension;
            $requestImage->move(public_path('img/events'), $imageName);
            $event->image = $imageName;
        }
        
        $user = auth()->user();
        $event->user_id = $user->id;

        $event->save();
        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }

    public function delete($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect('/')->with('msg', 'Evento excluído com sucesso!');
    }

    public function show ($id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', ['event' => $event]);
    }
}
