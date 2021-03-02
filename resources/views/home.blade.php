@extends('layouts.deliveboo')
@section('content')
<div class="container">
    <div class="row">
        @for ($i = 0; $i < 4; $i++)
        
            <div class="col">
                <div class="card category">
                    <span class="category-name">Sushi</span>
                </div>
            </div>

        @endfor

    </div>
</div>
    
<div class="container">
    <div class="row">

        @for ($i = 0; $i < 20; $i++)
            <div class="col">
                <div class="card restaurant">
                    <img class="card-img-top" src="https://rs-menus-api.roocdn.com/images/60560714-4507-4055-be4a-150108abf6bd/image.jpeg?width=524.0000078082085&amp;height=294.0000043809414&amp;auto=webp&amp;format=jpg&amp;fit=crop&amp;v=&quot" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Nome Ristorante</h5>
                        <p class="card-text">Categorie</p>
                    </div>
                </div>
            </div>  
        @endfor
            
    </div>
</div>
@endsection
