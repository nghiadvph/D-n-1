<?php
           if(is_array($sanpham)){
            extract($sanpham);
           }
           $image= "../upload/".$image;
           if(is_file($image)){
            $hinh = "<img src= '".$image."' height='80' width='120'>";
           }else{
            $hinh= "No file image";
           }    
        ?>
<main>
<section class="row">
            <section class="row title">
                <h2>CẬP NHẬT SẢN PHẨM</h2>
            </section>
            <section class="row conten">
                <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
                <section class="md20">
                <select name="iddm">
                        <option value="0">Tất cả</option>
                        <?php
                        foreach ($dsdanhmuc as $danhmuc) {
                            if($iddm== $danhmuc['id']) $s="selected";else $s="" ;
                            echo '<option value="'.$danhmuc['id'].'" '.$s.'>'.$danhmuc['name'].'</option>';
                        }
                        ?>
                     </select>
                </section>
                    <section class="md20">
                        Tên tên sản phẩm<br>
                        <input type="text" name="tensanpham" value="<?=$name?>">
                    </section>
                    <section class="md20">
                        Giá cũ<br>
                        <input type="text" name="giacu" value="<?=$pricecu?>">
                    </section>
                    <section class="md20">
                        Giá khuyến mại<br>
                        <input type="text" name="giakhuyenmai" value="<?=$pricekhuyenmai?>">
                    </section>
                    <section class="md20">
                        Hình sản phẩm<br>
                        <input type="file" name="hinh"><?=$hinh?>
                    </section>
                    <section class="md20">
                        Mô tả sản phẩm<br>
                        <textarea type="text" name="motasanpham" cols="30" rows="10"><?=$mota?></textarea>
                    </section>
                    <section class="md20">
                        <input type="hidden" name="id" value="<?=$id?>">
                        <input type="submit" name="capnhat" value="Cập nhật">
                        <input type="reset" value="Nhập lại">
                        <a href="index.php?act=listsp"><input type="button" value="Danh sách"></a>
                    </section>
                    <?php
                    if(isset($thongbao) && ($thongbao!="")){
                        echo $thongbao;
                    }
                    ?>
                </form>

            </section>
        </section>
        </main>
    </section>