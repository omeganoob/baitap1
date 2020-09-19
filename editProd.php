<?php
    $ID = $_REQUEST['id'];
    $conn = mysqli_connect('localhost', 'root','','banhang');

    if(isset($_POST['submitform'])) {
        $edited = "UPDATE `hanghoa` SET 
        `tenmathang` = '".$_POST['pname']."', 
        `idDanhmuc` = '".$_POST['cateId']."', 
        `soluong` = '".$_POST['quantity']."', 
        `dongia` = '".$_POST['price']."', 
        `anhsp` = '".$_POST['pimage']."',
        `motasp` = '".$_POST['describe']."' 
        WHERE `hanghoa`.`id` =".$ID;

        $update = mysqli_query($conn, $edited);
    }

    $query = "SELECT * FROM hanghoa WHERE id =".$ID;
    $sql = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($sql);

    $name = $result['tenmathang'];
    $cateId = $result['idDanhmuc'];
    $quantity = $result['soluong'];
    $price = $result['dongia'];
    $describe = $result['motasp'];
    $image = $result['anhsp'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
    <style>
        .hide {
            display: none;
        }
        label {
            font-size: 2em;
            font-weight: bold;
        }
        @media screen and (max-width: 720px) {
            label {
                display: none;
            }
            h3 {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <?php include('menu.php'); ?>
    <main>
        <h3 class="text-center mt-3">Chỉnh sửa : <span class="text-danger font-italic"><?php echo $ID ."-". $name ?></span></h3>

        <div class="container">
            <div class="editorCont">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="name">ID: </label>
                        <input type="number" class="form-control" name="id" id="id" value="<?php echo $ID ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="name">Tên sản phẩm: </label>
                        <input type="text" class="form-control" name="pname" id="pname" placeholder="Tên sản phẩm" value="<?php echo $name ?>">
                    </div>
                    <div class="form-group">
                        <label for="cateId">Danh mục: </label>
                        <select class="form-control" name="cateId" id="cateId">
                            <?php
                                $browse = "SELECT * FROM danhmuc";
                                $browser = mysqli_query($conn, $browse);
                                while($row = mysqli_fetch_assoc($browser)) {
                                    $selected ="";
                                    if($row['id'] == $cateId) {
                                        $selected = 'selected';
                                    }
                                    echo '<option value ="'.$row['id'].'"'.$selected.'>'.$row['tendanhmuc'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Số lượng: </label>
                        <input type="number" min="0" class="form-control" name="quantity" id="quantity" placeholder="Số lượng" value="<?php echo $quantity ?>">
                    </div>
                    <div  class="form-group">
                        <label for="price">Đơn giá: </label>
                        <input type="text" class="form-control" name="price" id="price" placeholder="Đơn giá" value="<?php echo $price ?>">
                    </div>
                    <div class="form-group">
                        <div><label for="describe">Mô tả: </label></div>
                        <textarea placeholder="Mô tả" name="describe" id="describe"><?php echo $describe ?></textarea>
                            <script>
                                CKEDITOR.replace( 'describe' );
                            </script>
                    </div>
                    <div class="form-group">
                        <label for="image">Link ảnh: </label>
                        <input placeholder="Link ảnh" type="text" class="form-control" name="pimage" id="pimage" value="<?php echo $image ?>">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-warning w-100" name="submitform" type="submit" value="Hoàn tất">
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>