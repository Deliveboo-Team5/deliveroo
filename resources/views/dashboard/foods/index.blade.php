@extends('my_layouts.deliveboo')
@section('content')
<div class="container-fluid">
  <div class="row">
  {{-- left menu --}}
    @include('dashboard.sidebar')

  {{-- right block --}}
    <div class="col-11 col-lg-9">

      <div class="row orders-list d-flex flex-column">
        <h3>Menu</h3>
        <div class="d-flex">
          <button type="button" class="btn btn-primary">Aggiungi un piatto</button>
        </div>

        @foreach($foods as $food)

        {{-- template foods --}}

        <div class="col card">
          <div class="card-body d-flex align-items-baseline justify-content-between flex-wrap">
            <ul class="d-flex flex-wrap">
              <li>ID: <strong>{{$food->id}}</strong></li>
              <li>Nome: <strong>{{$food->name_food}}</strong></li>
              <li>Prezzo: <strong>€{{$food->price}}</strong></li>
              <li>Descrizione: <strong>{{substr($food->ingredients, 0, 50)}}{{ strlen($food->ingredients) > 20 ? '...': ''}}</strong></li>
              <li>Visibile: {{$food->is_visible ? 'SI' : 'NO'}}</li>
            </ul>
            <div>
              <button type="button" class="btn btn-primary">Details</button>
              <button type="button" class="btn btn-primary">Edit</button>
              <button type="button" class="btn btn-danger">Delete</button>
            </div>
          </div>
        </div>


        {{-- edit form --}}
        <div class="col card ">
          <div class="d-flex flex-column">
            <div class="card-body d-flex align-items-baseline justify-content-end">
                <button type="button" class="btn btn-secondary">Cancela edizione</button>
            </div>
            <div class="order-details">
              <form class="d-flex flex-column" action="{{route('foods.update', $food->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                  <label for="food_name" class="form-label">Nome:</label>
                  <input name="food_name" type="text" class="form-control" id="food_name" value="{{$food->name_food}}">
                </div>
                <div class="mb-3">
                  <label for="food_description" class="form-label">Descrizione:</label>
                  <textarea name="ingredients" class="form-control" id="food_description">{{$food->ingredients}}</textarea>
                </div>
                <div class="mb-3">
                  <label for="price" class="form-label">Price €:</label>
                  <input name="price" type="number" class="form-control" id="price" value="{{$food->price}}">
                </div>
                <div class="mb-3">
                  <label for="is_visible" class="form-label">Is Visibile:</label>
                  <input type="radio" id="si" name="is_visible" value="1">
                  <label for="si">SI</label><br>
                  <input type="radio" id="no" name="is_visible" value="0">
                  <label for="no">NO</label><br>
                </div>

                <button type="submit" class="btn btn-primary">Conferma Edizione</button>
              </form>
            </div>
          </div>
        </div>


        {{--end open row--}}
        @endforeach


      </div>
    </div>
  </div>
</div>
@endsection
