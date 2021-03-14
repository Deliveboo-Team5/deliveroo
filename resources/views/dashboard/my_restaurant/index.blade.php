@extends('my_layouts.deliveboo')
@section('content')
<div class="container">
  <div class="row d-flex justify-content-center">
  <!-- left menu -->
    @include('dashboard.sidebar')

    <div class="col-10 dashboard-main">
      <!-- orders received -->
      <div class="row dashboard d-flex flex-column align-items-center">
        <div class="col">
          <div class="card" style="width: 50%; margin: auto">
            <img src="{{asset($restaurant->img)}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{$restaurant->name_restaurant}}</h5>
              <p class="card-text">Categorie:
                @foreach($restaurant->getCategory as $category)
                {{$category->name_category}}
                @endforeach
              </p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Indirizzo: {{$restaurant->address}}</li>
              <li class="list-group-item">Telefono: {{$restaurant->phone}}</li>
              <li class="list-group-item">P.Iva: {{$restaurant->VAT}}</li>
            </ul>
            <div class="card-body">
              <a href="{{route('restaurant.show', $restaurant->id)}}" class="btn btn-primary">Pagina Ristorante</a>
              <a href="{{route('restaurant.edit', $restaurant->id)}}" class="btn btn-primary">Modifica Informazioni</a>
            </div>
          </div>
        </div>


@endsection
