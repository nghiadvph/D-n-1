<?php
if (is_array($suabill)) {
    extract($suabill);
    // var_dump($suabill);
}
?>
<main>
    <section class="row">
        <section class="row title">
            <h2>CẬP NHẬT ĐƠN HÀNG</h2>
        </section>
        <section class="row conten">
            <form action="index.php?act=updatedonhang" method="post" enctype="multipart/form-data">
                Tình trạng:
                <br>
                <table>
                    <td><input type="radio" name="ttdh" value="0">Đơn hàng mới
                        <input type="radio" name="ttdh" value="1">Đang xử lý
                        <input type="radio" name="ttdh" value="2">Đang giao hàng
                    <input type="radio" name="ttdh" value="3">Đã giao hàng</td>
                    </td>
                </table>
                <?php
                    $pttt_value = $bill_status;
                ?>
                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        var pttt_value = <?php echo $pttt_value; ?>; // Lấy giá trị từ PHP

                        var radioButtons = document.getElementsByName('ttdh');
                        radioButtons.forEach(function (radio) {
                            if (parseInt(radio.value) === pttt_value) {
                                radio.checked = true; // Đặt radio button được chọn nếu giá trị trùng khớp
                            }
                        });
                    });
                </script>
                <section class="md20">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <input type="submit" name="capnhat" value="Cập nhật">
                    <input type="reset" value="Nhập lại">
                    <a href="index.php?act=dsdh"><input type="button" value="Danh sách"></a>
                </section>
            </form>
        </section>
    </section>
</main>
</section>