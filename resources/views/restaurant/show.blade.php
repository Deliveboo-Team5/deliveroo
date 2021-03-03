@extends('my_layouts.deliveboo')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1>{{$restaurant->name_restaurant}}</h1>
                <p><strong>Categorie: </strong>
                    @foreach ($restaurant->getCategory as $restCategory)
                        <span>{{$restCategory->name_category}}</span>
                    @endforeach
                </p>
                <p><strong>Indirizzo: </strong>{{$restaurant->address}}</p>
                <p><strong>Telefono: </strong>{{$restaurant->phone}}</p>

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