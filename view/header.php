<?php
$dsdanhmuc = listall_danhmuc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dự án 1</title>
  <link rel="stylesheet" href="css/index.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
  <section class="block">
    <header>
      <img
        src="https://lzd-img-global.slatic.net/us/domino/e3242ccf-1386-4b2a-822a-41be1c8cf28d_VN-1188-80.png_2200x2200q80.png_.webp"
        alt="BAU" class="image" data-once="true" style="object-fit: contain;"
        data-spm-anchor-id="a2o4n.home-vn.0.i0.19053bdcedkrEY">
    </header>
    <nav id="nav">
      <section class="logo">
        <a href="index.php?act=trangchu"><img src="view/img/logo.png" width="120px"></a>
      </section>
      <section class="menu">
        <ul>
          <li><a href="index.php?act=trangchu">Trang chủ</a></li>
          <div class="dropdown">
            <li class="dropbtn"><a href="index.php?act=Sanpham">Sản phẩm</a></li>
            <div class="dropdown-content" name="iddm">
              <?php
                foreach ($dsdanhmuc as $ds) {
                    extract($ds);
                    $linkds= "index.php?act=sanpham&iddm=".$id;
                    echo '<li><a href="'.$linkds.'">'.$name.'</a></li>';
                }
                ?>
            </div>
          </div>
          <li><a href="index.php?act=Tin tức">Tin tức</a></li>
          <li><a href="index.php?act=Liên hệ">Liên hệ</a></li>
          <li><a href="index.php?act=viewcart" style="color:black;font-size: 25px;"><i class='bx bx-cart'></i></a></li>

        </ul>
        <section class="timkiem">
        <form action="index.php?act=sanpham" method="post">
        <input type="text" name="kyw" placeholder="Tìm khóa tìm kiếm">
    </form>
        </section>
      </section>
      <script>
        window.onscroll = function () { myFunction() };

        var header = document.getElementById("nav");
        var sticky = header.offsetTop;

        function myFunction() {
          if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
          } else {
            header.classList.remove("sticky");
          }
        }
      </script>
      <section class="icon">
        <a href=""><img
            src="https://lzd-img-global.slatic.net/g/tps/imgextra/i3/O1CN01Wdetn224xMIRNihao_!!6000000007457-2-tps-34-34.png"
            style="width: 32px; height: 32px" alt="fb"></a>
        <a href=""><img
            src="https://lzd-img-global.slatic.net/g/tps/imgextra/i4/O1CN01zt1zOu1zsFnzoIWje_!!6000000006769-2-tps-34-34.png"
            style="width: 32px; height: 32px" alt="yt"></a>
        <a href=""><img
            src="https://lzd-img-global.slatic.net/g/tps/imgextra/i4/O1CN011gka8L1E0PIZlHK7e_!!6000000000289-2-tps-34-34.png"
            style="width: 32px; height: 32px" alt="ins"></a>
        <a href=""><img
            src="https://lzd-img-global.slatic.net/g/tps/imgextra/i4/O1CN0193C9ay1QIykTmUlwk_!!6000000001954-2-tps-34-34.png"
            style="width: 32px; height: 32px" alt="tiktok"></a>
      </section>
    </nav>