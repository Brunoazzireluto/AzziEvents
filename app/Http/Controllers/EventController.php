<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;


class EventController extends Controller
{
    public function index()
    {
        $search = request('search');

        if($search)
        {
            $events = Event::where([
                ['title', 'like', '%' . $search . '%']
            ])->get();
        }else
        {
            $events = Event::all();
        }


        return view('welcome',[ "events" => $events, 'search'=>$search]);
    }

    public function create()
    {
        return view("events.create");
    }

    public function store(request $request)
    {
        $event = new Event;
        $event->title = $request->title;
        $event->date = $request->date;
        $event->description = $request->description;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->items = $request->items;

        //image upload
        if($request->hasFile('image') && $request->file('image')->isValid() )
        {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->Move(public_path('img/events'), $imageName);

            $event->image = $imageName;
        }

        $user = auth()->user();
        $event->user_id = $user->id;

        $event->save();

        return redirect("/")->with('msg', 'Evento criado com sucesso!');
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);

        $user = auth()->user();
        $hasUserJoined = false;

        if($user)
        {
            $userEvents = $user->eventsAsParticipant->toArray();
            foreach($userEvents as $userEvent)
            {
                if($userEvent['id'] == $id)
                {
                    $hasUserJoined = true;
                }
            }
        }

        $eventOwner = User::where('id', $event->user_id)->first()->toArray();
        return view('events.show',
        [
            'event' => $event,
            'eventOwner' => $eventOwner,
            'hasUserJoined' => $hasUserJoined
        ]);
    }

    public function dashboard()
    {
        $user = auth()->user();

        $events = $user->events;

        $eventsAsParticipant = $user->eventsAsParticipant;

        return view('events.dashboard', ['events' => $events, 'eventsAsParticipant' => $eventsAsParticipant]);
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id)->delete();
        return redirect("/dashboard")->with('msg', 'Evento excluído com sucesso!');
    }

    public function edit($id)
    {   $user = auth()->user();
        $event = Event::findOrFail($id);

        if($user->id != $event->user_id)
        {
            return redirect("/dashboard")->with('msg', 'Você não tem permissão para editar este evento!');
        }
        return view('events.edit', ['event' => $event]);
    }

    public function update(request $request)
    {
        $data = $request->all();
        if($request->hasFile('image') && $request->file('image')->isValid() )
        {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->Move(public_path('img/events'), $imageName);

            $data['image'] = $imageName;
        }
        Event::findOrFail($request->id)->update($data);
        return redirect("/dashboard")->with('msg', 'Evento editado com sucesso!');

    }

    public function joinEvent($id)
    {
        $user = auth()->user();
        $user->eventsAsParticipant()->attach($id);
        $event = Event::findOrFail($id);
        return redirect("/dashboard")->with('msg', "sua presença no evento: $event->title está confirmada!");

    }

    public function leaveEvent($id)
    {
        $user = auth()->user();
        $user->eventsAsParticipant()->detach($id);
        $event = Event::findOrFail($id);
        return redirect("/dashboard")->with('msg', "sua presença no evento: $event->title foi Removida!");
    }

}
