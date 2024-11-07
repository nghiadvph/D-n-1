<main class="sanpham">
    <article>
        <section class="row mr">
            <!-- <section class="row mr boxconten">
                <?php
                $i = 0;
                foreach ($dsspham as $sp) {
                    extract($sp);
                    $sanpham = "index.php?act=sanpham&iddm=" . $id;
                    $hinh = $img_path . $image;
                    if (($i == 3) || ($i == 6) || ($i == 9)) {
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
            <section class="allsanpham">
            <?php
            $i=0;
            foreach ($dssp as $sp) {
                extract($sp);
                $sanpham="index.php?act=sanphamct&iddm=".$id;
                $hinh=$img_path.$image;
                if(($i==3)||($i==7)||($i==9)){
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
                  <input type="hidden" class="mr" name="soluong" id="soluong" value="1" min="1">
                  <input type="hidden" name="pricekhuyenmai" value="'.$pricekhuyenmai.'">
                  <input type="submit" name="addtocart" class="addtocart" value="Thêm vào giỏ hàng">
                </form>
            </section>';
                
            $i+=1;
            }
            ?>

        </section>
        </section>
    </article>
</main>