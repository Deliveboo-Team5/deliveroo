const app = new Vue({
    el: '#root',
    data: {
        restaurants: [],
        categories: [],
        activeCategory: '',
        searchByName: '',
    },
    mounted() {
        axios
            .get('http://localhost:8000/api/restaurant')
            .then(r => {
                this.restaurants = r.data.data.restaurants;
                this.categories = r.data.data.categories;
            });
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
        }
    },
})