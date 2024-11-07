<main>
<section class="row">
            <section class="row titels md20">
                <h2>DANH SÁCH LOẠI HÀNG</h2>
            </section>
            <form action="index.php?act=listsp" method="post">
                    <input type="text" name="kyw" placeholder="Nhập tên sản phẩm để tìm...">
                    <select name="iddm">
                        <option value="0">Tất cả</option>
                        <?php
                        foreach ($dsdanhmuc as $danhmuc) {
                            extract($danhmuc);
                            echo '<option value="'.$id.'">'.$name.'</option>';
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
                       <th>Mã sản phẩm</th>
                       <th>Tên danh mục</th>
                       <th>Tên sản phẩm</th>
                       <th>Hình sản phẩm</th>
                       <th>Giá cũ </th>
                       <th>Giá khuyến mại</th>
                       <th>Lượt xem</th>
                       <th></th>
                       </tr>
                       <?php 
                       foreach ($dssanpham as $sanpham) {
                           extract($sanpham);
                           $suasp="index.php?act=suasp&id=".$id;
                           $xoasp="index.php?act=xoasp&id=".$id;
                           $image= "../upload/".$image;
                           if(is_file($image)){
                            $hinh = "<img src= '".$image."' height='80' width='120'>";
                           }else{
                            $hinh= "No file image";
                           }
                           echo '<tr>
                           <td><input type="checkbox"</td>
                           <td>'.$id.'</td>
                           <td>'.$category_name.'</td>
                           <td>'.$name.'</td>
                           <td>'.$hinh.'</td>
                           <td>'.$pricecu.' VNĐ</td>
                           <td>'.$pricekhuyenmai.' VNĐ</td>
                           <td>'.$luotxem.'</td>
                           <td><a href="'.$suasp.'"><input type="button" value="Sửa"></a> <a href="'.$xoasp.'"><input type="button" value="Xóa"></a></td>
                          </tr>';
                       }
                       ?>
                    </table>
                    </section>
                    <section class="md20">
                        <input type="button" value="Chọn tất cả">
                        <input type="button" value="Bỏ chọn tất cả">
                        <input type="button" value="Xóa tất cả các mục">
                        <a href="index.php?act=addsp"><input type="button" value="Nhập thêm"></a>
                    </section>
                </form>
            </section>
            </main>
        </section>