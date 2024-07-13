@extends('layouts/layout')

@section('title')
    Edit Category
@endsection

@section('content')

@include ('inc.error')
<div class=" m-5">

    <form class=" row g-3" method="post" action="{{route('categories_update',$cat->id)}}" >
        @csrf
      <div class="col-md-12">
        <label for="inputEmail4" class="form-label">Name</label>
        <input type="text" value="{{old('name') ?? $cat->name}}" name="name" class="form-control" id="inputEmail4"> 
      </div>
 
      <div class="col-12">
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{route('categories_index')}}" class="btn btn-info">cancel</a>
      </div>
    </form>



</div>

@endsection