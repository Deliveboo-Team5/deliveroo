const app = new Vue({
    el: '#root',
    data: {
        restaurants: [],
        categories: [],
        activeCategory: '',
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
        }
    },
})