const app = new Vue({
    el: '#root',
    data: {
        restaurants: [],
        categories: [],
        foods: [],
        cart: [],
        activeCategory: [],
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
            });
    },
    methods: {
        selectCategory(element){
            if(!this.activeCategory.includes(element)){
                this.activeCategory.push(element);
            }else{
                this.activeCategory.splice(this.activeCategory.indexOf(element), 1)
            }
        },
        filterRestaurant(element){
            if(this.activeCategory.length == 0){
                return this.restaurants;
            } else {
                return this.restaurants.filter(restaurant => this.activeCategory.every(v => restaurant.category_id.includes(v)));
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
            this.foods.forEach(food => {
                if(food.id == element){
                    food.quantity = 1;
                    this.cart.push(food);
                }            
            })          
        },
        removeFromCart(index){
            this.cart.splice(index, 1);
        },
        refreshTotal(){
            this.totalPrice = 0;
            this.cart.forEach(food => {
                food.totalPrice = food.quantity*food.price;
                this.totalPrice += food.totalPrice;
            })
            this.totalPrice = (Math.round(this.totalPrice * 100) / 100).toFixed(2);
        }
    }
});
