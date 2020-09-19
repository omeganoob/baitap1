<?php
    $conn = mysqli_connect('localhost', 'root','','banhang');
    $emptyErr="";
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $add = "INSERT INTO `hanghoa` (`tenmathang`, `idDanhmuc`, `soluong`, `dongia`, `motasp`, `anhsp`) VALUES ('".$_POST['prodName']."', '".$_POST['cateId']."', '".$_POST['quantity']."', '".$_POST['price']."', '".$_POST['describe']."', '".$_POST['image']."');";
        $excute = mysqli_query($conn, $add);
    }
    if($_SERVER['REQUEST_METHOD'] == 'GET') {
        $delete = "DELETE FROM `hanghoa` WHERE `id` = ".$_GET['deleteId'];
        $confirm = mysqli_query($conn, $delete);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý hàng hóa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style>
        body::-webkit-scrollbar {
            width: 0.25em;
        }
        body::-webkit-scrollbar-track {
            background: #1e1e24;
        }
        body::-webkit-scrollbar-thumb {
            background: #f1c40f;
        }
        .hide {
            display: none;
        }
    </style>
</head>
<body>
    <?php include('menu.php'); ?>
    <h1 class="text-center mt-2">Quản lý hàng hóa</h1>
    <main>
        <div class="container">
            <div class="table-responsive-md">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên mặt hàng</th>
                            <th>ID danh mục</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Mô tả sản phẫm</th>
                            <th>Ảnh sản phẩm</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // $conn = mysqli_connect('localhost', 'root','','banhang');
                            $query = "SELECT * FROM hanghoa";
                            $rs = mysqli_query($conn, $query);
                            
                            while($row = mysqli_fetch_assoc($rs)) {
                                echo '<tr>
                                        <td>'.$row['id'].'</td>
                                        <td><a href="prduct.php?id='.$row['id'].'">'.$row['tenmathang'].'</a></td>
                                        <td>'.$row['idDanhmuc'].'</td>
                                        <td>'.$row['soluong'].'</td>
                                        <td>'.$row['dongia'].'</td>
                                        <td>'.$row['motasp'].'</td>
                                        <td>'.$row['anhsp'].'</td>
                                        <td>
                                            <div class="mb-1">
                                                <form action ="productManage.php" method="GET">
                                                    <input class="hide" type="number" name="deleteId" value="'.$row['id'].'">
                                                    <input class="btn btn-danger" type="submit" value="Xóa">   
                                                </form>
                                            </div>
                                            <div>
                                                <a href="editProd.php?id='.$row['id'].'" class="btn btn-primary">Sửa</a>   
                                            </div>
                                        </td>
                                    </tr>';
                            }
                        ?>
                    <tbody>  
                </table>
                <h3>Thêm sản phẩm</h3>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                    <table class="table">
                        <tr>
                            <td>
                                <input class="form-control" type="text" name="prodName" placeholder="Tên sản phẩm" required>
                                <span class="text-danger"><?php echo $emptyErr ?></span>
                            </td>
                            <td>
                                <select class="form-control" name="cateId" id="cateId">
                                    <?php 
                                        $sql="SELECT * FROM danhmuc";
                                        $rs = mysqli_query($conn, $sql);
                                        while($row = mysqli_fetch_assoc($rs)) {
                                            echo '<option value="'.$row['id'].'">'.$row['tendanhmuc'].'</option>';
                                        }
                                    ?>
                                </select>
                            </td>
                            <td>
                                <input class="form-control" name="quantity" type="number" min="1" max="999" placeholder="số lượng" required>
                            </td>
                            <td>
                                <input class="form-control" name="price" type="text" placeholder="đơn giá" required>
                            </td>
                            <td>
                                <input class="form-control" name="describe" type="text" placeholder="Mô tả">
                            </td>
                            <td>
                                <input class="form-control" name="image" type="text" placeholder="Link ảnh" required>
                            </td>
                            <td>
                                <input class="form-control btn-success" type="submit" value="Thêm">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </main>
</body>
</html>