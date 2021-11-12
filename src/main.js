import { createApp } from "vue";
//import "bootstrap/dist/js/bootstrap.bundle.min";
import "./styles.css";
import ProductList from './components/ProductList'
import CartModal from './components/CartModal'
import CartButton from './components/CartButton'
import Sidebar from	'./components/Sidebar'
import Pagination from './components/Pagination'
import signUp from './components/signUp'
import OrderHistory from './components/OrderHistory'

const app = createApp({
    data: () => ({
    	UserId:null,
    	UserRole:'user',
    	UserName:'',
    	UserMail:'',
    	countPages: 0,
        count: 0,
        price: 0,
        source: '/Catalog/getAll/all/?page=',
        currentPage:'1',
        flag: false,
        products: [],
        cartProduct: [],
        categories:[],
        manufacturers:[],
        countItemsCat:[],
        countItemsMan:[],
        history: 0,
        flagClearSingle:0,
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
        	const response = await fetch('/Catalog/getCategories');
        	this.categories = await response.json();
        },

        async fetchManufacturers(){
			const response = await fetch('/Catalog/getManufacturers');
			this.manufacturers = await response.json();
        },

        async fetchCountItemsInCats(){
			const response = await fetch('/Catalog/countItemInCategory');
			this.countItemsCat = await response.json();
        },

        async fetchCountItemsInMans(){
			  const response = await fetch('/Catalog/countItemInManufacturer');
			  this.countItemsMan = await response.json();
        },

        async fetchToCart(idProduct, name, image, price){
        	  const response = await fetch('/Order/setItemToCart/add/'+
        	  '?idProduct='+idProduct+
        	  '&name='+name+
        	  '&image='+image+
        	  '&price='+price+
        	  '&count='+1
        	  );
              const result = await response.json();
        },

        async fetchUnsetItem(idProduct){
			 const response = await fetch('/Order/unsetItemToCart/delete/?idProduct='+idProduct);
			 const data = await response.json();
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
            this.fetchCartProduct();
            this.fetchProducts();
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
            this.fetchProducts();
			this.totalPrice();
		},


		async fetchCartProduct(){
			const response = await fetch('/Order/getCartProducts');
			this.cartProduct = await response.json();
			this.count = this.cartProduct.length;
			this.totalPrice();
		},

		async checkSession(){
			const response = await fetch('/User/checkSession');
			const check = await response.json();
			 this.UserId= check.id;
			 this.UserRole=check.role;
			 this.UserName=check.name;
			 this.UserMail=check.email;

		},


		async logout(){
			this.UserId=null;
			this.UserRole='user';
			this.UserName='';
			this.UserMail='';
			const response = await fetch('/User/logout');
			const check = await response.json();
			document.location.reload();
		},

    },

    mounted() {
		this.fetchCartProduct();
   		this.checkSession();
   		this.fetchCategories();
   		this.fetchManufacturers();
   		this.fetchProducts(this.source);
    	this.fetchCountItemsInCats();
		this.fetchCountItemsInMans();
    	this.fetchPagination();
    }

});

app.component("sign-up",signUp);
app.component("catalog-sidebar",Sidebar);
app.component("cart-button", CartButton);
app.component("product-list", ProductList);
app.component("cart-modal", CartModal);
app.component("pagination-block",Pagination);
app.component("order-history",OrderHistory);

app.mount("#app");


