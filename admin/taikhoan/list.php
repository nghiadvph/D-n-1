<main>
<section class="row">
            <section class="row titel">
                <h2>DANH SÁCH KHÁCH HÀNG</h2>
            </section>
            <section class="row conten">
                <form accept="" method="post">
                    <section class="row md20 dang">
                    <table >
                       <tr>
                       <th></th>
                       <th>Id kh</th>
                       <th>Tên kh</th>
                       <th>Email kh</th>
                       <th>Địa chỉ kh</th>
                       <th>Số điện thoại</th>
                       <th>Vai trò</th>
                       <th></th>
                       </tr>
                       <?php 
                       foreach ($dstaikhoan as $taikhoan) {
                           extract($taikhoan);
                           $xoakh="index.php?act=xoakh&id=".$id;
                           $taikhoan=get_taikhoan($taikhoan['vaitro']);
                           echo '<tr>
                           <td><input type="checkbox"</td>
                           <td>'.$id.'</td>
                           <td>'.$user.'</td>
                           <td>'.$email.'</td>
                           <td>'.$address.'</td>
                           <td>'.$tel.'</td>
                           <td>'.$taikhoan.'</td>
                          </tr>';
                       }
                       ?>
                    </table>
                    </section>
                    <!-- <section class="md20">
                        <input type="button" value="Chọn tất cả">
                        <input type="button" value="Bỏ chọn tất cả">
                        <input type="button" value="Xóa tất cả các mục">

                    </section> -->
                </form>
            </section>
                    </main>
        </section>