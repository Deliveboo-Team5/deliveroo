@extends('my_layouts.deliveboo')
@section('content')
    <div class="container">
        <h3>Categorie</h3>
        <div class="row">
            <div class="col category-container">
                    <div class="card category" v-for="(category, i) in categories" v-on:click="selectCategory(category.id)" :value="category.id">
                        <span class="category-name">@{{category.name_category}}</span>
                    </div>
            </div>
        </div>
    </div>
        
    <div class="container">
        <h3>Ristoranti</h3>
        <div class="row">
                <div class="col" v-for="restaurant in filterByName()">
                    <form action="" method="get">
                        <a :href="'restaurant/' + restaurant.id"  class="card restaurant" :value="restaurant.id">
                            <img class="card-img-top" :src="restaurant.img" alt="Restaurant picture">
                            <div class="card-body">
                                <h5 class="card-title">@{{restaurant.name_restaurant}}</h5>
                                <p class="card-text">
                                    <span v-for="category in restaurant.get_category">
    
                                        @{{ category.name_category}}
                                    </span>
                                </p>
                            </div>
                        </a>
                    </form>
                </div>  
        </div>
    </div>
@endsection
