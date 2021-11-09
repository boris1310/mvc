import { createApp } from "vue";
//import "bootstrap/dist/js/bootstrap.bundle.min";
import "./styles.css";
import ProductList from './components/ProductList'
import CartModal from './components/CartModal'
import CartButton from './components/CartButton'
import Sidebar from	'./components/Sidebar'
import Pagination from './components/Pagination'

const app = createApp({
    data: () => ({
    	countPages: 0,
        count: 0,
        price: 0,
        source: 'http://localhost:8888/Catalog/getAll/all/?page=',
        currentPage:'1',
        flag: false,
        products: [],
        cartProduct: [],
        categories:[],
        manufacturers:[],
        countItemsCat:[],
        countItemsMan:[],
    }),
    methods: {
		async fetchPagination(){

			  const url = this.source;
			  const reg = /getAll/gi;
			  const regUrl = url.replace(reg,'pagination');
			  const response = await fetch(regUrl);
			  this.countPages = await response.json();

			  if(!this.countPages%8){
				this.countPages = this.countPages/8;
			  }else{
				this.countPages = Math.ceil(this.countPages/8);
			  }


			},
        async fetchProducts() {

            const response = await fetch(this.source+this.currentPage);
            this.products = await response.json();

        },
        async fetchCategories(){

        	const response = await fetch('http://localhost:8888/Catalog/getCategories');
        	this.categories = await response.json();

        },
        async fetchManufacturers(){

			const response = await fetch('http://localhost:8888/Catalog/getManufacturers');
			this.manufacturers = await response.json();

        },
        async fetchCountItemsInCats(){

			const response = await fetch('http://localhost:8888/Catalog/countItemInCategory');
			this.countItemsCat = await response.json();

        },
        async fetchCountItemsInMans(){

			  const response = await fetch('http://localhost:8888/Catalog/countItemInManufacturer');
			  this.countItemsMan = await response.json();

        },

        async fetchToCart(idProduct, name, image, price){
        	  const response = await fetch('http://localhost:8888/Order/setItemToCart/add/'+
        	  '?idProduct='+idProduct+
        	  '&name='+name+
        	  '&image='+image+
        	  '&price='+price+
        	  '&count='+1
        	  );
              const result = await response.json();

        },

        async fetchUnsetItem(idProduct){
			 const response = await fetch('http://localhost:8888/Order/unsetItemToCart/delete/?idProduct='+idProduct);
        },

 		totalPrice(){
			this.count = 0;
			this.price = 0;

			this.cartProduct.map(product => {
				this.count += product.count;
				this.price += parseInt(product.price) * product.count;
			});
        },



       	addCart(idProduct, name, image, price) {

            if(this.cartProduct.length > 0) {
                this.flag = false

                this.cartProduct.map(product => {
                    if(product.idProduct == idProduct) {
                        product.count += 1
                        this.flag = true
                    }
                });

                if(this.flag == false) {
                    this.cartProduct.push({idProduct,  name, image, price, count: 1})
                }
            } else {
                this.cartProduct.push({idProduct, name, image, price, count: 1})
            }
            this.count++;
            this.totalPrice;
            this.fetchToCart(idProduct, name, image, price);
        },



        increment(idProduct) {
			this.cartProduct.map(product => {
				if(product.idProduct == idProduct) {
					product.count += 1
					this.count++
					this.totalPrice();
				}
			});

		},

        decrement(idProduct) {
			this.cartProduct.map(product => {
				if(product.idProduct == idProduct) {
					if(product.count > 0) {
						product.count -= 1
                        this.count--
                        this.totalPrice();
					}
				}
			});
        },

		deleteItem(idProduct){
		  	this.cartProduct.map(product => {
				if(product.idProduct == idProduct) {
					this.cartProduct.splice(product,1);
					this.fetchUnsetItem(idProduct);
				}
            });
			this.totalPrice();

		},


		async fetchCartProduct(){
			const response = await fetch('http://localhost:8888/Order/getCartProducts');
			this.cartProduct = await response.json();
			this.count = this.cartProduct.length;
		}

    },
    mounted() {
        this.fetchProducts(this.source);
        this.fetchCategories();
        this.fetchManufacturers();
		this.fetchCountItemsInCats();
		this.fetchCountItemsInMans();
    	this.fetchPagination();
    	this.fetchCartProduct();
    }
});

app.component("catalog-sidebar",Sidebar);
app.component("product-list", ProductList);
app.component("cart-button", CartButton);
app.component("cart-modal", CartModal);
app.component("pagination-block",Pagination);

app.mount("#app");


