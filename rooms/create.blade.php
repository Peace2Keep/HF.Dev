@extends('layout')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add a Room</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('rooms.store') }}">
          @csrf
          <div class="form-group">    
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="description">Description:</label>
              <textarea type="text" class="form-control" name="description"></textarea>
          </div>                         
          <div>
              <label for="category_id">Category:</label>
              <select class="form-control" name="category_id">
                @foreach($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
              </select>
          <div>
              <label for="tag_id">Tags:</label>
              <!-- <input type="checkbox" class="form-control" name="tag_id"/> -->
              @foreach($tags as $tag)
              <div>
                <label><input type="checkbox" name="tag_ids[]" value="{{$tag->id}}">{{$tag->name}}</label>
              </div>
              @endforeach
          </div>
              
          </div>
          <button type="submit" class="btn btn-primary-outline">Add Room</button>
      </form>
  </div>
</div>
</div>
@endsection