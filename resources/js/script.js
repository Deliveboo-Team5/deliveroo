
const app = new Vue({
    el: '#root',
    data: {
        restaurants: [],
        categories: [],
        foods: [],
        cart: [],
        statsFood: [],
        statsOrder: [],
        statsLabel: [],
        statsData: [],
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

        axios
            .get('http://localhost:8000/api/statistics')
            .then(result => {
                this.statsFood = result.data.data.food;
                this.statsOrder = result.data.data.order;

                  this.statsOrder.forEach((order) => {
                    if(!this.statsLabel.includes(order.delivery_time.substring(0,4))){
                        this.statsLabel.push(order.delivery_time.substring(0,4));
                    }
                  });
                  this.statsLabel.forEach((year) => {
                    let count = 0;
                    this.statsOrder.forEach((order) => {
                      if(order.delivery_time.substring(0,4) == year){
                        count++;
                      }
                    });

                    this.statsData.push(count);
                  });


                  new Chart(document.getElementById("bar-chart"), {
                      type: 'bar',
                      data: {
                        labels: this.statsLabel,
                        datasets: [
                          {
                            label: "Ordini",
                            backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                            data: this.statsData
                          }
                        ]
                      },
                      options: {
                      }
                  });

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
        goto(refName) {
            var element = this.$refs[refName];
            console.log(element);
            var top = element.offsetTop;
            window.scrollTo(0, (top - 70));
        },
        filterRestaurant(){
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
