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
                <input id="name_restaurant" type="text" class="form-control @error('name_restaurant') is-invalid @enderror" name="name_restaurant">
                @error('name_restaurant')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label for="img" class="">Carica un immagine di presentazione:</label>
                <input id="img" type="file" class="form-control @error('img') is-invalid @enderror" name="img">
                @error('img')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label for="phone" class="">Numero di telefono</label>
                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone">
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label for="address" class="">Indirizzo</label>
                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address">
                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label for="VAT" class="">La tua Partita IVA</label>
                <input id="VAT" type="text" class="form-control @error('VAT') is-invalid @enderror" name="VAT">
                @error('VAT')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
    </div>
    <div class="text-center category-check">
        <legend>In quale categoria ricade il tuo ristorante?</legend>
        <div class="">
            @foreach ($categories as $category)
                <input type="checkbox" id="category" name="category[]" value="{{$category->id}}" class="@error('category') is-invalid @enderror">
                <label for="category"> {{$category->name_category}}</label>
            @endforeach
            @error('category')
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
        </div>
        <button class="btn btn-primary" type="submit">Registra Ristorante</button>
    </div>
</form>
    
@endsection