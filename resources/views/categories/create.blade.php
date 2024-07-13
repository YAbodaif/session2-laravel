@extends('layouts/layout')

@section('title')
    Add Category
@endsection

@section('content')

@include ('inc.error')
<div class="m-3 p-3 border border-2 bg-info">

<form class="row g-3" method="post" action="{{route('categories_store')}}" >
    @csrf
  <div class="col-md-6">
    <label for="inputTitle" class="form-label">Name</label>
    <input type="text" value="{{old('name')}}" name="name" class="form-control" id="inputTitle"> 
  </div>



  
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{route('categories_index')}}" class="btn btn-info">cancel</a>
  </div>
</form>

</div>
@endsection