<main class="main">
<article>
                <section class="row">
                    <section class="h">CẢM ƠN</section>
                    <section class="row dathang mtr" style="text-align: center;">
                        <h2 style="margin-top: 70px;">Cảm ơn quý khách đã đặt hàng!</h2>
                        <?php
                  if(isset($_SESSION['user'])){
                    $name=$_SESSION['user']['user'];
                    $address=$_SESSION['user']['address'];
                    $email=$_SESSION['user']['email'];
                    $tel=$_SESSION['user']['tel'];
                }else{
                    $name='';
                    $address='';
                    $email='';
                    $tel='';
                }
                // if(isset($_SESSION['mycart'])) {
                //     foreach ($_SESSION['mycart'] as $mycart) {
                //         extract($mycart);
                //         $thanhtien=$mycart['pricekhuyenmai']*$mycart['soluong'];
                //     }
                // }
                ?>
                        <h3><a><?=$name?></a>-<a><?=$address?></a></h3>
                    </section>
                    <section class="h">BẠN CÓ THỂ BIẾT</section>
                    <section class="row dathangnew">
                    <section class="row mr">
            <!-- <section class="row mr boxconten">
                <?php
                $i = 0;
                foreach ($dsspham as $sp) {
                    extract($sp);
                    $sanpham = "index.php?act=sanpham&iddm=" . $id;
                    $hinh = $img_path . $image;
                    if (($i == 2) || ($i == 5)|| ($i == 8)) {
                        $mr = "";
                    } else {
                        $mr = "mr";
                    }
                    echo '<section class="boxsp '.$mr.'">
                <a href="'.$sanpham.'"><img src="'.$hinh.'"></a>
                <section class="deal">
                <del>'.$pricecu.'</del><p>'.$pricekhuyenmai.'</p>
                </section>
                <a href="'.$sanpham.'">'.$name.'</a>
                </section>';
                    $i += 1;
                }
                ?>
            </section> -->
            <section class="allsanpham1">
            <?php
            $i=0;
            foreach ($dstop6 as $sp) {
                extract($sp);
                $sanpham="index.php?act=sanphamct&iddm=".$id;
                $hinh=$img_path.$image;
                if(($i==2)||($i==5) || ($i == 8)){
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
                <form action="index.php?act=addtocart" method="post">
                  <input type="hidden" name="id" value="'.$id.'">
                  <input type="hidden" name="img" value="'.$image.'">
                  <input type="hidden" name="name" value="'.$name.'">
                  <input type="hidden" name="pricecu" value="'.$pricecu.'">
                  <input type="hidden" name="pricekhuyenmai" value="'.$pricekhuyenmai.'">
                  <input type="submit" name="addtocart" class="addtocart" value="Thêm vào giỏ hàng">
                </form>
            </section>';
                
            $i+=1;
            }
            ?>

        </section>
        </section>
         </section>
         </article>
        </main>