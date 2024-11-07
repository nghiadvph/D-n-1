<main class="main1">
    <article>
        <section class="row">
        <section class="d">QUÊN MẬT KHẨU</section>
        <section class="row form4">
              <form action="index.php?act=quenmk" method="post" class="form1">
                <section class="row mb ml">
                    Email<br>
                    <input type="email" name="email">
                </section>
                <input class="ml" type="submit" name="quenmk" value="Gửi">
                <input type="reset" value="Nhập lại">
              </form>
              <h3 style="color:red; margin-left: 20px;margin-top: 10px;">
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