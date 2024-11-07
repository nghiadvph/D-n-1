<!DOCTYPE html>
<html>
<head>
    <title>Nhập và In Số Lượng</title>
</head>
<body>
    <form action="index.php?act=insl" method="POST">
        Nhập số lượng: <input type="number" name="soluong">
        <input type="submit" name="in" value="In số lượng">
    </form>
    
    <?php
    // Xử lý dữ liệu số lượng khi form được gửi đi
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Kiểm tra xem có dữ liệu số lượng được gửi lên không
        if (isset($_POST['soluong'])) {
            $soluong = $_POST['soluong'];
            echo "Số lượng bạn đã nhập là: " . $soluong;
        } else {
            echo "Vui lòng nhập số lượng và ấn nút In số lượng.";
        }
    }
    ?>
</body>
</html>
<?php
if (isset($_GET['act'])) {
    $act = ($_GET['act']);
    switch ($act) {
       case 'insl':
        if (isset($_POST['in']) && ($_POST['in'])) {
            header("Location:hxc.php");
         }
        break;
       }
    }
?>