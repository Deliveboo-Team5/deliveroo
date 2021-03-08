const app = new Vue({
    el: '#root',
    data: {
        restaurants: [],
        categories: [],
        foods: [],
        cart: [],
        activeCategory: '',
        searchByName: '',
        totalPrice: 0
    },
    mounted() {
        axios
            .get('http://localhost:8000/api/restaurant')
            .then(r => {
                this.restaurants = r.data.data.restaurants;
                this.categories = r.data.data.categories;
            })   
        axios
            .get('http://localhost:8000/api/food')
            .then(result => {
                this.foods = result.data.data.food;
            })
    },
    // watch: {
    //     activeCategory(){ 
    //         this.filterRestaurant();
    //     },
    // },
    methods: {
        selectCategory(element){
            this.activeCategory = element;
        },
        filterRestaurant(element){

            if(this.activeCategory == ''){
                return this.restaurants;
            } else {
                return this.restaurants.filter(restaurant => restaurant.category_id.includes(this.activeCategory));
            }
        },
        filterByName(){
            if(this.searchByName == ''){
                return this.filterRestaurant();
            }else{
                return this.restaurants.filter(restaurant => restaurant.name_restaurant.toLowerCase().includes(this.searchByName.toLowerCase()));
            }
        },
        addToCart(element){
            console.log(element);
            this.foods.forEach(food => {
                if(food.id == element){
                    this.cart.push(food)
                    this.totalPrice += food.price
                }            
            });
        },



    },
});
