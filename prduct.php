<?php
    session_start();
    ob_start();

    $productId = $_REQUEST['id'];
    $conn = mysqli_connect('localhost', 'root', '','banhang');

    if(isset($_POST['editor'])) {
        $edit = "UPDATE `hanghoa` SET `motasp` = '" . $_POST['editor'] .  "' WHERE `hanghoa`.`id` =". $productId;
        $update = mysqli_query($conn, $edit); 
    }

    $findQuery = "SELECT * FROM hanghoa WHERE id =". $productId;
    $rs = mysqli_query($conn, $findQuery);
    $detail = mysqli_fetch_assoc($rs);

    $name = $detail['tenmathang'];
    $price = $detail['dongia'];
    $description = $detail['motasp'];
    $image = $detail['anhsp'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $name ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
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
        .category {
            list-style: none;
            display: flex;
            padding: 0;
            background: #ecf0f1;
        }
        .category li {
            padding: 20px;
            text-transform: uppercase;
            transition: all 0.5s;
        }
        .category li a {
            text-decoration: none;
            font-weight: bold;
            color: #2c3e50;
        }
        .category li:hover {
            background: #f1c40f;
        }
        .category li:hover a {
            color: #fff;
        }
        .img-fit {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .productDetail h1 {
            color: #636e72;
        }
        .price {
            color: #34495e;
            font-size: 24px;
            font-weight: bold;
        }
        #editor {
            width: 100%;
        }
        .hide {
            display: none;
        }
        .show {
            display: block;
        }
    </style>
</head>
<body>
    <?php include('menu.php') ?>
    <header>
        <?php include('header.php'); ?>
    </header>

    <main>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="productImg">
                        <img class="img-fit" src="<?php echo $image ?>" alt="anh san pham">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="productDetail">
                        <h1 class="text-uppercase"><?php echo $name ?></h1>
                        <p class="price"><?php echo $price ?> đồng </p>
                        <p class="desC"><?php echo $description ?></p>
                        <div class="hide" id="editCont">
                            <form action="" method="POST">
                                <textarea name="editor" id="editor"><?php echo $description ?></textarea>
                                <script>
                                    CKEDITOR.replace( 'editor' );
                                </script>
                                <p class="text-right"><input class="btn btn-success mt-1" type="submit" value="Hoàn tất"></p>
                            </form>
                            <hr>
                        </div>
                        <p><button onclick="editToggle()" id="editBtn" class="btn btn-primary mt-1" <?php 
                            if($_SESSION['username'] == 'admin')
                                echo '';
                            else echo 'disabled';    
                        ?> >Sửa mô tả</button></p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        function editToggle() {
            let editor = document.getElementById('editCont');
            if(editor.classList.contains('hide')) {
                editor.classList.remove('hide');
                document.getElementById('editBtn').innerHTML="Đóng";
            } else {
                document.getElementById('editBtn').innerHTML="Sửa mô tả";
                editor.classList.add('hide');
            }
        }
    </script>
</body>
</html>
<?php ob_end_flush(); ?>