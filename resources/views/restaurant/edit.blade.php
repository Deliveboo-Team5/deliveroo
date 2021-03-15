@extends('my_layouts.deliveboo')
@section('content')
<div class="container">
  <div class="row">
  {{-- left menu --}}
    @include('dashboard.sidebar')

  {{-- right block --}}
    <div class="col-10">

      <div class="order-details d-flex flex-column">
        <div class="">
          <form class="d-flex flex-column" method="POST" action="{{route('restaurant.update', $restaurant->id)}}" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <div class="row update-form-restaurant d-flex flex-wrap">
                <div class="col-12 col-md-8 mb-3">
                  <label for="name_restaurant">Nome</label>
                  <input id="name_restaurant" type="text" class="form-control @error('name_restaurant') is-invalid @enderror" value="{{$restaurant->name_restaurant}}" name="name_restaurant">
                  @error('name_restaurant')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="col-12 col-md-4 mb-3">
                  <label for="phone" class="">Numero di telefono</label>
                  <input id="phone" value="{{$restaurant->phone}}" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone">
                  @error('phone')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>

              <label for="address" class="">Indirizzo</label>
              <input id="address" type="text" value="{{$restaurant->address}}" class="form-control @error('address') is-invalid @enderror" name="address">
              @error('address')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror

              <label for="VAT" class="">Partita IVA</label>
              <input id="VAT" type="text" class="form-control @error('VAT') is-invalid @enderror" name="VAT" value="{{$restaurant->VAT}}">
              @error('VAT')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror

              <div class="mb-3 d-flex flex-column is_visible align-items-baseline">
                <p><br>Categorie:</p>
                <div>
                  @foreach($categories as $category)
                  <label for="{{"checked_".$category->name_category}}">{{$category->name_category}}</label>
                  <input type="checkbox" id="{{"checked_".$category->name_category}}" name="category[]" value="{{$category->id}}" {{in_array($category->id, $rest_categories) ? "checked" : ''}}>

                  @endforeach
                </div>
              </div>

              <div class="row image-update d-flex align-items-center">
                <div class="col-12 col-md-6 d-flex justify-content-center ">
                  <img style="width: 90%; margin:auto" src="{{asset($restaurant->img)}}" alt="">
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
              <div class="d-flex justify-content-center">
                <button class="btn btn-primary" type="submit">Conferma Modifica</button>
              </div>
              </div>
          </form>


        </div>

      </div>



@endsection
