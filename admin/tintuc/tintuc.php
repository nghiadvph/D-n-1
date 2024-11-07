
<main>
<section class="row">
            <section class="row title">
                <h2>TIN TỨC</h2>
            </section>
            <section class="row conten">
                <form accept="index.php?act=addtintuc" method="post" enctype="multipart/form-data">
                    <section class="md20">
                        Danh mục TIN TỨC<br>
                     <select name="idtt">
                        <?php
                        foreach ($alltintuc as $tintuc) {
                            extract($tintuc);
                            echo '<option value="'.$id_danhmuc.'">'.$ten_danhmuc.'</option>';
                        }
                        ?>
                     </select>  
                    </section>
                    <section class="md20">
                        Tiêu đề<br>
                        <input id="tieude" name="tieude">
                    </section>
                    <section class="md20">
                        Nội dung<br>
                        <textarea  type="text" id="noidung" name="noidung" rows="10" cols="50"></textarea>
                    </section>
                    <section class="md20">
                        Hình sản phẩm<br>
                        <input type="file" name="hinhtintuc">
                    </section>
                    <section class="md20">
                        <input type="submit" name="themmoi" value="Thêm mới">
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
</main>
    </section>