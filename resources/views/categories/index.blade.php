@extends ('layouts/layout')

@section('title')
    All Categories
@endsection
@section('content')
<h2>Categories</h2>
<a class="btn btn-primary" href="{{route('categories_create')}}">Add New Category</a>

<hr>
<div class="">
    @foreach ($cats as $cat)
        <h5 class="">Id : {{$cat->id}} </h5>
        <p class="">Name : {{$cat->name}}</p>
        <a class="btn btn-primary" href="{{route('categories_show',$cat->id)}}">Details</a>
        <a class="btn btn-info" href="{{route('categories_edit',$cat->id)}}">Edit</a>
        <a class="btn btn-danger" href="{{route('categories_delconfirm',$cat->id)}}">Delete</a>
    @endforeach
</div>
<br>
<hr>
 {{$cats->links()}}

@endsection
