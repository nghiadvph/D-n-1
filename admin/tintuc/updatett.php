<?php
           if(is_array($onetintuc)){
            extract($onetintuc);
           }
           $image= "../upload/".$image;
           if(is_file($image)){
            $hinh = "<img src= '".$image."' height='80' width='120'>";
           }else{
            $hinh= "No file image";
           }    
        ?>
<section class="row">
            <section class="row title">
                <h2>CẬP NHẬT SẢN PHẨM</h2>
            </section>
            <section class="row conten">
                <form action="index.php?act=updatetintuc" method="post" enctype="multipart/form-data">
                <section class="md20">
                <select name="idtt">
                        <option value="0">Tất cả</option>
                        <?php
                        foreach ($alltintuc as $tintuc) {
                            if($id_danhmuc== $tintuc['id_danhmuc']) $s="selected";else $s="" ;
                            echo '<option value="'.$tintuc['id_danhmuc'].'" '.$s.'>'.$tintuc['ten_danhmuc'].'</option>';
                            
                        }
                        ?>
                     </select>
                </section>
                    <section class="md20">
                        Tiêu đề<br>
                        <input type="text" name="tieude" value="<?=$tieude?>">
                    </section>
                    <section class="md20">
                        Nội dung<br>
                        <textarea rows="10" cols="50" name="noidung"><?=$noidung?></textarea>
                    </section>
                    <section class="md20">
                        Hình tin tức<br>
                        <input type="file" name="hinhtintuc"><?=$hinh?>
                    </section>
                    <section class="md20">
                        <input type="hidden" name="id" value="<?=$id?>">
                        <input type="submit" name="capnhat" value="Cập nhật">
                        <input type="reset" value="Nhập lại">
                        <a href="index.php?act=tintuc"><input type="button" value="Danh sách"></a>
                    </section>
                    <?php
                    if(isset($thongbao) && ($thongbao!="")){
                        echo $thongbao;
                    }
                    ?>
                </form>

            </section>
        </section>
        <footer>
             NGHIADVPH46437
        </footer>
    </section>