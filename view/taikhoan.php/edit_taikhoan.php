<main class="main1">
    <article>
        <section class="row">
        <section class="d">ĐĂNG KÝ THÀNH VIÊN</section>
        <section class="row form4">
            <?php
            if(isset($_SESSION['user'])&&($_SESSION['user'])){
                extract($_SESSION['user']);

            }
            ?>
              <form action="index.php?act=edit_taikhoan" method="post" class="form1">
              <section class="row mb ml">
                    User<br>
                    <input type="text" name="user" value="<?=$user?>">
                </section>
                <section class="row mb ml" >
                    Password<br>
                    <input type="password" name="pass" value="<?=$pass?>">
                </section>
                <section class="row mb ml">
                    Email<br>
                    <input type="email" name="email" value="<?=$email?>">
                </section>
                <section class="row mb ml">
                    Address<br>
                    <input type="text" name="address" value="<?=$address?>">
                </section>
                <section class="row mb ml">
                    Tel<br>
                    <input type="text" name="tel" value="<?=$tel?>">
                </section>
                <input type="hidden" name="id" value="<?=$id?>">
                <input class="ml" type="submit" name="capnhat" value="Cập nhật">
                <input type="reset" value="Nhập lại">
              </form>
              <h3 style="color:red">
              <?php
              if(isset($thongbao)&&($thongbao !="")){
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