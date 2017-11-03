<script>
function Cart() {
    this.add = (id) => {
        let parsed = this.parse();
        let jHandler = new JsonHandler(prod);
        let res;
        if(res = jHandler.find('id',id)){
            parsed.push(prod[res]);
            localStorage.setItem('cart', JSON.stringify(parsed));
        } else {
            return false;
        }
    }

    this.parse = () => {
        if(localStorage.getItem('cart') == null) {
            localStorage.setItem('cart', JSON.stringify([]));
        }
        return JSON.parse(localStorage.getItem('cart'));
    }

    this.count = () => {
        return this.parse().length;
    }

    this.clearCart = () => {
        localStorage.setItem('cart', JSON.stringify([]));
    }

    this.remove = (id) => {
        let cart = this.parse();
        let jHandler = new JsonHandler(cart);
        cart.splice(jHandler.find('id', id),1);
    }
}
</script>
