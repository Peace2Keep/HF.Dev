@extends('layout')

@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Price models</h1>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Price</td>
          <td>Tax</td>
          <td>BTW</td>
          <td>Category</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($prices as $price)
        <tr>
            <td>{{$price->id}}</td>
            <td>{{$price->price}}</td>
            <td>{{$price->tax}}</td>
            <td><?php echo e($price->price)*($price->tax); ?></td>
            <td>{{$price->category->name}}</td>
            <td>
                <a href="{{ route('prices.edit',$price->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('prices.destroy', $price->id)}}" method="post">
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
  <a href="/prices/create">New price model</a>
</div>
@endsection