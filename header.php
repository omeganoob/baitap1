<?php
    session_start();

    $conn = mysqli_connect('localhost', 'root', '', 'banhang');
    $categoryQuery = "SELECT * FROM danhmuc";
    $rs = mysqli_query($conn, $categoryQuery);
?>
<ul class="category">
<?php
    while($row = mysqli_fetch_assoc($rs)) {
        echo '<li>
                <a href="products.php?category='.$row['id'].'">'.$row['tendanhmuc'].'</a>   
            </li>';
    }
?>
</ul>