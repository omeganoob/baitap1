<?php session_start(); ?>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav nav-pills">
        <li class="nav-item">
            <a href="home.php" class="nav-link">Trang chủ</a>
        </li>
        <li class="nav-item">
            <a href="products.php" class="nav-link">Sản phẩm</a>
        </li>
        <?php
            if($_SESSION['username'] == 'admin') {
                echo '<li>
                        <a class="nav-link" href="categoryManage.php">Quản lý danh mục</a> 
                    </li>
                    <li>
                        <a class="nav-link" href="productManage.php">Quản lý hàng hóa</a>
                    </li>';
            }
        ?>
    </ul>
    <div class="nav-item ml-auto">
            <?php 
                if(isset($_SESSION['username'])) {
                    echo '<p class="text-white">'.$_SESSION['username'].'
                    <a href="login.php">Đăng xuất</a></p>';
                }
                else {
                    echo '<a href="login.php" class="nav-link">Đăng nhập</a>';
                }
            ?>
    </div>
</nav>