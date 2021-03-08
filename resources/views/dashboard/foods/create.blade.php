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

        {{-- create form --}}
        <div class="col card ">
          <div class="d-flex flex-column">
            <div class="order-details">
              <form class="d-flex flex-column" action="{{route('foods.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="mb-3">
                  <label for="food_name" class="form-label">Nome:</label>
                  <input name="name_food" type="text" class="form-control" id="food_name">
                </div>
                <div class="mb-3">
                  <label for="food_description" class="form-label">Descrizione:</label>
                  <textarea name="ingredients" class="form-control" id="food_description"></textarea>
                </div>
                <div class="mb-3">
                  <label for="img" class="form-label">img</label>
                  <input id="img" type="file" class="form-control" name="img">
                </div>
                <div class="mb-3">
                  <label for="price" class="form-label">Price €:</label>
                  <input name="price" type="text" class="form-control" id="price">
                </div>
                <div class="mb-3">
                  <label for="is_visible" class="form-label">Is Visibile:</label>
                  <input type="radio" id="si" name="is_visible" value="1">
                  <label for="si">SI</label><br>
                  <input type="radio" id="no" name="is_visible" value="0">
                  <label for="no">NO</label><br>
                </div>

                <button type="submit" class="btn btn-primary">Conferma</button>
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
