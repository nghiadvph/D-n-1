<?php
           if(is_array($dm)){
            extract($dm);
           }
        ?>
<main>
<section class="row">
            <section class="row title">
                <h2>CẬP NHẬT LOẠI HÀNG</h2>
            </section>
            <section class="row conten">
                <form action="index.php?act=updatedm" method="post">
                    <section class="md20">
                        Mã loại<br>
                     <input type="text" name="maloai" disabled>
                    </section>
                    <section class="md20">
                        Tên loại<br>
                        <input type="text" name="tenloai" value="<?php if(isset($name)&& ($name!='')) echo $name ?>">
                    </section>
                    <section class="md20">
                        <input type="hidden" name="id" value="<?php if(isset($id)&& ($id>0)) echo $id ?>">
                        <input type="submit" name="capnhat" value="Cập nhật">
                        <input type="reset" value="Nhập lại">
                        <a href="index.php?act=listdm"><input type="button" value="Danh sách"></a>
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