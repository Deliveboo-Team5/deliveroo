@extends('my_layouts.deliveboo')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1>{{$restaurant->name_restaurant}}</h1>
                @foreach ($restaurant->getCategory as $restCategory)
                <p>{{$restCategory->name_category}}</p>
                @endforeach
                <p>{{$restaurant->address}}</p>
                <p>{{$restaurant->phone}}</p>

            </div>
            <div class="col-4">
                <img class="img-restaurant" src="{{$restaurant->img}}" alt="">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-8 d-flex flex-wrap">

                @foreach ($restaurant->getFood as $restFood)
                <div class="col-6">
                    <div class="card food">
                        <h5>{{$restFood->name_food}}</h5>
                        <p>{{$restFood->ingredients}}</p>
                        <div class="price">{{$restFood->price}}€</div>
                    </div>
                </div>
                @endforeach
            </div>
                    
            <div class="col-4">
                <h1 class="text-center">Carrello</h1>
            </div>
        </div>
    </div>
@endsection