<?php
    session_start();
    ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
        .pCard {
            padding: 1em;
            border-bottom: 3px solid #f1c40f;
        }
        .cardTxt {
            text-align: center;
            text-transform: uppercase;
            font-weight: bold;
            padding: .5em;
            border-radius: 10px;
            border: 1px solid #bdc3c7;
            transition: all 0.3s;
        }
        .cardTxt:hover {
            background-color: #f1c40f;
            border-color: #f1c40f;
        }
        .cardTxt:hover a {
            color: #fff;
        }
        .cardTxt a {
            color: #2c3e50;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <?php include('menu.php'); ?>
    <header>
        <?php include('header.php'); ?>
    </header>

    <main>
    <h1 class="text-center text-primary">Sản phẩm</h1>
    <div class="container mt-5">
        <div class="row">
    <?php
        $productQuery = "SELECT * FROM hanghoa";
        $rs2 = mysqli_query($conn, $productQuery);
        while($row = mysqli_fetch_assoc($rs2)) {
            echo '<div class="col-lg-3 col-md-6">
                    <div class="pCard">
                        <div class="cardImg">
                                <a href ="prduct.php?id='.$row['id'].'">
                                <img class="img-fit" src="'.$row['anhsp'].'" alt="">
                                </a>
                            <div class="cardTxt">
                                <a href="prduct.php?id='.$row['id'].'">'.$row['tenmathang'].'</a>
                            </div>
                        </div> 
                    </div> 
                </div>';
        }
    ?>
        </div>
    </div>
    </main>
</body>
</html>
<?php
    ob_end_flush();
?>