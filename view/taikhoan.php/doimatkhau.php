<main class="main1">
    <article>
        <section class="row">
            <section class="d">ĐỔI MẬT KHẨU</section>
            <section class="row form4">
                <?php
                if (isset($_SESSION['user']) && ($_SESSION['user'])) {
                    extract($_SESSION['user']);
                }
                ?>
                <form action="index.php?act=doimatkhau" method="post" class="form1">
                <section class="row mb ml">
                        Mật khẩu cũ<br>
                        <input type="password" name="pass">
                    </section>
                    <section class="row mb ml">
                        Mật khẩu mới<br>
                        <input type="password" name="pass1">
                    </section>
                    <section class="row mb ml">
                        Nhập lại mật khẩu<br>
                        <input type="password" name="pass2">
                    </section>
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <input class="ml" type="submit" name="doimatkhau" value="Đổi mật khẩu">
                    <input type="reset" value="Nhập lại">
                </form>
                <h3 style="color:red">
                    <?php
                    if (isset($thongbao) && ($thongbao != "")) {
                        echo $thongbao;
                    }
                    ?>
                </h3>
            </section>
        </section>
    </article>
    <aside>
        <?php
        include "view/boxright.php";
        ?>
    </aside>
</main>