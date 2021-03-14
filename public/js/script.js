/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/script.js":
/*!********************************!*\
  !*** ./resources/js/script.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

var app = new Vue({
  el: '#root',
  data: {
    restaurants: [],
    categories: [],
    foods: [],
    cart: [],
    statsFood: [],
    statsOrder: [],
    selectedYear: '',
    chartMonth: {
      statsLabel: ['Gennaio', 'Febraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'],
      statsData: []
    },
    chartYear: {
      statsLabel: [],
      statsData: []
    },
    activeCategory: [],
    searchByName: '',
    totalPrice: 0
  },
  mounted: function mounted() {
    var _this = this;

    axios.get('http://localhost:8000/api/restaurant').then(function (r) {
      _this.restaurants = r.data.data.restaurants;
      _this.categories = r.data.data.categories;
    });
    axios.get('http://localhost:8000/api/food').then(function (result) {
      _this.foods = result.data.data.food;
    });
    axios.get('http://localhost:8000/api/statistics').then(function (result) {
      _this.statsFood = result.data.data.food;
      _this.statsOrder = result.data.data.order; // GRAFICO ANNI

      _this.statsOrder.forEach(function (order) {
        if (!_this.chartYear.statsLabel.includes(order.delivery_time.substring(0, 4))) {
          _this.chartYear.statsLabel.push(order.delivery_time.substring(0, 4));
        }
      });

      _this.chartYear.statsLabel.sort();

      _this.chartYear.statsLabel.forEach(function (year) {
        var count = 0;

        _this.statsOrder.forEach(function (order) {
          if (order.delivery_time.substring(0, 4) == year) {
            count++;
          }
        });

        _this.chartYear.statsData.push(count);
      });

      new Chart(document.getElementById("chartYear"), {
        type: 'bar',
        responsive: true,
        data: {
          labels: _this.chartYear.statsLabel,
          datasets: [{
            label: "Ordini",
            backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850", "#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850", "#e8c3b9", "#c45850"],
            data: _this.chartYear.statsData
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true,
                suggestedMax: 10
              }
            }]
          }
        }
      });
    });

    if (localStorage.getItem('cart')) {
      this.cart = JSON.parse(localStorage.getItem('cart'));
      this.totalPrice = localStorage.getItem('total');
    }

    ;
  },
  methods: {
    selectCategory: function selectCategory(element) {
      if (!this.activeCategory.includes(element)) {
        this.activeCategory.push(element);
      } else {
        this.activeCategory.splice(this.activeCategory.indexOf(element), 1);
      }
    },
    "goto": function goto(refName) {
      var element = this.$refs[refName];
      console.log(element);
      var top = element.offsetTop;
      window.scrollTo(0, top - 70);
    },
    gotocart: function gotocart() {
      var cartPosition = this.$refs.cart;
      cartPosition.scrollIntoView();
    },
    filterRestaurant: function filterRestaurant() {
      var _this2 = this;

      if (this.activeCategory.length == 0) {
        return this.restaurants;
      } else {
        return this.restaurants.filter(function (restaurant) {
          return _this2.activeCategory.every(function (v) {
            return restaurant.category_id.includes(v);
          });
        });
      }
    },
    filterByName: function filterByName() {
      var _this3 = this;

      if (this.searchByName == '') {
        return this.filterRestaurant();
      } else {
        return this.restaurants.filter(function (restaurant) {
          return restaurant.name_restaurant.toLowerCase().includes(_this3.searchByName.toLowerCase());
        });
      }
    },
    saveCart: function saveCart() {
      var parsed = JSON.stringify(this.cart);
      localStorage.setItem('cart', parsed);
    },
    addToCart: function addToCart(element) {
      var _this4 = this;

      this.foods.forEach(function (food) {
        if (food.id == element) {
          food.quantity = 1;

          _this4.cart.push(food);

          _this4.saveCart();
        }
      });
    },
    removeFromCart: function removeFromCart(index) {
      this.cart.splice(index, 1);
      this.saveCart();
    },
    emptyCart: function emptyCart() {
      this.cart = [];
      this.saveCart();
    },
    refreshTotal: function refreshTotal() {
      var _this5 = this;

      this.totalPrice = 0;
      this.cart.forEach(function (food) {
        food.totalPrice = food.quantity * food.price;
        _this5.totalPrice += food.totalPrice;
      });
      this.totalPrice = (Math.round(this.totalPrice * 100) / 100).toFixed(2);
      var totalPriceSave = this.totalPrice;
      localStorage.setItem('total', totalPriceSave);
    },
    refreshGraphicYear: function refreshGraphicYear() {
      var _this6 = this;

      this.chartMonth.statsData = [];

      var _loop = function _loop(i) {
        var count = 0;

        _this6.statsOrder.forEach(function (order) {
          if (order.delivery_time.substring(0, 4) == _this6.selectedYear && order.delivery_time.substring(5, 7) == i) {
            count++;
          }
        });

        _this6.chartMonth.statsData.push(count);
      };

      for (var i = 1; i <= 12; i++) {
        _loop(i);
      }

      var ChartName = 'chartMonth' + this.selectedYear;
      new Chart(document.getElementById(ChartName), {
        type: 'bar',
        data: {
          labels: this.chartMonth.statsLabel,
          datasets: [{
            label: "Ordini",
            backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850", "#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850", "#e8c3b9", "#c45850"],
            data: this.chartMonth.statsData
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true,
                suggestedMax: 10
              }
            }]
          }
        }
      });
    }
  }
});

/***/ }),

/***/ 1:
/*!**************************************!*\
  !*** multi ./resources/js/script.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/mirellenascimento/Dropbox/Boolean/Progetto/deliveroo/resources/js/script.js */"./resources/js/script.js");


/***/ })

/******/ });