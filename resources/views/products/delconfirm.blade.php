@extends ('Layouts/layout')

@section('title')
    Delete Product
@endsection
@section('content')
    <h2>{{$prod->title}} Details</h2>
    <hr>
<div class="row">
    <div class="col-4">
        <h5>Id : {{$prod->id}}</h5><br>
        <h5>Title : {{$prod->title}}</h5><br>
        <h5>Descreption : {{$prod->description}}</h5><br>
        <h5>Category : {{$prod->category}}</h5><br>
        <h5>Quantity : {{$prod->quantity}}</h5><br>
        <h5>Price : {{$prod->price}}</h5><br>
    </div>
    <div class="col-8">
    <img src="../../uploads/products/{{$prod->img}}" class="w-100" alt="{{$prod->title}}">
    </div>
</div>
   
    <hr>
    <div class="alert alert-danger text-center">
        <h4>are you sure you want to delete this product , this step can't be undo </h4>
       <a class="btn btn-danger" href="{{route('products_delete',$prod->id)}}">Yes</a>
       <a class="btn btn-primary" href="{{route('products_index')}}">No</a>
    </div>
@endsection
