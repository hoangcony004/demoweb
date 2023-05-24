<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>trang chu</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style/style-trangchu.css'>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">


        <style>
            #product{
                display: inline-block;
            }
            </style>
    <script>
        $(document).ready(function () {
            $('#icon').click(function () {
                $('ul').toggleClass('show');
            });
        });
    </script>
</head>

<body>
    <nav class="header">
        <label class="logo">DesignX</label>
        <ul class="active">
            <li><a class="a-menu" href="#"><i class="fa-solid fa-house"></i> Trang Chủ</a></li>
            <li><a class="a-menu" href="#"><i class="fa-brands fa-product-hunt"></i> Sản Phẩm</a></li>
            <li><a class="a-menu" href="#"><i class="fa-solid fa-newspaper"></i> Tin Tức</a></li>
            <li><a class="a-menu" href="#"><i class="fa-sharp fa-regular fa-credit-card"></i> Thanh Toán & Tiện ích</a>
            </li>
            <li><a class="user" href="dangnhap-dangky.php"><i class="fa-solid fa-user"></i> Tài Khoản</a></li>
            <li><a class="user" href="logout.php"><i class="fa-solid fa-user"></i> Đăng xuất</a></li>
        </ul>
        <label id="icon">
            <i class="fas fa-bars"></i>
        </label>
    </nav>
    <div class="menu-sanpham">
        <ul class="ul-sanpham">
            <li class="li-sanpham">
                <a class="a-sanpham" href="#"><i class="fa-solid fa-mobile-screen-button"></i> ĐIỆN THOẠI</a>
                <a class="a-sanpham" href="#"><i class="fa-solid fa-laptop"></i> lAPTOP</a>
                <a class="a-sanpham" href="#"><i class="fa-solid fa-tablet-screen-button"></i> MÁY TÍNH BẢNG</a>
                <a class="a-sanpham" href="#"><i class="fa-solid fa-computer"></i> PC-LINH KIỆN</a>
                <a class="a-sanpham" href="#"><i class="fa-solid fa-headphones-simple"></i> PHỤ KIỆN</a>
                <a class="a-sanpham" href="#"><i class="fa-sharp fa-solid fa-loader"></i> MÁY CŨ GIÁ RẺ</a>
                <a class="a-sanpham" href="#"><i class="fa-solid fa-star"></i> KHUYẾN MÃI</a>
                <a class="a-sanpham" href="#"><i class="fa-solid fa-sim-card"></i> SIM & THẺ</a>
                <a class="a-sanpham">
                    <input class="search" type="search" placeholder="Tìm kiếm...">
                    <button class="btn-iput" type="submit">
                        <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
                    </button>
                </a>
                <a class="a-sanpham" href="thanhtoan-giohang.php"><i class="fa-solid fa-cart-shopping"></i> GIỎ HÀNG</a>
            </li>
        </ul>
    </div>
    <br><br>
    <h1 style="text-align: center;">Các loại sản phẩm</h1>
    <br>
    <?php
            include 'connect.php';
            $sql = "SELECT * FROM product";
            $product = mysqli_query($conn, $sql);
            foreach ($product as $key => $value) { ?>
    <div id ="product" class="card">
        <div class="card-img">
            <img src="<?php echo $value['img_link']?>" alt="" width="190px" height="125px" style="cursor: pointer;">
        </div>
        <div class="card-info">
            <p class="text-title">
                <?php echo $value['name'] ?>
            </p>
            <p class="text-body">
                <?php echo $value['content'] ?>
            </p>
        </div>
        <div class="card-footer">
            <span class="text-title">
                <?php echo $value['price']?>
            </span>
            <div class="card-button">
                <a href="addtocart.php?id=<?php echo $value['id']?>"><i class="fa-solid fa-cart-shopping"></i></a>
            </div>
        </div>

    </div>
    <?php }?>
</body>

</html>