<section class="aa">
  <a>Trang chủ >></a> <strong style="color: red;">Thông tin mua hàng</strong>
</section>
<a class="back1" onclick="goBack()"><i class='bx bx-arrow-back'></i></a>
<script>
  function goBack() {
    window.history.back();
  }
</script>
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<main class="main">
  <article class="tt">
    <form action="index.php?act=billcomform" method="post">
      <section class="mh">
        <p>Thông tin mua hàng</p>
        <p>
          Bạn đã có tài khoản?
          <a href="index.php?act=dangnhap1">Đăng
            nhập</a>
        </p>
      </section>
      <section class="row indexmuahang">
        <?php
        if (isset($_SESSION['user'])) {
          $name = $_SESSION['user']['user'];
          $address = $_SESSION['user']['address'];
          $email = $_SESSION['user']['email'];
          $tel = $_SESSION['user']['tel'];
        } else {
          $name = '';
          $address = '';
          $email = '';
          $tel = '';
        }
        ?>
        <table>
          <tr>
            <td><input type="text" name="name" value="<?= $name ?>" required placeholder="Họ tên"></td>
          </tr>
          <tr>

            <td><input type="text" name="address" value="<?= $address ?>" required placeholder="Địa chỉ">
            </td>
          </tr>
          <tr>

            <td><input type="text" name="sodienthoai" value="<?= $tel ?>" required placeholder="Số điện thoại"></td>
          </tr>
          <tr>

            <td><input type="text" name="email" value="<?= $email ?>" placeholder="Email"></td>
          </tr>
          <tr>
            <td><input type="radio" value="1" name="pttt" checked>Thanh toán khi nhận hàng
              <input type="radio" value="2" name="pttt">Thanh toán chuyển khoản
              <input type="radio" value="3" name="pttt">Thanh toán Online
            </td>
          </tr>
          <!-- <tr>
                    <td><button type="submit" name="dongy">Đặt hàng</button></td>
                  </tr> -->
        </table>
        <section>
          <section class="row mt dongy">
            <input type="submit" name="dongy" value="Đồng ý đặt hàng">
          </section>
  </article>
  <aside class="hh">
    <section class="ss">
      <?php
      $tong = 0;
      $a = 1;
      $i = 0;
      if (isset($_SESSION['mycart'])) {
        foreach ($_SESSION['mycart'] as $mycart) {
          $hinh = $img_path . $mycart['hinh'];
          $thanhtien = $mycart['soluong'] * $mycart['pricekhuyenmai'];
          $tong += $thanhtien;
          echo '
                   <section class="cmm mm">
                   <section class="cmmm">
                    <img alt="BÁNH KEM HOA"
                    src="' . $hinh . '">
                     <p>' . $mycart['name'] . '</p>
                     <p>' . $mycart['soluong'] . '</p>
                   </section>
                   <section class="cmmmm">
                    <p>' . $thanhtien . ' <span class="giatien1">VNĐ<span></p>
                   </section>
                 </section>';
          $i += 1;
          $a += 1;
        }
        echo '<hr>
                     <section class="cmmmmm">
                    <p>Tạm tính</p>
                    <p>' . $tong . ' <span class="giatien1">VNĐ<span></p>
                  </section>';
        echo '<section class="cmmmmmm">
                  <p>Tổng cộng</p>
                  <p>' . $tong . ' <span class="giatien">VNĐ<span></p>
                </section>';
      } else {
      }
      ?>
    </section>
  </aside>
  </form>
</main>