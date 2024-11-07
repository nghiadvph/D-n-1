<main>
<section class="row">
            <section class="row titel md20">
                <h2>DANH SÁCH THỐNG KÊ</h2>
            </section>
            <section class="row conten">
                <form accept="" method="post">
                    <section class="row md20 danh">
                    <table >
                       <tr>
                       <th>Mã danh mục</th>
                       <th>Tên danh mục</th>
                       <th>Số lượng</th>
                       <th>Giá cao nhất</th>
                       <th>Giá thấp nhất</th>
                       <th>Giá trung bình</th>
                       </tr>
                       <?php
                       foreach ($listtk as $tk) {
                        extract($tk);
                        echo ' <tr>
                        <td>'.$madm.'</td>
                        <td>'.$namedm.'</td>
                        <td>'.$countsp.'</td>
                        <td>'.$maxprice.'</td>
                        <td>'.$minprice.'</td>
                        <td>'.$avgprice.'</td>
                       </tr>';
                       }
                       ?>
                    </table>
                    </section>
                    <section class="md20">
                        <a href="index.php?act=bieudo"><input type="button" value="Xem biểu đồ"></a>
                    </section>
                </form>
            </section>
        </section>
</main>