<main>
<section class="row">
            <section class="row titel">
                <h2>THÊM MỚI LOẠI HÀNG</h2>
            </section>
            <section class="row conten">
                <form accept="index.php?act=adddm" method="post">
                    <section class="md20">
                        Mã loại<br>
                     <input type="text" name="maloai" disabled>
                    </section>
                    <section class="md20">
                        Tên loại<br>
                        <input type="text" name="tenloai">
                    </section>
                    <section class="md20">
                        <input type="submit" name="themmoi" value="Thêm mới">
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