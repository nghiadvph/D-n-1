<main class="main">
    <section class="row">
        <section class="k">ĐƠN HÀNG CỦA TÔI</section>
        <section class="row boxconten mb danh">
            <form method="get">
            <table>
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Ngày đặt</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Tình trạng đơn hàng</th>
                    <th>Chi tiết đơn hàng</th>
                    <th>Hủy đơn hàng</th>
                </tr>
                <?php
                if (isset($listbill)) {
                    foreach ($listbill as $mybill) {
                        extract($mybill);
                        $i=0;
                        $ttdh = get_ttdh($mybill['bill_status']);
                        $count = loadall_cart_count1($mybill['id']);
                        $chitiet = "index.php?act=chitiet&idbill=" . $id;
                        $xoadonhang="index.php?act=delete&id=".$id;
                        $xoasp = '<input class="xoa" type="button" value="Hủy đơn hàng" onclick="confirmDelete('.$i.')">';
                        if (get_ttdh($mybill['bill_status']) == 'Đơn hàng mới') {
                            echo '<tr>
                                <td>DAM- ' . $mybill['id'] . '</td>
                                <td>' . $mybill['ngaydathang'] . '</td>
                                <td>' . $count . '</td>
                                <td>' . $mybill['total'] . 'VNĐ</td>
                                <td>' . $ttdh . '
                                </td>
                                <td><a href="' . $chitiet . '"><input type="button" name="chitiet" value="chi tiết"></a></td>
                                <td><a href="'.$xoadonhang.'"><input type="button" name="xoadonhang" value="Hủy đơn hàng"></a></td>
                            </tr>';
                        } else {
                            echo '<tr>
                                <td>DAM- ' . $mybill['id'] . '</td>
                                <td>' . $mybill['ngaydathang'] . '</td>
                                <td>' . $count . '</td>
                                <td>' . $mybill['total'] . 'VNĐ</td>
                                <td>' . $ttdh . '
                                </td>
                                <td><a href="' . $chitiet . '"><input type="button" name="chitiet" value="chi tiết"></a></td>
                            </tr>';
                        }

                    }
                }
                ?>
            </table>
            </form>
        </section>
    </section>
    <script>
        function confirmDelete(index) {
            if (confirm('Bạn có chắc chắn muốn hủy đơn hàng này không?')) {
                window.location.href = 'index.php?act=delcart1&id=' + index;
            }
        }
    </script>
</main>