@extends ('layouts/layout')

@section('title')
    All Sellers
@endsection
@section('content')
<h2 class="d-inline-block me-2">All Sellers </h2>
<a class="btn btn-primary d-inline-block" href="{{route('sellers_create')}}"> Add New Seller</a>

<hr>
<div class="row">
    @foreach ($sellers as $seller)
    <div class="col-md-6 col-lg-4 p-2">
        <div class="card " >
            <img src="uploads/sellers/{{$seller->img}}" class="card-img-top" alt="{{$seller->name}}">
            <div class="card-body">
                <h5 class="card-title"> ID : {{$seller->id}} </h5>
                <p class="card-text">Name : {{$seller->name}}</p>
                <h5 class="card-text text-primary">Email : {{$seller->email}}</h5>
                <a class="btn btn-primary" href="{{route('sellers_show',$seller->id)}}">Details</a>
                <a class="btn btn-info" href="{{route('sellers_edit',$seller->id)}}">Edit</a>
                <a class="btn btn-danger" href="{{route('sellers_delconfirm',$seller->id)}}">Delete</a>
            </div>
        </div>  
    </div>
    @endforeach
</div>

 {{$sellers->links()}}

@endsection
