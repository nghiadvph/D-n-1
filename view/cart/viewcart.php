<main>
    <article>
        <section class="row">
            <section class="e">GIỎ HÀNG</section>
            <section class="row boxconten mb danh1">
                <form action="" method="GET">

                    <table>
                        <tr>
                            <!-- <th></th> -->
                            <th></th>
                            <th>Hình</th>
                            <th>Sản phẩm</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th>Thao tác</th>
                        </tr>
                        <?php foreach ($_SESSION['mycart'] as $item) :
                            // var_dump($_SESSION['mycart']);
                        ?>
                        <tr>
                            <!-- <td><input type="text" name="id" value="<?= $item['id'] ?>"></td> -->
                            <td><?= $item['id'] ?></td>
                            <td>
                                <img style="width: 70px;" src="<?= $img_path . $item['hinh'] ?>" alt="">
                            </td>
                            <td><?= $item['name'] ?></td>
                            <td><?= $item['pricekhuyenmai'] ?></td>
                            <td class="soluong">
                                <a style="text-decoration: none; font-size: 30px;"
                                    href="index.php?act=des&id=<?= $item['id'] ?>">-</a>
                                <input style="border: none;font-size: 25px;" name="soluong" id="soluong" value="<?= $item['soluong'] ?>" >
                                <a style="text-decoration: none;font-size: 20px; font-weight: bold;"
                                    href="index.php?act=inc&id=<?= $item['id'] ?>">+</a>
                            </td>
                            <td><?= $item['thanhtien'] = $item['soluong'] * $item['pricekhuyenmai'] ?> <span class="giatien1">VNĐ<span></td>
                            <td><a href="index.php?act=del&id=<?= $item['id'] ?>">Xóa</a></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    <!-- <input name="update" type="submit" value="Cập nhật"> -->
                </form>
            </section>
            <?php
            if(!empty($_SESSION['mycart'])){
                echo '<section class="row tieptuc">
                <a href="index.php?act=bill"><input type="submit" name="bill" value="Tiếp tục đặt hàng"></a> <a
                    href="index.php?act=delcart"><input type="button" value="Xóa giỏ hàng"></a>
            </section>';
            }else{

            }
            ?>
        </section>
    </article>
    <script>
    function confirmDelete(index) {
        if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')) {
            window.location.href = 'index.php?act=delcart&idcart=' + index;
        }
    }
    </script>
</main>