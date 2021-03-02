<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Deliveboo - Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="css/app.css">
</head>
<body>
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
            @for ($i = 0; $i < 5; $i++)
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
</body>
</html>