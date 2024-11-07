<section class="a">Tài khoản</section>
<section class="form1">
    <?php
    if (isset($_SESSION['user'])) {
        extract($_SESSION['user']);
        ?>
        <section class="row mb">
            Xin chào
            <?= $user ?><br>
        </section>
        <section class="row mb">
            <li>
                <a href="index.php?act=quenmk">Quên mật khẩu</a>
            </li>
            <li>
                <a href="index.php?act=edit_taikhoan">Cập nhật tài khoản</a>
            </li>
            <li>
                <a href="index.php?act=doimatkhau">Đổi mật khẩu</a>
            </li>
            <li>
                <a href="index.php?act=mybill1">Đơn hàng của tôi</a>
            </li>
            <?php if ($vaitro == 1) { ?>
                <li>
                    <a href="admin/index.php">Đăng nhập Admin</a>
                </li>
            <?php } ?>
            <li>
                <a href="index.php?act=thoat">Thoát</a>
            </li>
        </section>
        <?php
    } else {
        ?>
        <form action="index.php?act=dangnhap" method="post">
            <section class="row mb">
                Tên đăng nhập<br>
                <input type="text" name="user">
            </section>
            <section class="row mb">
                Mật khẩu<br>
                <input type="password" name="pass">
            </section>
            <section class="row mb td">
                <input type="checkbox"> Ghi nhớ tài khoản
            </section>
            <section class="row mb">
                <input type="submit" name="nhap" value="Đăng nhập">
            </section>
        </form>
        <li>
            <a href="index.php?act=quenmk">Quên mật khẩu</a>
        </li>
        <li>
            <a href="index.php?act=dangky">Đăng ký thành viên</a>
        </li>
        <?php
    }
    ?>
</section>
<section class="b">Danh mục</section>
<section class="form2 menudoc">
    <ul>
        <?php
        foreach ($dsdm as $ds) {
            extract($ds);
            $linkds = "index.php?act=sanpham&iddm=" . $id;
            echo '<li><a href="' . $linkds . '">' . $name . '</a></li>';
        }
        ?>
    </ul>
</section>
<section class="box seach">
    <form action="index.php?act=sanpham" method="post">
        <input type="text" name="kyw" placeholder="Tìm khóa tìm kiếm">
    </form>
</section>
<section class="row">
    <section class="c">Top 10 yêu thích</section>
    <section class="row form3">
        <?php
        foreach ($dstop10 as $dstop) {
            extract($dstop);
            $link = "index.php?act=sanphamct&iddm=" . $id;
            $img = $img_path . $image;
            echo '<section class="row mb top10">
                    <a href="' . $link . '"><img src="' . $img . '"></a>
                    <a href="' . $link . '">' . $name . '</a>
                </section>';
        }
        ?>
    </section>
</section>                      
<section class="row video">
<img src="view/img/2-8.jpg" width="100%" style="margin-top: -5px;">
</section>