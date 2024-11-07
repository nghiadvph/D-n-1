
<main>
<section class="row">
            <section class="row titel">
                <h2>THÊM MỚI SẢN PHẨM</h2>
            </section>
            <section class="row conten">
                <form accept="index.php?act=addsp" method="post" enctype="multipart/form-data">
                    <section class="md20">
                        Danh muc<br>
                     <select name="iddm">
                        <?php
                        foreach ($dsdanhmuc as $danhmuc) {
                            extract($danhmuc);
                            echo '<option value="'.$id.'">'.$name.'</option>';
                        }
                        ?>
                     </select>
                    </section>
                    <section class="md20">
                        Tên tên sản phẩm<br>
                        <input type="text" name="tensanpham" value="<?php echo isset($_POST['tensanpham']) ? htmlspecialchars($_POST['tensanpham']) : ''; ?>">
                        <?php
                    if(isset($thongbao1)){
                        echo $thongbao1;
                    }
                    ?>
                    </section>
                    <section class="md20">
                        Giá cũ<br>
                        <input type="text" name="giacu" value="<?php echo isset($_POST['giacu']) ? htmlspecialchars($_POST['giacu']) : ''; ?>">
                        <?php
                    if(isset($thongbao2)){
                        echo $thongbao2;
                    }
                    ?>
                    </section>
                    <section class="md20">
                        Giá khuyến mại<br>
                        <input type="text" name="giakhuyenmai" value="<?php echo isset($_POST['giakhuyenmai']) ? htmlspecialchars($_POST['giakhuyenmai']) : ''; ?>">
                        <?php
                    if(isset($thongbao3)){
                        echo $thongbao3;
                    }
                    ?>
                    </section>
                    <section class="md20">
                        Hình sản phẩm<br>
                        <input type="file" name="hinhsanpham" value="<?php echo isset($_POST['hinhsp']) ? htmlspecialchars($_POST['hinhsp']) : ''; ?>">
                        <?php
                    if(isset($thongbao4)){
                        echo $thongbao4;
                    }
                    ?>
                    </section>
                    <section class="md20">
                        Mô tả sản phẩm<br>
                        <textarea name="motasanpham" cols="30" rows="10" value="<?php echo isset($_POST['motasanpham']) ? htmlspecialchars($_POST['motasanpham']) : ''; ?>"></textarea>
                        <?php
                    if(isset($thongbao5)){
                        echo $thongbao5;
                    }
                    ?>
                    </section>
                    <section class="md20">
                        <input type="submit" name="themmoi" value="Thêm mới">
                        <input type="reset" value="Nhập lại">
                        <a href="index.php?act=listsp"><input type="button" value="Danh sách"></a>
                    </section>
                    <?php
                    if(isset($thongbao) && ($thongbao!="")){
                        echo $thongbao;
                    }
                    ?>
                    
                </form>

            </section>
        </section>
</main>
    </section>