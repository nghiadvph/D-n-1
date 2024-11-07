
<?php
 extract($onesp);
 ?>
 <a class="back" onclick="goBack()"><i class='bx bx-arrow-back'></i></a>
<script>
      function goBack() {
        window.history.back();
      }
    </script>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<main class="main chitietsp">
         <?php
          $img = $img_path.$image;
            echo'<section class="anh">
            <img src="'.$img.'">
           </section>';
         ?>
         <?php
         echo '<section class="sp">
         <p>Mã sản phẩm:'.$id.'</p>
        <strong>'.$name.'</strong>
        <p>'.$mota.'</p>
        <section class="gi">
         <del>'.$pricecu.'vnđ</del><p id="giatien">'.$pricekhuyenmai.'vnđ</p>
        </section>
        <section class="mua">
        <form action="index.php?act=addtocartme" method="post">
        <input type="hidden" name="id" value="'.$id.'">
        <input type="hidden" name="img" value="'.$image.'">
        <input type="hidden" name="name" value="'.$name.'">
        <input type="hidden" name="pricecu" value="'.$pricecu.'">
        <input type="hidden" name="pricekhuyenmai" value="'.$pricekhuyenmai.'">
         Số lượng: <input type="number" class="mr" name="soluong" id="soluong" value="1" min="1">
         <input class="muangay" type="submit" name="muangay" value="Mua ngay">
         <input type="submit" name="addtocart" class="addtocart" value="Thêm vào giỏ hàng">
         </form>
        </section>
        <section class="luotxem">
            Lượt xem: '.$luotxem.'
           </section>
        <section class="mua">
        <form action="index.php?act=addtocartme" method="post">
        <input type="hidden" name="id" value="'.$id.'">
        <input type="hidden" name="img" value="'.$image.'">
        <input type="hidden" name="name" value="'.$name.'">
        <input type="hidden" name="pricecu" value="'.$pricecu.'">
        <input type="hidden" name="pricekhuyenmai" value="'.$pricekhuyenmai.'">
         </form>
        
        </section>
        
       </section>';
         ?>
         
        </main>
        <section class="row1">
        <section class="i">BÌNH LUẬN</section>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
           $(document).ready(function(){
           $("#binhluan").load("view/binhluan/binhluan.php", {idpro: "<?=$id?>"});
        });
</script>
              <section class="row boxconten mb" id="binhluan">
        
              </section>
        </section>
        <hr class="hrt">
        <section class="sanphamlienquan">
            <p class="dhsd">Sản phẩm cùng loại</p>
            <section class="splienquan">
            <?php
                  foreach ($sanpham_cungloai as $sanphamcungloai) {
                    extract($sanphamcungloai);
                    $sanpham="index.php?act=sanphamct&iddm=".$id;
                    $img = $img_path.$image;
                    $linksp= 'index.php?act=sanphamct.php';
                    echo'<section class="boxspchitiet mr">
                    <img href="'.$sanpham.'" src="'.$img.'">
                    <p>'.$pricekhuyenmai.'</p>
                    <a href="'.$sanpham.'">'.$name.'</a>
                  </section>';
                  }
                  ?>
            </section>
        </section>