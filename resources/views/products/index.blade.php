@extends ('layouts/layout')

@section('title')
    All Products
@endsection
@section('content')
<h2 class="d-inline-block me-2">All Products </h2>
<a class="btn btn-primary d-inline-block" href="{{route('products_create')}}"> Add New Product</a>

<hr>
<div class="row">
    @foreach ($prods as $prod)
    <div class="col-md-6 col-lg-4 p-2">
        <div class="card " >
            <img src="uploads/products/{{$prod->img}}" class="card-img-top" alt="{{$prod->title}}">
            <div class="card-body">
                <h5 class="card-title">{{$prod->id}} : {{$prod->title}}</h5>
                <p class="card-text">{{$prod->descreption}}</p>
                <h5 class="card-text text-primary">$ {{$prod->price}}</h5>
                <a class="btn btn-primary" href="{{route('products_show',$prod->id)}}">Details</a>
                <a class="btn btn-info" href="{{route('products_edit',$prod->id)}}">Edit</a>
                <a class="btn btn-danger" href="{{route('products_delconfirm',$prod->id)}}">Delete</a>
            </div>
        </div>  
    </div>
    @endforeach
</div>

 {{$prods->links()}}

@endsection
    <!-- @foreach ($prods as $prod )
    <h4>{{$prod->id}} - {{$prod->title}}</h4> 
        <p>category : {{$prod->category}}</p>
        <p>price {{$prod->price}}</p>
        <a class="btn btn-primary" href="{{route('products_show',$prod->id)}}">Details</a>
        <a class="btn btn-info" href="#">Edit</a>
        <a class="btn btn-danger" href="#">Delete</a>

    @endforeach -->