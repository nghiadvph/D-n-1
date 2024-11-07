<?php
           if(is_array($dm)){
            extract($dm);
           }
        ?>
        <main>
<section class="row">
            <section class="row title">
                <h2>CẬP NHẬT DANH MỤC TIN TỨC</h2>
            </section>
            <section class="row conten">
                <form action="index.php?act=updatett" method="post">
                    <section class="md20">
                        Mã danh mục tin tức<br>
                     <input type="text" name="idtintuc" disabled>
                    </section>
                    <section class="md20">
                        Tên danh mục tin tức<br>
                        <input type="text" name="tentintuc" value="<?php if(isset($ten_danhmuc)&& ($ten_danhmuc!='')) echo $ten_danhmuc ?>">
                    </section>
                    <section class="md20">
                        <input type="hidden" name="id_danhmuc" value="<?php if(isset($id_danhmuc)&& ($id_danhmuc>0)) echo $id_danhmuc ?>">
                        <input type="submit" name="capnhat" value="Cập nhật">
                        <input type="reset" value="Nhập lại">
                        <a href="index.php?act=listtintuc"><input type="button" value="Danh sách"></a>
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