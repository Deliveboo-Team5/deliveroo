@extends('my_layouts.deliveboo')
@section('content')
<div class="container">
    <div class="row">
       @foreach ($categories as $category)
            <div class="col">
                <div class="card category">
                    <span class="category-name">{{$category->name_category}}</span>
                </div>
            </div>
        @endforeach
    </div>
</div>
    
<div class="container">
    <div class="row">
        @foreach ($restaurants as $restaurant)
            <div class="col">
                <a href="{{route('restaurant.show',$restaurant->id)}}"  class="card restaurant">
                    <img class="card-img-top" src="{{ $restaurant->img }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$restaurant->name_restaurant}}</h5>
                        <p class="card-text">
                            @foreach ($restaurant->getCategory as $category)
                            {{ $category->name_category}}
                            @endforeach                          
                        </p>

                       
                    </div>
                </a>
            </div>  
        @endforeach
            
    </div>
</div>
@endsection
