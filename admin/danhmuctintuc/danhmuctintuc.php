<main>
<section class="row">
            <section class="row title">
                <h2>Danh mục tin tức</h2>
            </section>
            <section class="row conten">
                <form accept="index.php?act=dmtintuc" method="post">
                    <section class="md20">
                        Id danh mục tin tức<br>
                     <input type="text" name="idtintuc" disabled>
                    </section>
                    <section class="md20">
                        Tên danh mục tin tức<br>
                        <input type="text" name="tentintuc">
                    </section>
                    <section class="md20">
                        <input type="submit" name="themmoi" value="Thêm mới">
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