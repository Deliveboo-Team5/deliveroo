@extends('my_layouts.deliveboo')
@section('content')
<div class="container-fluid">
  <div class="row">
  {{-- left menu --}}
    @include('dashboard.sidebar')

  {{-- right block --}}
    <div class="col-10">

      <div class="row orders-list d-flex flex-column">
        <h3>Menu</h3>
        <div class="d-flex">
          <button type="button" class="btn btn-primary">Aggiungi un piatto</button>
        </div>

        {{-- create form --}}
        <div class="col card d-flex justify-content-center">
          <div class="d-flex flex-column">
            <div class="order-details">
              <form class="d-flex flex-column" action="{{route('foods.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="mb-3">
                  <label for="food_name" class="form-label">Nome del piatto:</label>
                  <input name="name_food" type="text" class="form-control @error('name_food') is-invalid @enderror" id="food_name">
                  @error('name_food')
                    <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="food_description" class="form-label">Descrizione:</label>
                  <textarea name="ingredients" class="form-control @error('ingredients') is-invalid @enderror" id="food_description" ></textarea>
                  @error('ingredients')
                    <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="img" class="form-label">Immagine del piatto (in formato jpeg, jpg):</label>
                  <input id="img" type="file" class="form-control @error('img') is-invalid @enderror" name="img" >
                  @error('img')
                    <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="price" class="form-label">Prezzo €:</label>
                  <input name="price" type="text" class="form-control @error('price') is-invalid @enderror" id="price" >
                  @error('price')
                  <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                  </span>
                 @enderror
                </div>
                <div class="mb-3 d-flex is_visible">
                  <label for="is_visible" class="form-label ">&#201; disponibile:</label>
                  <input type="radio" id="is_visible" name="is_visible" value="1" class="@error('is_visible') is-invalid @enderror">
                  <label for="si">SI</label><br>
                  <input type="radio" id="is_visible" name="is_visible" value="0" class="@error('is_visible') is-invalid @enderror" >
                  <label for="no">NO</label><br>
                  @error('is_visible')
                  <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div>
                  <button type="submit" class="btn btn-primary">Conferma</button>
                </div>

              </form>
            </div>
          </div>
        </div>


        {{--end open row--}}


      </div>
    </div>
  </div>
</div>
@endsection
