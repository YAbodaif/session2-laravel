@extends ('Layouts/layout')

@section('title')
    Delete Category
@endsection
@section('content')
    <h2>{{$cat->bame}} Details</h2>
    <hr>
<div >
    <h5>Id : {{$cat->id}}</h5><br>
    <h5>Name : {{$cat->name}}</h5><br>
</div>
   
    <hr>
    <div class="alert alert-danger text-center">
        <h4>are you sure you want to delete this Category , this step can't be undo </h4>
       <a class="btn btn-danger" href="{{route('categories_delete',$prod->id)}}">Yes</a>
       <a class="btn btn-primary" href="{{route('categories_index')}}">No</a>
    </div>
@endsection
