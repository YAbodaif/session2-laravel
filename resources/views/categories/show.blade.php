@extends ('Layouts/layout')

@section('title')
    {{$cat->name}}
@endsection
@section('content')
    <h2>{{$cat->name}} Details</h2>
    <hr>
<div class="">
  
        <h5>Id : {{$cat->id}}</h5><br>
        <h5>Title : {{$cat->name}}</h5><br>
        <h5>Products Of Category</h5>
       
        @if (count($cat->products) >0) 
            @foreach ($cat->products as $prod )
                <ul>
                <li > Id : {{$prod->id}} - title : {{$prod->title}}</li>
                </ul>
            @endforeach
        @else
        <p class="ps-3"> No categories for this Products</p>
        @endif
          
      
  
</div>
    <br>
    <hr>
   
    <a class="btn btn-primary" href="{{route('categories_index')}}">Back</a>
@endsection
