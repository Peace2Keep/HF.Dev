@extends('layout')

@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Categories</h1>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Price</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->price}}</td>
            <td>
                <a href="{{ route('categories.edit',$category->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('categories.destroy', $category->id)}}" method="post">
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
  <a href="/categories/create">New Category</a>
</div>
@endsection