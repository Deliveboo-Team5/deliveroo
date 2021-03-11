@extends('my_layouts.deliveboo')
@section('content')
<div class="container">
  <div class="row">
  {{-- left menu --}}
    @include('dashboard.sidebar')

  {{-- right block --}}
    <div class="col-10">

      <div class="row menu-list d-flex flex-column">
        <h3>Menu</h3>
        <div class="d-flex menu-create">
          <button type="button" class="btn btn-primary"><a href="{{route('foods.create')}}">Aggiungi un piatto</a></button>
        </div>

        @foreach($foods as $food)

        {{-- template foods --}}

        <div class="col card">
          <div class="card-body d-flex align-items-baseline justify-content-between flex-wrap">
            <ul class="d-flex flex-wrap">
              <li>ID: <strong>{{$food->id}}</strong></li>
              <li>Nome: <strong>{{$food->name_food}}</strong></li>
              <li>Prezzo: <strong>€{{number_format($food->price, 2, '.', ',')}}</strong></li>
              <li>Visibile: {{$food->is_visible ? 'SI' : 'NO'}}</li>
            </ul>
            <div>
              <button type="button" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#collapseDetails{{$food->id}}" aria-expanded="false" aria-controls="collapseDetails{{$food->id}}">Dettagli</button>
              <button type="button" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#collapseEdit{{$food->id}}" aria-expanded="false" aria-controls="collapseEdit{{$food->id}}">Modifica</button>
            </div>
          </div>
        </div>

        {{-- details --}}
        <div class="col card collapse" id="collapseDetails{{$food->id}}">
          <div class="d-flex flex-column">
            <div class="order-details">
              <ul class="d-flex flex-column">
                <li>Visibile: {{$food->is_visible ? 'SI' : 'NO'}}</li>
                <li>ID:<strong> {{$food->id}}</strong></li>
                <li>Nome:<strong> {{$food->name_food}}</strong></li>
                <li>Descrizione:<strong> {{$food->ingredients}}</strong></li>
                <li>Prezzo: <strong>€{{number_format($food->price, 2, '.', ',')}}</strong></li>
              </ul>
            </div>
            <div class="card-body d-flex align-items-baseline justify-content-end">
                <button type="button" class="btn btn-secondary" data-bs-toggle="collapse" data-bs-target="#collapseDetails{{$food->id}}" aria-expanded="false" aria-controls="collapseDetails{{$food->id}}">Nascondi dettagli</button>
            </div>
          </div>
        </div>
        {{--end details--}}



        {{-- edit form --}}
        <div class="col card collapse" id="collapseEdit{{$food->id}}">
          <div class="d-flex flex-column">
            <div class="order-details">
              <form class="d-flex flex-column" action="{{route('foods.update', $food->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                  <label for="food_name" class="form-label">Nome:</label>
                  <input name="name_food" type="text" class="form-control" id="food_name" value="{{$food->name_food}}">
                </div>
                <div class="mb-3">
                  <label for="food_description" class="form-label">Descrizione:</label>
                  <textarea name="ingredients" class="form-control" id="food_description">{{$food->ingredients}}</textarea>
                </div>
                <div class="mb-3">
                  <label for="price" class="form-label">Price €:</label>
                  <input name="price" type="text" class="form-control" id="price" value="{{$food->price}}">
                </div>
                <div class="mb-3 d-flex is_visible align-items-baseline">
                  <label for="is_visible" class="form-label">Is Visibile:</label>
                  <input type="radio" id="si" name="is_visible" value="1" {{$food->is_visible ? 'checked' : ''}}>
                  <label for="si">SI</label><br>
                  <input type="radio" id="no" name="is_visible" value="0" {{!$food->is_visible ? 'checked' : ''}}>
                  <label for="no">NO</label><br>
                </div>

                <div class="card-body d-flex align-items-baseline justify-content-end">
                    <button type="submit" class="btn btn-primary">Conferma Modifica</button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="collapse" data-bs-target="#collapseEdit{{$food->id}}" aria-expanded="false" aria-controls="collapseEdit{{$food->id}}">Annulla Modifica</button>
                </div>



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
