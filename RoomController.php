<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\Category;
use App\Tag;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();

        return view('rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();


        return view('rooms.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'category_id'=>'required'
        ]);
       // var_dump($request->{'tag_ids'});
        $room = new Room([
            'name' => $request->{'name'},
            'description' => $request->{'description'},
            'category_id' => $request->{'category_id'},

        ]);
        $room->save();
        $room->tags()->sync($request->{'tag_ids'});
        return redirect('rooms')->with('success', 'Room saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('rooms.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $room = Room::findOrFail($id);

        return view('rooms.edit', compact('room', 'categories'));    
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
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'category_id'=>'required'
        ]);

        $room = Room::findOrFail($id);
        $room->name = $request->get('name');
        $room->description = $request->get('description');
        $room->category_id = $request->get('category_id');
        $room->save();

        return redirect('rooms')->with('success', 'Room updated!');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room::find($id);
        $room->delete();

        return redirect('/rooms')->with('success', 'Room deleted!');    }
}
