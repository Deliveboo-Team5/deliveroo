@extends('my_layouts.deliveboo')
@section('content')
<div class="container-fluid jumbotron active">
    <div class="container">
        <div class="row">
            <div class="col-6 d-flex align-items-center">
                <h1> <strong>I tuoi piatti preferiti a casa. <br> Con Deliveroo.</strong> </h1>
            </div>
            <div class="col-6">
                <img src="{{asset('img\campaign.5add8e18.svg')}}" alt="" class="">
            </div>
        </div>
    </div>
</div>
    <div class="container home">
        <h3>Categorie</h3>
        <div class="row">
            <div class="col category-container">
                    <div class="card card-select category" v-bind:style="{backgroundImage: 'url(' + category.img +')'}"
                    v-for="(category, i) in categories" v-on:click="selectCategory(category.id)" :class="activeCategory.includes(category.id) ? 'active' : ''" :value="category.id" name="category_id[]">
                        <span class="category-name">@{{category.name_category}}</span>
                    </div>
            </div>
        </div>
    </div>

    <div ref="restaurants" class="container home">
        <h3>Ristoranti</h3>
        <div v-if="activeCategory == '' && searchByName == ''" class="row  flex-wrap d-flex justify-content-between">
          <div class="col-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3 d-flex justify-content-center" v-for="(restaurant, index) in filterByName()">
              <form v-if="index < 8" action="" method="get">
                  <a :href="'restaurant/' + restaurant.id"  class="card-select card restaurant" :value="restaurant.id">
                      <img class="card-img-top" :src="restaurant.img" alt="Restaurant picture">
                      <div class="card-body p-relative">
                          <h3 class="card-title">@{{restaurant.name_restaurant}}</h3>
                          <small>
                              @{{restaurant.address}}
                          </small>
                          <p class="card-text p-absolute">
                            <span v-for="category in restaurant.get_category">
                                @{{ category.name_category}}
                            </span>
                          </p>
                      </div>
                  </a>
              </form>
          </div>
        </div>
        <div v-else class="row">
          <div class="col-4" v-for="restaurant in filterByName()">
              <form action="" method="get">
                  <a :href="'restaurant/' + restaurant.id"  class="card-select card restaurant" :value="restaurant.id">
                      <img class="card-img-top" :src="restaurant.img" alt="Restaurant picture">
                      <div class="card-body p-relative">
                          <h3 class="card-title">@{{restaurant.name_restaurant}}</h3>
                          <small>
                              @{{restaurant.address}}
                          </small>
                          <p class="card-text p-absolute">
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
