@extends('layout')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add a Price model</h1>
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
      <form method="post" action="{{ route('prices.store') }}">
          @csrf
          <div class="form-group">    
              <label for="price">Price:</label>
              <input type="text" class="form-control" name="price"/>
          </div>
          <div class="form-group">
              <label for="tax">Tax:</label>
              <input type="text" class="form-control" name="tax"/>
          </div>                         
          <div>
              <label for="category_id">Category:</label>
              <select class="form-control" name="category_id">
                @foreach($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
              </select>
          </div>
          <button type="submit" class="btn btn-primary-outline">Add Price model</button>
      </form>
  </div>
</div>
</div>
@endsection