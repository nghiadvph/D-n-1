<main>
<section class="row">
            <section class="row titel">
                <h2>DANH SÁCH BÌNH LUẬN</h2>
            </section>
            <section class="row conten">
                <form accept="" method="post">
                    <section class="row md20 dang">
                    <table >
                       <tr>
                       <th></th>
                       <th>Id</th>
                       <th>Nội dung</th>
                       <th>Iduser</th>
                       <th>Idpro</th>
                       <th>Ngày bl</th>
                       <th></th>
                       </tr>
                       <?php 
                       foreach ($dsbinhluan as $binhluan) {
                           extract($binhluan);
                           $suabl="index.php?act=suabl&id=".$id;
                           $xoabl="index.php?act=xoabl&id=".$id;
                           echo '<tr>
                           <td><input type="checkbox"</td>
                           <td>'.$id.'</td>
                           <td>'.$noidung.'</td>
                           <td>'.$iduser.'</td>
                           <td>'.$idpro.'</td>
                           <td>'.$ngaybl.'</td>
                           <td><a href="'.$xoabl.'"><input type="button" value="Xóa"></a></td>
                          </tr>';
                       }
                       ?>
                    </table>
                    </section>
                    <section class="md20">
                        <input type="button" value="Chọn tất cả">
                        <input type="button" value="Bỏ chọn tất cả">
                        <input type="button" value="Xóa tất cả các mục">
                    </section>
                </form>
            </section>
        </section>
</main>