@extends ('Layouts/layout')

@section('title')
    {{$seller->name}}
@endsection
@section('content')
    <h2>{{$seller->name}} Details</h2>
    <hr>
<div class="row">
    <div class="col-6">
        <h5>Id : {{$seller->id}}</h5><br>
        <h5>Title : {{$seller->name}}</h5><br>
        <h5>Email : {{$seller->email}}</h5><br>
        <h5>Mobile : {{$seller->mobile}}</h5><br>
        <h5>Brand : {{$seller->prand}}</h5><br>
        
        <h5>Products Of Seller</h5>
        @if (count($seller->products) > 0) 
            @foreach ($seller->products as $prod )
                <ul>
                <li > {{$prod->id}}->{{$prod->title}}</li>
                </ul>
            @endforeach
        @else
        <p class="ps-3"> No categories for this Products</p>
        @endif
    </div>
    <div class="col-6">
        <img src="../../uploads/products/{{$seller->img}}" class="w-100" alt="{{$seller->name}}">
    </div>
</div>
   
    <hr>
    <a class="btn btn-primary" href="{{route('sellers_index')}}">Back</a>
@endsection
