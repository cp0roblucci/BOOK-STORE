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


	<title>Bán cá</title>
	<style>
		/* Thiết lập kiểu cho button danh mục */
		.category-btn {
			background-color: #4CAF50;
			border: none;
			color: white;
			padding: 10px 20px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 10px 2px;
			cursor: pointer;
			border-radius: 5px;
		}

		/* Thiết lập kiểu cho các sản phẩm */
		.product {
			border: 1px solid #ddd;
			border-radius: 5px;
			padding: 10px;
			margin: 10px;
			width: 300px;
			float: left;
			box-sizing: border-box;
		}

		.product img {
			max-width: 100%;
			height: auto;
		}

		/* Thiết lập kiểu cho phần lọc sản phẩm */
		.filter-btn {
			background-color: #008CBA;
			border: none;
			color: white;
			padding: 10px 20px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 10px 2px;
			cursor: pointer;
			border-radius: 5px;
		}
	</style>
</head>
<body>
	<h1>Bán cá</h1>
	<button class="category-btn" id="all-products-btn">Tất cả sản phẩm</button>
	<button class="category-btn" id="loai1-btn">Loại 1</button>
	<button class="category-btn" id="loai2-btn">Loại 2</button>
	<button class="category-btn" id="loai3-btn">Loại 3</button>

	<div id="product-container">
		<!-- Sản phẩm -->
		<div class="product loai1">
			<img src="https://via.placeholder.com/300x200?text=Loai+1">
			<h2>Sản phẩm 1</h2>
			<p>Mô tả sản phẩm 1</p>
		</div>
		<div class="product loai2">
			<img src="https://via.placeholder.com/300x200?text=Loai+2">
			<h2>Sản phẩm 2</h2>
			<p>Mô tả sản phẩm 2</p>
		</div>
		<div class="product loai1">
			<img src="https://via.placeholder.com/300x200?text=Loai+1">
			<h2>Sản phẩm 3</h2>
			<p>Mô tả sản phẩm 3</p>
		</div>
		<div class="product loai3">
			<img src="https://via.placeholder.com/300x200?text=Loai+3">
			<h2>Sản phẩm




			<p>Mô tả sản phẩm 4</p>
		</div>
		<div class="product loai2">
			<img src="https://via.placeholder.com/300x200?text=Loai+2">
			<h2>Sản phẩm 5</h2>
			<p>Mô tả sản phẩm 5</p>
		</div>
		<div class="product loai3">
			<img src="https://via.placeholder.com/300x200?text=Loai+3">
			<h2>Sản phẩm 6</h2>
			<p>Mô tả sản phẩm 6</p>
		</div>
	</div>

	<script>
		// Lấy tất cả các button danh mục
		const categoryBtns = document.querySelectorAll('.category-btn');

		// Lấy phần container của sản phẩm
		const productContainer = document.getElementById('product-container');

		// Lặp qua từng button danh mục và thêm event listener cho nó
		categoryBtns.forEach(function(btn) {
			btn.addEventListener('click', function() {
				// Lấy id của button
				const categoryId = this.id;

				// Lặp qua từng sản phẩm và ẩn/hiện sản phẩm theo loại
				productContainer.querySelectorAll('.product').forEach(function(product) {
					if (categoryId === 'all-products-btn' || product.classList.contains(categoryId)) {
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