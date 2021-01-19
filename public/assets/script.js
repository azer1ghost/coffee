let app = new Vue({
    el: '#app',
    data: {
        products : products,
        cartData: [],
        total: 0
    },
    methods: {
        addToCard: function (id) {

            let product = this.products.find(_product => _product.id === id)

            let cardİtem = new Object();
            cardİtem.id = product.id;
            cardİtem.name = product.name;
            cardİtem.price = product.price;
            cardİtem.description = product.description;
            cardİtem.image = product.image;
            cardİtem.quantity = 1

            let found = this.cartData.find(product => product.id == id)

            if (found)
                found.quantity++
            else
                this.cartData.push(cardİtem)
        },
        deleteCardItem : function (index)
        {
            this.cartData.splice(index, 1)
        },
    },
    watch: {
        cartData: {
            handler(val){
                this.total = 0
                this.cartData.forEach((item, i) => {
                    if (item.quantity <= 0 ) item.quantity = 1
                    this.total += (item.price * item.quantity);
                });
            },
            deep: true
        }
    },
    mounted () {
        (function(){
            // $(document).click(function() {
            //     var $item = $(".shopping-cart");
            //     if ($item.hasClass("active")) {
            //         $item.removeClass("active");
            //     }
            // });

            $('.shopping-cart').each(function() {
                var delay = $(this).index() * 50 + 'ms';
                $(this).css({
                    '-webkit-transition-delay': delay,
                    '-moz-transition-delay': delay,
                    '-o-transition-delay': delay,
                    'transition-delay': delay
                });
            });

            $('#cart').click(function(e) {
                e.stopPropagation();
                $(".shopping-cart").toggleClass("active");
            });

        })();
    }
})

