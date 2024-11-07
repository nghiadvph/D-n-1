<main class="mainhome">
  <article>
    <section class="slideshow1">
      <img src="https://c.wallhere.com/photos/2c/51/cake_chocolate-1751197.jpg!d" id="h1">
      <script>
        var index = 0;
        var img = ["https://c.wallhere.com/photos/2c/51/cake_chocolate-1751197.jpg!d",
          "https://birthdaylovecake.com/wp-content/uploads/2019/11/banh-kem-vuong-mien.jpg",
          "https://tse4.mm.bing.net/th?id=OIP.Sffe2PSWKcBM-PEQlxe1-wHaEo&pid=Api&P=0&h=180"
        ];
        function next() {
          index++;
          if (index >= img.length) index = 0;
          document.getElementById("h1").src = img[index];
        }
        setInterval("next()", 3000);
      </script>
    </section>
    <section class="sanpham">
            <?php
            $i=0;
            foreach ($spnew as $sp) {
                extract($sp);
                $sanpham="index.php?act=sanphamct&iddm=".$id;
                $hinh=$img_path.$image;
                if(($i==2)||($i==5)||($i==8)){
                    $mr="";
                }else{
                    $mr="mr";
                }
                echo '<section class="boxsp '.$mr.'">
                <a href="'.$sanpham.'"><img src="'.$hinh.'"></a>
                <section class="deal">
                <del>'.$pricecu.'</del><p>'.$pricekhuyenmai.'</p>
                </section>
                <a href="'.$sanpham.'">'.$name.'</a>
                <form action="index.php?act=addtocartme" method="post">
                  <input type="hidden" name="id" value="'.$id.'">
                  <input type="hidden" name="img" value="'.$image.'">
                  <input type="hidden" name="name" value="'.$name.'">
                  <input type="hidden" name="pricecu" value="'.$pricecu.'">
                  <input type="hidden" name="pricekhuyenmai" value="'.$pricekhuyenmai.'">
                </form>
            </section>';
                
            $i+=1;
            }
            ?>
            <!-- <section class="boxsp mr">
                <img src="view/image/2.png">
                <section class="deal">
                <del>200đ</del><p>500đ</p>
                </section>
                <a href="">Đồng hồ chất lượng</a>
            </section> -->
        </section>
  </article>
  <aside>
    <?php
    include "boxright.php";
    ?>
  </aside>
</main>
<hr style="width: 75%;margin-left: 15%;">
<section class="khuyenmai">
  <section class="km1 mt">
    <img src="view/img/90.jpg">
    <p>Uy tín là yếu tố quan trọng khi mua sắm, đặc biệt là khi chọn mua bánh kem - một sản phẩm thường được lựa chọn để
      làm quà tặng đặc biệt. Khi mua bánh kem, uy tín của cửa hàng cũng như chất lượng sản phẩm đều đóng vai trò quan
      trọng.</p>
  </section>
  <section class="km1 mt">
    <img src="view/img/th.jpg">
    <p>Cửa hàng cam kết cung cấp bánh kem chất lượng, được làm từ nguyên liệu tốt nhất và tuân thủ các tiêu chuẩn vệ
      sinh an toàn thực phẩm. Trong trường hợp khách hàng phát hiện sản phẩm không đạt chất lượng, cửa hàng sẽ chịu
      trách nhiệm và đảm bảo sự hài lòng của khách hàng.</p>
  </section>
  <section class="km1">
    <img src="view/img/camket.png">
    <p>Cửa hàng cam kết sử dụng nguyên liệu tốt nhất và tuân thủ quy trình sản xuất vệ sinh an toàn thực phẩm để đảm bảo
      bánh kem luôn ngon, an toàn cho sức khỏe.Bánh kem sẽ được làm đẹp tỉ mỉ, theo yêu cầu của khách hàng và giữ nguyên
      hình dáng, trang trí đến khi giao hàng.</p>
  </section>
</section>
</section>