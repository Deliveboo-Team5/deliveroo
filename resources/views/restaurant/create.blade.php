@extends('my_layouts.deliveboo')
@section('content')
<div class="d-flex flex-column align-items-center title-create">
    <h1>Utente Registrato!</h1>
    <h1>Ora registra il tuo ristorante.</h1>
</div>
<form method="POST" action="{{route('restaurant.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="d-flex justify-content-center create-rest">
        <div>    
                <label for="name_restaurant">Nome</label>
                <input id="name_restaurant" type="text" class="form-control" name="name_restaurant">
                <label for="img" class="">Carica un immagine di presentazione:</label>
                <input id="img" type="file" class="form-control" name="img">
                <label for="phone" class="">Numero di telefono</label>
                <input id="phone" type="text" class="form-control" name="phone">
                <label for="address" class="">Indirizzo</label>
                <input id="address" type="text" class="form-control" name="address">
                <label for="VAT" class="">La tua Partita IVA</label>
                <input id="VAT" type="text" class="form-control" name="VAT">
        </div>
    </div>
    <div class="text-center category-check">
        <legend>In quale categoria ricade il tuo ristorante?</legend>
        <div class="d-flex justify-content-center">
        @foreach ($categories as $category)
        <div>
            <input type="checkbox" id="coding" name="category[]" value="{{$category->id}}">
            <label for="coding"> {{$category->name_category}}</label>
        </div>
        @endforeach
        </div>
        <button class="btn btn-primary" type="submit">Registra Ristorante</button>
    </div>
</form>
    
@endsection