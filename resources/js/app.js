require('./bootstrap');


window.Vue = require('vue').default;
Vue.component('article-image', require('./components/articles/ArticleImage.vue').default);

const app = new Vue({
    el: '#app',
});

 $(document).ready(function() {

    require("bootstrap-select");
    require("./libs/bootstrap-select/bootstrap-select.fr_FR.min");

    $('.select').selectpicker();
    require("./utils");
});
