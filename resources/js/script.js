const app = new Vue({
    el: '#root',
    data: {
        restaurants: [],
        filteredRestaurants: [],
        activeCategory: '',
    },
    mounted() {
        axios
            .get('http://localhost:8000/api/restaurant')
            .then(r => {
                this.restaurants = r.data;
            });
    },
    methods: {
        filterRestaurant: function(category){
            this.activeCategory = category;
            // this.restaurants
        }
    },
})