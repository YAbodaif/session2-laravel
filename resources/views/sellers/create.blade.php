@extends('layouts/layout')

@section('title')
    Add Product
@endsection

@section('content')

@include ('inc.error')
<div class="m-3 p-3 border border-2 bg-dark-subtle">

<form class="row g-3" method="post" action="{{route('products_store')}}" enctype="multipart/form-data">
    @csrf
  <div class="col-md-6">
    <label for="inputTitle" class="form-label">Title</label>
    <input type="text" value="{{old('title')}}" name="title" class="form-control" id="inputTitle"> 
  </div>
  <div class="col-md-6">
    <label for="inputResc" class="form-label">Description</label>
    <input type="text" value="{{old('description')}}" name="description" class="form-control" id="inputDesc">
  </div>
  <div class="col-6">
    <label for="inputPrice" class="form-label">Price</label>
    <input type="number" value="{{old('price')}}" name="price"  class="form-control" id="inputPrice" >
  </div>

  <div class="col-md-6">
      <label for="inputCat" class="form-label">Category</label>
      <select id="inputCat" value="{{old('category')}}" name="category" class="form-select">
        @foreach ($cat as $x )
          @if($x->first)
          <option selected value="{{$x->category}}">{{$x->category}}</option>
          @else
          <option  value="{{$x->category}}">{{$x->category}}</option>
          @endif
        @endforeach
      </select>
  </div>

  <div class="col-6">
    <label for="inputImg" class="form-label">Product Image</label>
    <input type="file"  name="img"  class="form-control" id="inputImg" >
  </div>
  
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{route('products_index')}}" class="btn btn-info">cancel</a>
  </div>
</form>

</div>
@endsection