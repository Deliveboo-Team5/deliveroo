@extends('my_layouts.deliveboo')

@section('content')
    <div class="container">
        @if(session('success_message'))
            <div class="alert alert-success">
                {{ session('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col col_img" style="background-image: url({{asset($restaurant->img)}})" >
            </div>
        </div>
        <div class="row">
            <div class="col-8">

                {{-- Informazioni ristorante --}}
                <h1>{{$restaurant->name_restaurant}}</h1>
                <p class="text-capitalize"><strong>Categoria: </strong>
                    @foreach ($restaurant->getCategory as $restCategory)
                    <span>{{$restCategory->name_category}}</span>
                    @endforeach
                </p>
                <p><strong>Indirizzo: </strong>{{$restaurant->address}}</p>
                <p><strong>Telefono: </strong>{{$restaurant->phone}}</p>

                {{-- Piatti ristorante --}}
                @foreach ($restaurant->getFood as $restFood)
                    <div class="card food row" value="{{$restFood->id}}" v-on:click="addToCart({{$restFood->id}}), refreshTotal()">
                        <div class="col-12 col-md-3 food-img-container" style="background-image: url({{asset($restFood->img)}})">
                        </div>
                        <div class="col-12 col-md-9 d-flex flex-column">
                            <h5 class="text-capitalize">{{$restFood->name_food}}</h5>
                            <span>{{$restFood->ingredients}}</span>
                            <span class="align-self-end">{{number_format($restFood->price, 2, '.', ',')}}€</span>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-4 col-cart">
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
        
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Paga
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Concludi il tuo ordine</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <template>
                                        @include('payment')
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 @endsection

