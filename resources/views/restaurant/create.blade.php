@extends('my_layouts.deliveboo')
@section('content')
<form method="POST" action="{{route('restaurant.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
        <label for="name_restaurant" class="col-md-4 col-form-label text-md-right">name_restaurant</label>

        <div class="col-md-6">
            <input id="name_restaurant" type="text" class="form-control" name="name_restaurant">

        </div>
    </div>
    <div class="form-group row">
        <label for="img" class="col-md-4 col-form-label text-md-right">img</label>

        <div class="col-md-6">
            <input id="img" type="file" class="form-control" name="img">
        </div>
    </div>
    <div class="form-group row">
        <label for="phone" class="col-md-4 col-form-label text-md-right">phone</label>

        <div class="col-md-6">
            <input id="phone" type="text" class="form-control" name="phone">

        </div>
    </div>
    <div class="form-group row">
        <label for="address" class="col-md-4 col-form-label text-md-right">address</label>

        <div class="col-md-6">
            <input id="address" type="text" class="form-control" name="address">

        </div>
    </div>
    <div class="form-group row">
        <label for="VAT" class="col-md-4 col-form-label text-md-right">VAT</label>

        <div class="col-md-6">
            <input id="VAT" type="text" class="form-control" name="VAT">

        </div>
    </div>
    <fieldset>
        <legend>scegli le categorie del tuo ristorante</legend>
        @foreach ($categories as $category)
        <div>
            <input type="checkbox" id="coding" name="category[]" value="{{$category->id}}">
            <label for="coding"> {{$category->name_category}}</label>
        </div>
            
        @endforeach
    </fieldset>
    <button type="submit">clik me</button>
</form>
    
@endsection