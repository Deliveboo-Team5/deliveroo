<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Deliveboo - Restaurant</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="css/app.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1>Nome Ristorante</h1>
                <p>Categorie</p>
                <p>Altri dati</p>
            </div>
            <div class="col-4">
                <img class="img-restaurant" src="https://rs-menus-api.roocdn.com/images/60560714-4507-4055-be4a-150108abf6bd/image.jpeg?width=524.0000078082085&amp;height=294.0000043809414&amp;auto=webp&amp;format=jpg&amp;fit=crop&amp;v=&quot" alt="">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            
            <div class="col-8 d-flex flex-wrap">
                @for ($i = 0; $i < 8; $i++)
                    <div class="col-6">
                        <div class="card food">
                            <h5>Nome Piatto</h5>
                            <p>Ingredienti</p>
                            <div class="price">€ 10.00</div>
                        </div>
                    </div>
                @endfor
            </div>
            <div class="col-4">
                <h1 class="text-center">Carrello</h1>
            </div>
    
    
        </div>
    </div>
</body>
</html>