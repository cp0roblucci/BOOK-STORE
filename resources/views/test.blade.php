<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Cá Cảnh</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <title>Trang chủ</title>
    @vite(['./resources/css/app.css','./resources/js/homepage.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!DOCTYPE html>
    
    <title>Shop Cá</title>
        <style>
            body {
                font-family: Arial, sans-serif;
            }
            ul {
                list-style: none;
                padding: 0;
                margin: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-wrap: wrap;
            }
            li {
                padding: 8px 16px;
                margin: 5px;
                background-color: #eee;
                border-radius: 5px;
                cursor: pointer;
            }
            li.active {
                background-color: #4CAF50;
                color: white;
            }
            .product {
                display: none;
                padding: 20px;
                border: 1px solid #ddd;
                border-radius: 5px;
                width: 250px;
                margin: 10px;
                float: left;
                box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
            }
            .product img {
                max-width: 100%;
                height: auto;
                display: block;
                margin: 0 auto;
                margin-bottom: 10px;
            }
            h2 {
                margin-top: 0;
                font-size: 20px;
                font-weight: bold;
                color: #555;
                text-align: center;
                text-transform: uppercase;
            }
            .clearfix {
                clear: both;
            }
        </style>
    </head>
    <body>
        <h1>Shop Cá</h1>
        <ul id="categories">
            <li class="active" data-category="all">Tất cả</li>
            <li data-category="koi">Cá Koi</li>
            <li data-category="goldfish">Cá Vàng</li>
            <li data-category="tetra">Cá Tép</li>
        </ul>
        <div class="clearfix"></div>
        <div id="products">
            <div class="product" id="koi">
                <h2>Cá Koi</h2>
                <img src="https://cdn.pixabay.com/photo/2016/11/21/13/39/koi-1842263_960_720.jpg" alt="Cá Koi">
                <p>Giá: 100,000 VNĐ</p>
            </div>
            <div class="product" id="goldfish">
                <h2>Cá Vàng</h2>
                <img src="https://cdn.pixabay.com/photo/2018/01/31/05/32/goldfish-3127758_960_720.jpg" alt="Cá Vàng">
                <p>Giá: 50,000 VNĐ</p>
            </div>
            <div class="product" id="tetra">
                <h2>Cá Tép</h2>
                <img src="https://cdn.pixabay.com/photo/2018/05/13/17/20/fish-3391076_960_720.jpg" alt="Cá Tép">
                <p>Giá: 80,000 VNĐ</p>
            </div>
            <div class="product" id="tetra">
                <h2>Cá Tép</h2>
                <img src="https://cdn.pixabay.com/photo/2018/05/13/17/20/fish-3391076_960_720.jpg" alt="Cá Tép">
                <p>Giá: 80,000 VNĐ</p>
            </div>
        </div>
        <script>
            const categories = document.querySelectorAll('#categories li');
            const products = document.querySelectorAll('.product');
            
            categories.forEach(category => {
                category.addEventListener('click', () => {
                    // Loại bỏ lớp active khỏi tất cả các danh mục sản phẩm
                    // Thêm lớp active cho danh mục sản phẩm được chọn
                    category.classList.add('active');
                    
                    const categoryValue = category.getAttribute('data-category');
                    // Lặp qua tất cả các sản phẩm và hiển thị sản phẩm thuộc danh mục được chọn
                    products.forEach(product => {
                        if (product.getAttribute('id') === categoryValue || categoryValue === 'all') {
                            product.style.display = 'block';
                        } else {
                            product.style.display = 'none';
                        }
                    });
                });
            });
        </script>
    </body>
    </html>