
<main>
<article>
<section class="row">
<a class="back23" onclick="goBack()"><i class='bx bx-arrow-back'></i></a>
        <section class="e">CHI TIẾT ĐƠN HÀNG</section>
              <section class="row boxconten mb danh1">
                <form>
                <table>
                    <tr>
                        <th>Hình</th>
                        <th>Sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                    
                    <?php
                    if(isset($onebill)){
                        foreach ($onebill as $mybill) {
                          extract($mybill);
                          $hinh = "upload/".$image;
                          echo '<tr>
                          <td><img src="'.$hinh.'" alt="" height="90px" style="margin-left:40px"></td>
                          <td>'.$name.'</td>
                          <td>'.$price.'</td>
                          <td>'.$soluong.'</td>
                          <td>'.$thanhtien.'</td>
                      </tr>';
                        }
                      }
                      ?>
                </table>
                </form>
              </section>
        </section>
        <script>
      function goBack() {
        window.history.back();
      }
    </script>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</article>   
</main>