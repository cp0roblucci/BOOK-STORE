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
            if(quantity_item.value > 1) {
                quantity_item.value--;
                sum_item.setAttribute('data-price-total', parseFloat(price_item.getAttribute('data-price'))*quantity_item.value);
                sum_item.innerHTML = (parseFloat(price_item.getAttribute('data-price'))*quantity_item.value).toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
                quantity_updatetotalbuy(item_cart);
            }
                
        });
        plus_btn.addEventListener('click', function(event) {
            let item_cart = event.target.parentElement.parentElement.parentElement;
            let quantity_item = item_cart.getElementsByClassName('num')[0];
            let sum_item = item_cart.getElementsByClassName('total')[0];
            let price_item = item_cart.getElementsByClassName('price')[0];
            quantity_item.value++;
            sum_item.setAttribute('data-price-total', parseFloat(price_item.getAttribute('data-price'))*quantity_item.value);
            sum_item.innerHTML = (parseFloat(price_item.getAttribute('data-price'))*quantity_item.value).toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
            quantity_updatetotalbuy(item_cart);
        });
     
    };   
}


//tong gia tri don dat hang
function totalbuy() {
    var total_value = $('.total-value');
    let items_buy = $$('.item-buy');
    var ordered_container = $('.items-order-container');
    // let iptotal = $('#iptotal');
    var total = 0;
    if(items_buy.length > 0) {
        if(ordered_container.getElementsByClassName('warning').length != 0) {
            ordered_container.getElementsByClassName('warning')[0].remove();
        }
        for(var i = 0; i< items_buy.length; i++) {
            total += parseFloat(items_buy[i].getElementsByClassName('total-buy')[0].getAttribute('data-price-total-buy'));
        }
        total_value.innerHTML = total.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
        total_value.setAttribute('data-total', total);
        // iptotal.value = total;
    } else {
        total = 0;
        total_value.innerHTML = total.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
        total_value.setAttribute('data-total', total);
        // iptotal.value = total;
        ordered_container.innerHTML += `
            <div class="warning w-fulll h-16 text-24 flex justify-center items-center text-red-500">
                <h1 class="font-bold uppercase">Hãy chọn sản phẩm!!!</h1>
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
                let data_type = item_checked.getAttribute("data-type");
                let src_item_cart = item_checked.getElementsByClassName("img-item-cart-box")[0].getElementsByTagName("img")[0].src;
                let name_item_cart  = item_checked.getElementsByClassName("name-product-box")[0].getElementsByTagName("span")[0].innerText;
                let price_item_cart = item_checked.getElementsByClassName("price-box")[0].getElementsByTagName("span")[0].innerText;
                let quantity_item_cart = item_checked.getElementsByClassName("quantity-box")[0].getElementsByClassName("quantity")[0].getElementsByTagName("input")[0].value;
                let total_item_cart = item_checked.getElementsByClassName("total-box")[0].getElementsByTagName("span")[0].innerText;
                let items_order_ctn = $('.items-order-container');
                items_order_ctn.innerHTML += `
                <div class="item-buy m-2 grid grid-cols-5 gap-0.5 text-center items-center text-14" data-key="${data}" data-type="${data_type}">
                    <div class="h-20">
                        <img class="img-buy h-full" src="${src_item_cart}" alt="">
                    </div>
                    <div class=""><span class="name-buy">${name_item_cart}</span></div>
                    <div class=""><span class="price-buy">${price_item_cart}</span></div>
                    <div class=""><span class="quantity-buy">${quantity_item_cart}</span></div>
                    <div class=""><span class="total-buy" data-price-total-buy="${item_checked.getElementsByClassName("total-box")[0].getElementsByTagName("span")[0].getAttribute('data-price-total')}">${total_item_cart}</span></div>
                </div>
                `;
                totalbuy();
            } else {
               let item_buy = $$('.item-buy');
                for(var i = 0; i<item_buy.length; i++) {
                    if(item_buy[i] != undefined) {
                        if(item_buy[i].getAttribute("data-key") == event.target.parentElement.parentElement.getAttribute("data-key")) {
                            item_buy[i].remove();
                            event.target.parentElement.parentElement.classList.remove('text-blue-100');
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
            let item_rm = event.target.parentElement.parentElement.parentElement;
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
            items_buy[i].getElementsByClassName('total-buy')[0].setAttribute('data-price-total-buy', cart_item.getElementsByClassName('total')[0].getAttribute('data-price-total'));
            totalbuy();
        }
    }

}

//show transaction

var buybtn = $('.buybtn');
var items_chosen = $('.items-chosen');

buybtn.addEventListener('click', function (e) {

    let quantity_buys = $$('.quantity-buy');
    let items_id = $$('.item-buy');
    let total = $('.total-value'); 
    let checked = $('#checkempty');
    if(items_id.length !== 0) {
        checked.setAttribute('value', 1);
    }
    quantity_buys.forEach((element, index) => {
        items_chosen.innerHTML += `
            <input type="hidden" name="item${items_id[index].getAttribute('data-key')}" value="${items_id[index].getAttribute('data-key')}">
            <input type="hidden" name="quantity${items_id[index].getAttribute('data-key')}" value="${element.innerText}">
            <input type="hidden" name="category${items_id[index].getAttribute('data-key')}" value="${items_id[index].getAttribute('data-type')}">
        `;
        
        
    });
    items_chosen.innerHTML += `
        <input type="hidden" name="total" value="${total.getAttribute('data-total')}">
    `;
});

///payments



// getdata topost