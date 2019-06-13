@extends('layout')

@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Rooms</h1>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Desciption</td>
          <td>category</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($rooms as $room)
        <tr>
            <td>{{$room->id}}</td>
            <td>{{$room->name}}</td>
            <td>{{$room->description}}</td>
            <td>{{$room->category->name}}</td>
            <td>
                <a href="{{ route('rooms.edit',$room->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('rooms.destroy', $room->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
  <a href="/rooms/create">New room</a>
</div>
@endsection