@extends('my_layouts.deliveboo')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1>{{$restaurant->name_restaurant}}</h1>
                <p class="text-capitalize"><strong>Categorie: </strong>
                    @foreach ($restaurant->getCategory as $restCategory)
                        <span>{{$restCategory->name_category}}</span>
                    @endforeach
                </p>
                <p><strong>Indirizzo: </strong>{{$restaurant->address}}</p>
                <p><strong>Telefono: </strong>{{$restaurant->phone}}</p>

            </div>
            <div class="col-4">
                <img class="img-restaurant" src="{{asset($restaurant->img)}}" alt="">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-8 d-flex flex-wrap">

                @foreach ($restaurant->getFood as $restFood)
                <div class="col-6">
                    <div class="card food row" value="{{$restFood->id}}" v-on:click="addToCart({{$restFood->id}}), refreshTotal()">
                        <div class="col-9 d-flex flex-column justify-content-between">
                            <h5 class="text-capitalize">{{$restFood->name_food}}</h5>
                            <span>{{$restFood->ingredients}}</span>
                            <span class="align-self-end">{{number_format($restFood->price, 2, '.', ',')}}€</span>
                        </div>
                        <div class="col-3">
                            <img class="food-image" src="{{asset($restFood->img)}}" alt="food image">
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
                    
            <div class="col-4">
                <h1 class="text-center">Carrello</h1>
                <div>
                    <div class="card cart-element" v-for="(element, i) in cart">
                        <div class="d-flex flex-column">
                            <span id="name" class="text-capitalize"><strong>Piatto: </strong>@{{element.name_food}}</span>
                            <span for="name"><strong>Prezzo: </strong>@{{element.price.toFixed(2)}}€</span>
                            <span>
                                <strong>Quantità: </strong>
                                <input class="quantity-input" type="number" name="quantity" id="quantity" min="1" max="10" v-model="element.quantity" v-on:change="refreshTotal()">
                            </span>
                        </div>
                        <div class="remove" v-on:click="removeFromCart(i), refreshTotal()">
                            <i class="fas fa-times-circle"></i>
                        </div>
                    </div>
                    <div v-if="cart.length > 0">
                        <strong>Totale: </strong>@{{totalPrice}}€
                        <button class="btn btn-primary">Paga Subito</button>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection