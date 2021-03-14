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

        <div class="row card">
          <div class="card-body d-flex align-items-center justify-content-between flex-wrap">
            <div class="col-12 col-md-4 col-lg-3 food-img-container" style="background-image: url({{asset($food->img)}})">
            </div>
            <div class="col-12 col-md-8 col-lg-6 d-flex">
              <ul class=" col d-flex flex-wrap">
                <li>ID: <strong>{{$food->id}}</strong></li>
                <li>Nome: <strong>{{$food->name_food}}</strong></li>
                <li>Prezzo: <strong>€{{number_format($food->price, 2, '.', ',')}}</strong></li>
                <li>Visibile: {{$food->is_visible ? 'SI' : 'NO'}}</li>
              </ul>
            </div>
            <div class="col-12 col-lg-3 text-center">
              <button type="button" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#collapseDetails{{$food->id}}" aria-expanded="false" aria-controls="collapseDetails{{$food->id}}">Dettagli</button>
              <button type="button" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#collapseEdit{{$food->id}}" aria-expanded="false" aria-controls="collapseEdit{{$food->id}}">Modifica</button>
            </div>
          </div>
        </div>

        {{-- details --}}
        <div class="col card collapse" id="collapseDetails{{$food->id}}">
          <div class="container d-flex flex-column food-details">
            <div class="row">
              <div class="col">
                <img style="width: 100%" src="{{$food->img}}" alt="">
              </div>
              <ul class="col d-flex flex-column">
                <li>Visibile: {{$food->is_visible ? 'SI' : 'NO'}}</li>
                <li>ID:<strong> {{$food->id}}</strong></li>
                <li>Nome:<strong> {{$food->name_food}}</strong></li>
                <li>Descrizione:<strong> {{$food->ingredients}}</strong></li>
                <li>Prezzo: <strong>€{{number_format($food->price, 2, '.', ',')}}</strong></li>
              </ul>
            </div>

            <div class="row card-body ">
              <div class="col d-flex align-items-baseline justify-content-end">
                <button type="button" class="btn btn-secondary" data-bs-toggle="collapse" data-bs-target="#collapseDetails{{$food->id}}" aria-expanded="false" aria-controls="collapseDetails{{$food->id}}">Nascondi dettagli</button>
              </div>
            </div>
          </div>
        </div>
        {{--end details--}}



        {{-- edit form --}}
        <div class="col card collapse" id="collapseEdit{{$food->id}}">
          <div class="order-details d-flex flex-column">
            <div class="">
              <form class="d-flex flex-column" action="{{route('foods.update', $food->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3 d-flex is_visible align-items-baseline">
                  <label for="is_visible" class="form-label">Is Visibile:</label>
                  <input type="radio" id="is_visible" name="is_visible" value="1" class="@error('is_visible') is-invalid @enderror" {{$food->is_visible ? 'checked' : ''}}>
                  <label for="si">SI</label><br>
                  <input type="radio" id="is_visible" name="is_visible" value="0" class="@error('is_visible') is-invalid @enderror" {{!$food->is_visible ? 'checked' : ''}}>
                  <label for="no">NO</label><br>
                  @error('is_visible')
                    <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="food_name" class="form-label">Nome:</label>
                  <input name="name_food" type="text" class="form-control @error('name_food') is-invalid @enderror" id="food_name" value="{{$food->name_food}}">
                  @error('name_food')
                  <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                  </span>
                @enderror
                </div>
                <div class="mb-3">
                  <label for="food_description" class="form-label">Descrizione:</label>
                  <textarea name="ingredients" class="form-control @error('ingredients') is-invalid @enderror" id="food_description">{{$food->ingredients}}</textarea>
                  @error('ingredients')
                    <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="price" class="form-label">Price €:</label>
                  <input name="price" type="text" class="form-control @error('price') is-invalid @enderror" id="price" value="{{$food->price}}">
                  @error('price')
                  <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                  </span>
                @enderror
                </div>
                <div class="row image-update">
                  <div class="col-12 col-md-6 d-flex justify-content-center">
                    <img style="width: 90%; margin:auto" src="{{$food->img}}" alt="">
                  </div>
                  <div class="col col-md-6 mb-3">
                    <label for="img" class="form-label">Cambia imagine:</label>
                    <input id="img" type="file" class="form-control @error('img') is-invalid @enderror" name="img">
                    @error('img')
                      <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="card-body d-flex align-items-baseline justify-content-center flex-wrap">
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
