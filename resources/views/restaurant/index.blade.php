@extends('my_layouts.deliveboo')
@section('content')
<div class="container">
    <h3>Categorie</h3>
    <div class="row">
        <div class="col category-container">
            @foreach ($categories as $category)
                <div class="card category">
                    <span class="category-name">{{$category->name_category}}</span>
                </div>
            @endforeach
        </div>
    </div>
</div>
    
<div class="container">
    <h3>Ristoranti</h3>
    <div class="row">
        @foreach ($restaurants as $restaurant)
            <div class="col">
                <a href="{{route('restaurant.show',$restaurant->id)}}"  class="card restaurant">
                    <img class="card-img-top" src="{{ $restaurant->img }}" alt="Restaurant picture">
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