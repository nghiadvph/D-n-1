<main>
<section class="row">
            <section class="row title">
                <h2>DANH MỤC TIN TỨC</h2>
            </section>
            <section class="row conten">
                <form accept="" method="post">
                    <section class="row md20 danh">
                    <table >
                       <tr>
                       <th></th>
                       <th>Mã tin tức</th>
                       <th>Tên danh mục tin tức</th>
                       <th></th>
                       </tr>
                       <?php 
                       foreach ($alltintuc as $tintuc) {
                           extract($tintuc);
                           $suatt="index.php?act=suatt&id_danhmuc=".$id_danhmuc;
                           $xoatt="index.php?act=xoatt&id_danhmuc=".$id_danhmuc;
                           echo '<tr>
                           <td><input type="checkbox"</td>
                           <td>'.$id_danhmuc.'</td>
                           <td>'.$ten_danhmuc.'</td>
                           <td>
                                <a href="'.$suatt.'"><input type="button" value="Sửa"></a> 
                                <a href="'.$xoatt.'"><input type="button" value="Xóa"></a>
                           </td>
                          </tr>';
                       }
                       ?>
                    </table>
                    </section>
                    <script>
                        function confirmation(){
                        var result = confirm("Are you sure to delete?");
                        if(result){
                            console.log("Deleted")
                        }
                        }
                    </script>
                    <section class="md20">
                        <input type="button" value="Chọn tất cả">
                        <input type="button" value="Bỏ chọn tất cả">
                        <input type="button" value="Xóa tất cả các mục">
                        <a href="index.php?act=dmtintuc"><input type="button" value="Nhập thêm"></a>
                    </section>
                </form>
            </section>
            </main>
        </section>