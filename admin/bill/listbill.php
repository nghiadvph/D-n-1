<main>
<section class="row donhang">
            <section class="row title md20">
                <h2>DANH SÁCH ĐƠN HÀNG</h2>
            </section>
            <form action="index.php?act=dsdh" method="post">
                    <input type="text" name="kyw" placeholder="Nhập mã để tìm đơn hàng">
                     <input type="submit" name="ok" value="OK">
                </form>
            <section class="row conten">
                <form accept="" method="post">
                    <section class="row md20 danh">
                    <table >
                       <tr>
                       <th></th>
                       <th>Mã đơn hàng</th>
                       <th>Khách hàng</th>
                       <th>Ngày đặt hàng</th>
                       <th>Số lượng</th>
                       <th>Giá trị đơn hàng</th>
                       <th>Tình trạng đơn hàng</th>
                       <th>Chi tiết đơn hàng</th>
                       <th>Thao tác</th>
                       <th></th>
                       </tr>
                       <?php 
                       foreach ($listbill as $bill) {
                           extract($bill);
                           $kh=$bill["bill_name"].'
                           <br> '.$bill["bill_address"].';
                           <br> '.$bill["bill_email"].';
                           <br> '.$bill["bill_tel"];
                           $count=loadall_cart_count1($bill['id']);
                           $ttdh=get_ttdh($bill['bill_status']);
                           $suabill="index.php?act=suabill&id=".$id;
                           $chitiet="index.php?act=chitiet&idbill=".$id;   
                           echo '<tr>
                           <td><input type="checkbox"</td>
                           <td>DAM-'.$bill['id'].'</td>
                           <td>'.$kh.'</td>
                           <td>'.$bill['ngaydathang'].'</td>
                           <td>'.$count.'</td>
                           <td>'.$bill['total'].' VNĐ</td>
                           <td>'.$ttdh.'</td>
                           <td><a href="'.$chitiet.'"><input type="button" name="chitiet" value="chi tiết"></a></td>
                           <td><a href="'.$suabill.'"><input type="button" value="Update"></a></td>
                          </tr>';
                       }
                       ?>
                    </table>
                    </section>
                    <section class="md20">
                        <input type="button" value="Chọn tất cả">
                        <input type="button" value="Bỏ chọn tất cả">
                        <input type="button" value="Xóa tất cả các mục">
                    </section>
                </form>
            </section>
            </main>
        </section>