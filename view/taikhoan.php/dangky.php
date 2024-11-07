<main class="main2">
    <article>
        <section class="row">
        <section class="d">ĐĂNG KÝ THÀNH VIÊN</section>
        <section class="row form4">
              <form action="index.php?act=dangky" method="post" class="form1">
              <section class="row mb ml">
                    User<br>
                    <input type="text" name="user" value="<?php echo isset($_POST['user']) ? htmlspecialchars($_POST['user']) : ''; ?>"><br>
                    <?php
                    if(isset($thongbaouser)){
                        echo $thongbaouser;
                    }
                    ?>
                </section>
                <section class="row mb ml">
                    Password<br>
                    <input type="password" name="pass" value="<?php echo isset($_POST['pass']) ? htmlspecialchars($_POST['pass']) : ''; ?>"><br>
                    <?php
                    if(isset($thongbaopass)){
                        echo $thongbaopass;
                    }
                    ?>
                </section>
                <section class="row mb ml">
                    Email<br>
                    <input type="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"><br>
                    <?php
                    if(isset($thongbaoemail)){
                        echo $thongbaoemail;
                    }
                    ?>
                </section>
                <input class="ml" type="submit" name="submit" value="Đăng ký">
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