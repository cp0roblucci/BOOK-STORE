const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);


cart();

function cart() {
    quantitycart();
    addremovebuy();
    removefromcart();
};


//tang giam so luong san pham va tong cua san pham 
function quantitycart() {
    var items_cart = $$('.item-cart');
    for(var i =0; i<items_cart.length; i++) {
        let minus_btn = items_cart[i].getElementsByClassName('minus')[0];
        let plus_btn = items_cart[i].getElementsByClassName('plus')[0];
        minus_btn.addEventListener('click', function(event) {
            let item_cart = event.target.parentElement.parentElement.parentElement;
            let quantity_item = item_cart.getElementsByClassName('num')[0];
            let sum_item = item_cart.getElementsByClassName('total')[0];
            let price_item = item_cart.getElementsByClassName('price')[0];
            if(quantity_item.value > 0) {
                quantity_item.value--;
                sum_item.innerHTML = parseFloat(price_item.innerText)*quantity_item.value + "₫";
                quantity_updatetotalbuy(item_cart);

            }
                
        });
        plus_btn.addEventListener('click', function(event) {
            let item_cart = event.target.parentElement.parentElement.parentElement;
            let quantity_item = item_cart.getElementsByClassName('num')[0];
            let sum_item = item_cart.getElementsByClassName('total')[0];
            let price_item = item_cart.getElementsByClassName('price')[0];
            quantity_item.value++;
            sum_item.innerHTML = parseFloat(price_item.innerText)*quantity_item.value + "₫";
            quantity_updatetotalbuy(item_cart);
        });
     
    };   
}


//tong gia tri don dat hang
function totalbuy() {
    var total_value = $('.total-value');
    let items_buy = $$('.item-buy');
    var ordered_container = $('.items-order-container');
    var total = 0;
    if(items_buy.length != 0) {
        if(ordered_container.getElementsByClassName('warning').length != 0) {
            ordered_container.getElementsByClassName('warning')[0].remove();
        }
        for(var i = 0; i< items_buy.length; i++) {
            total += parseFloat(items_buy[i].getElementsByClassName('total-buy')[0].innerText);
        }
        total_value.innerHTML = total + "₫";
    } else {
        total = 0;
        total_value.innerHTML = total + "₫";
        
        ordered_container.innerHTML += `
            <div class="warning w-fulll h-16 text-24 flex justify-center items-center text-blue-100">
                <h1 class="font-bold uppercase">Add Your Favourite Items to buy</h1>
            </div>
        `;
    }
}
// end funtion totalbuy

//
function addremovebuy() {
    var checkbuy = $$('.check');
    for(var i = 0; i<checkbuy.length; i++) {
        var checkbtn = checkbuy[i].getElementsByTagName('input')[0];
        console.log(i);
        checkbtn.addEventListener('change', function(event) {
            if(event.target.checked == true) {
                let item_checked = event.target.parentElement.parentElement;
                item_checked.classList.add("text-blue-100");
                let data = item_checked.getAttribute("data-key");
                let src_item_cart = item_checked.getElementsByClassName("img-item-cart-box")[0].getElementsByTagName("img")[0].src;
                let name_item_cart  = item_checked.getElementsByClassName("name-product-box")[0].getElementsByTagName("span")[0].innerText;
                let price_item_cart = item_checked.getElementsByClassName("price-box")[0].getElementsByTagName("span")[0].innerText;
                let quantity_item_cart = item_checked.getElementsByClassName("quantity-box")[0].getElementsByClassName("quantity")[0].getElementsByTagName("input")[0].value;
                let total_item_cart = item_checked.getElementsByClassName("total-box")[0].getElementsByTagName("span")[0].innerText;
                let items_order_ctn = $('.items-order-container');
                items_order_ctn.innerHTML += `
                <div class="item-buy m-2 grid grid-cols-5 gap-0.5 text-center items-center" data-key="${data}">
                    <div class="h-20">
                        <img class="img-buy h-full" src="${src_item_cart}" alt="">
                    </div>
                    <div class=""><span class="name-buy">${name_item_cart}</span></div>
                    <div class=""><span class="price-buy">${price_item_cart}</span></div>
                    <div class=""><span class="quantity-buy">${quantity_item_cart}</span></div>
                    <div class=""><span class="total-buy">${total_item_cart}</span></div>
                    
                </div>
                `;
                totalbuy();
            } else {
               let item_buy = $$('.item-buy');
                for(var i = 0; i<item_buy.length; i++) {
                    if(item_buy[i] != undefined) {
                        if(item_buy[i].getAttribute("data-key") == event.target.parentElement.parentElement.getAttribute("data-key")) {
                            item_buy[i].remove();
                            event.target.parentElement.parentElement.classList.remove('text-blue-100')
                            totalbuy();
                        }
                    }
                }
            }
            
        });
    }
}

// end function add + remove ()

function removefromcart() {
    var delete_btns = $$('.delete-btn');
    console.log(delete_btns.length);
    for(var i = 0; i<delete_btns.length; i++) {
        delete_btns[i].addEventListener('click', (event) => {
            let item_rm = event.target.parentElement.parentElement;
            let list_item_buy = $$('.item-buy')
            if(list_item_buy.length > 0) {
                list_item_buy.forEach(element => {
                    if(element.getAttribute('data-key') == item_rm.getAttribute('data-key'))
                        element.remove();
                        totalbuy();
                });
            }
            console.log(item_rm.getAttribute('data-key'), list_item_buy);
            event.target.parentElement.parentElement.remove();
            checkcartempty();
        });
    }
}


function checkcartempty() {
    var car_items = $$('.item-cart');
    if(car_items.length == 0 ) {
        var your_cart = $('.items-cart');
        your_cart.innerHTML += `
            <div class="w-full h-32 flex items-center justify-center">
                <h1>Your Cart Is Empty!!!</h1>
                <a href="/products" class="p-2 rounded-lg ml-3 bg-blue-100 text-aliceblue">Shop now</a>
            </div>
        `;
    }
}



function quantity_updatetotalbuy(cart_item) {
    let items_buy = $$('.item-buy');
    for(var i = 0; i<items_buy.length; i++) {
        if(items_buy[i].getAttribute('data-key') == cart_item.getAttribute('data-key')) {
            items_buy[i].getElementsByClassName('quantity-buy')[0].innerHTML = cart_item.getElementsByClassName('num')[0].value;
            items_buy[i].getElementsByClassName('total-buy')[0].innerText = cart_item.getElementsByClassName('total')[0].innerText;
            totalbuy();
        }
    }

}