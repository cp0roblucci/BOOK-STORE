import axios from "axios";

const csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken;

const listBtnIncrease = document.querySelectorAll('.increase');
const listBtnDecrease = document.querySelectorAll('.decrease');
const listQuantity = document.querySelectorAll('.quantity');
const totalPrice = document.querySelector(".totalPrice");
const listTotal = document.querySelectorAll('.thanhtien');
const formatVND = (amount) => {
    var formatter = new Intl.NumberFormat('vi-VN', {
        style: 'decimal', 
        minimumFractionDigits: 0,
    });

    const formattedAmount = formatter.format(amount) + 'đ'

    return formattedAmount;
};

// function updateQuantity(productId, quantity, index) {
//     axios.post('/update-quantity-cart', {
//         productId,
//         quantity,
//     })
//     .then(res => {
//         listQuantity[index].innerText = quantity;

//         // Kiểm tra nếu giỏ hàng đã được cập nhật thành công
//         if (res.data.success) {
//             let itemTotal = quantity * res.data.products[productId].price;
//             listTotal[index].innerText = formatVND(itemTotal);
//             updateTotal(res.data);
//         } else {
//             // Hiển thị thông báo lỗi nếu cần
//             console.error("Cập nhật giỏ hàng không thành công.");
//         }
//     })
//     .catch(err => {
//         console.log(err);
//     });
// }
function updateQuantity(productId, quantity, index) {
    axios.post('/update-quantity-cart', {
        productId,
        quantity,
    })
    .then(res => {
        listQuantity[index].innerText = quantity;

        // Kiểm tra nếu giỏ hàng đã được cập nhật thành công
        if (res.data.success) {
            let itemTotal = quantity * res.data.products[productId].price;
            listTotal[index].innerText = formatVND(itemTotal);
            updateTotal(res.data);
        } else {
            // Hiển thị thông báo lỗi nếu cần
            console.error("Cập nhật giỏ hàng không thành công.");
        }
    })
    .catch(err => {
        console.log(err);
    });
}

function updateTotal(data) {
    if (data.success) {
        totalPrice.innerText = data.subtotal;
        
    }
   totalPrice.innerText = formatVND(total);
}
listBtnIncrease.forEach((btnIncrease, index) => {
    const productId = btnIncrease.dataset.productId;
    btnIncrease.addEventListener('click', () => {
        let currentQuantity = parseInt(listQuantity[index].innerText);
        currentQuantity++;

        updateQuantity(productId, currentQuantity, index);
    });
});

listBtnDecrease.forEach((btnDecrease, index) => {
    const productId = btnDecrease.dataset.productId;
    btnDecrease.addEventListener('click', () => {
        let currentQuantity = parseInt(listQuantity[index].innerText);
        if (currentQuantity > 1) {
            currentQuantity--;
            updateQuantity(productId, currentQuantity, index);
        }
    });
});

const listCheckboxes = document.querySelectorAll('.checkboxItem');
const paymentButton = document.getElementById('payment');

let selectedProducts = [];

listCheckboxes.forEach((checkbox) => {
    checkbox.addEventListener('change', () => {
        const productId = checkbox.value;

        if (checkbox.checked) {
            // Thêm vào danh sách sản phẩm được chọn nếu checkbox được chọn
            selectedProducts.push(productId);
        } else {
            // Xóa khỏi danh sách nếu checkbox bị hủy chọn
            selectedProducts = selectedProducts.filter(id => id !== productId);
        }
    });
});

// // paymentButton.addEventListener('click', () => {
// //     // Gửi danh sách sản phẩm được chọn qua route thanh toán
// //     window.location.href = `/checkout?selectedProducts=${selectedProducts.join(',')}`;
// // });
// // paymentButton.addEventListener('click', () => {
// //     // Kiểm tra xem có ít nhất một sản phẩm được chọn không
// //     if (selectedProducts.length > 0) {
// //         // Nếu có, thực hiện chuyển hướng
// //         window.location.href = `/checkout?selectedProducts=${selectedProducts.join(',')}`;
// //     } else {
// //         // Nếu không, hiển thị thông báo và ngăn chặn chuyển hướng
// //         alert("Vui lòng chọn ít nhất một sản phẩm để thanh toán.");
// //     }
// // });
// const errorMessage = document.getElementById('error-message');

// paymentButton.addEventListener('click', () => {
//     // Kiểm tra xem có ít nhất một sản phẩm được chọn không
//     if (selectedProducts.length > 0) {
//         // Nếu có, thực hiện chuyển hướng
//         window.location.href = `/checkout?selectedProducts=${selectedProducts.join(',')}`;
//     } else {
//         // Nếu không, hiển thị thông báo lỗi
//         errorMessage.style.display = 'block';
//         // Có thể thêm thêm logic xử lý tại đây, ví dụ như ẩn thông báo sau một khoảng thời gian
//     }
// });