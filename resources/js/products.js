const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

//
document.getElementById("btnProductDetail").addEventListener("click", function() {
    window.location.href = "products_detail";
});

//
const listItems = document.querySelectorAll('#filter_btn li');

listItems.forEach((item) => {
  item.addEventListener('click', () => {
    console.log(`Bạn đã chọn loại sản phẩm: ${item.innerText}`);
  });
});

