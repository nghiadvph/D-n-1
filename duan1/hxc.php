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