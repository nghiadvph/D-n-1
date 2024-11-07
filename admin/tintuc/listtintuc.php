<main>
<section class="row">
            <section class="row title md20">
                <h2>DANH SÁCH TIN TỨC</h2>
            </section>
            <form action="index.php?act=tintuc" method="post">
                    <input type="text" name="kyw">
                    <select name="idtt">
                        <option value="0">Tất cả</option>
                        <?php
                        foreach ($dstintuc as $tintuc) {
                            extract($tintuc);
                            echo '<option value="'.$id_danhmuc.'">'.$ten_tintuc.'</option>';
                        }
                        ?>
                     </select>
                     <input type="submit" name="ok" value="OK">
                </form>
            <section class="row conten">
                <form accept="" method="post">
                    <section class="row md20 danh">
                    <table >
                       <tr>
                       <th></th>
                       <th>id_danhmuc</th>
                       <th>Tiêu đề</th>
                       <th>Nội dung</th>
                       <th>Hình tin tức</th>
                       <th></th>
                       </tr>
                       <?php 
                       foreach ($dsdmtt as $all) {
                           extract($all);
                           $suadmtt="index.php?act=suadmtt&id=".$id;
                           $xoadmtt="index.php?act=xoadmtt&id=".$id;
                           $confirm= '<script>alert("Bạn chắc chắn muốn xóa")</script>';
                           $image= "../upload/".$image;
                           if(is_file($image)){
                            $hinh = "<img src= '".$image."' height='80' width='120'>";
                           }else{
                            $hinh= "No file image";
                           }
                           echo '<tr>
                           <td><input type="checkbox"</td>
                           <td>'.$id.'</td>
                           <td>'.$tieude.'</td>
                           <td>'.$noidung.'</td>
                           <td>'.$hinh.'</td>
                           <td><a href="'.$suadmtt.'"><input type="button" value="Sửa"></a> <a href="'.$xoadmtt.'")><input name="xoa" type="button" value="Xóa"></a></td>
                          </tr>';
                       }
                       ?>
                    </table>
                    </section>
                    <section class="md20">
                        <input type="button" value="Chọn tất cả">
                        <input type="button" value="Bỏ chọn tất cả">
                        <input type="button" value="Xóa tất cả các mục">
                        <a href="index.php?act=tt"><input type="button" value="Nhập thêm"></a>
                    </section>
                </form>
            </section>
                    </main>
        </section>