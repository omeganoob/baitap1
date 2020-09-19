<?php
    $conn = mysqli_connect('localhost', 'root','','banhang');
    $emptyErr="";
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(empty($_POST['categoryName'])) {
            $emptyErr ="Bạn chưa nhập tên danh mục";
        } else {
            $add = "INSERT INTO `danhmuc` (`id`, `tendanhmuc`) VALUES (NULL, '".$_POST['categoryName']."');";
            $excute = mysqli_query($conn, $add);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý danh mục</title>
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
    </style>
</head>
<body>
    <?php include('menu.php'); ?>
    <h1 class="text-center mt-2">Quản lý danh mục</h1>
    <main>
        <div class="container">
            <div class="table-responsive-md">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>ID danh mục</th>
                            <th>Tên danh mục</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // $conn = mysqli_connect('localhost', 'root','','banhang');
                            $query = "SELECT * FROM danhmuc";
                            $rs = mysqli_query($conn, $query);
                            
                            while($row = mysqli_fetch_assoc($rs)) {
                                echo '<tr>
                                        <td>'.$row['id'].'</td>
                                        <td>'.$row['tendanhmuc'].'</td>
                                    </tr>';
                            }
                        ?>
                    <tbody>  
                </table>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                    <table class="table">
                        <tr>
                            <td>
                                <input class="form-control" type="text" name="categoryName" placeholder="Thêm danh mục">
                                <span class="text-danger"><?php echo $emptyErr ?></span>
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