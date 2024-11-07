<main>
<section class="row">
            <section class="row titel">
                <h2>DANH SÁCH LOẠI HÀNG</h2>
            </section>
            <section class="row conten">
                <form accept="" method="post">
                    <section class="row md20 danh">
                    <table >
                       <tr>
                       <th></th>
                       <th>Mã loại</th>
                       <th>Tên loại</th>
                       <th></th>
                       </tr>
                       <?php 
                       foreach ($dsdanhmuc as $danhmuc) {
                           extract($danhmuc);
                           $suadm="index.php?act=suadm&id=".$id;
                           $xoadm="index.php?act=xoadm&id=".$id;
                           echo '<tr>
                           <td><input type="checkbox"</td>
                           <td>'.$id.'</td>
                           <td>'.$name.'</td>
                           <td><a href="'.$suadm.'"><input type="button" value="Sửa"></a></td>
                          </tr>';
                       }
                       ?>
                    </table>
                    </section>
                    <section class="md20">
                        <input type="button" value="Chọn tất cả">
                        <input type="button" value="Bỏ chọn tất cả">
                        <input type="button" value="Xóa tất cả các mục">
                        <a href="index.php?act=adddm"><input type="button" value="Nhập thêm"></a>
                    </section>
                </form>
            </section>
                    </main>
        </section>