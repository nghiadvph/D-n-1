<?php
function tongdonhang()
{
    $tong = 0;
    foreach ($_SESSION['mycart'] as $mycart) {
        // var_dump($_SESSION['mycart']);
        $ttien = $mycart['pricekhuyenmai'] * $mycart['soluong'];
        $tong += $ttien;
    }
    return $tong;
}
function insert_bill1($iduser, $name, $email, $address, $tel, $pttt, $ngaydathang, $tongdonhang)
{
    $sql = "INSERT INTO bill(iduser,bill_name,bill_email,bill_address,bill_tel,bill_pttt,ngaydathang,total) VALUES('$iduser','$name','$email','$address','$tel','$pttt','$ngaydathang','$tongdonhang')";
    return pdo_execute_return_lastInsertId($sql);
}
function insert_cart1($iduser, $idpro, $name, $image, $giakhuyenmai, $soluong, $thanhtien, $idbill)
{
    $sql = "INSERT INTO cart_item(cart_id,idpro,name,image,price,soluong,thanhtien,idbill) VALUES('$iduser','$idpro','$name','$image','$giakhuyenmai','$soluong','$thanhtien','$idbill')";
    return pdo_execute($sql);
}
function delete_cart($cart_id){
    $sql= "delte from cart_Detail where cart_id";
    pdo_execute($sql);
}
function loadone_bill1($id)
{
    // $sql= "select * from bill where id='$id'";
    $sql = "SELECT * FROM bill WHERE id = '$id'";
    $bill = pdo_query_one($sql);
    return $bill;
}
function delete_bill($id){
    $sql= "delete from bill where id=".$id;
    pdo_execute($sql);
}
function loadall_cart1($idbill)
{
    $sql = "select * from cart_item where idbill=" . $idbill;
    $sp = pdo_query($sql);
    return $sp;
}
function loadone_cart($idbill)
{
    $sql = "select * from cart_item where idbill=" . $idbill;
    $sp = pdo_query_one($sql);
    return $sp;
}
function loadall_cart_count1($idbill)
{
    $sql = "select * from cart_item where idbill=" . $idbill;
    $sp = pdo_query($sql);
    return sizeof($sp);
}
function loadall_bill1($kyw = "", $iduser = 0)
{
    $sql = "select * from bill where 1";
    if ($iduser > 0) $sql .= " AND iduser =" . $iduser;
    if ($kyw != "") $sql .= " AND iduser like '%" . $kyw . "%'";
    $sql .= " order by id desc";
    $sp = pdo_query($sql);
    return $sp;
}
function get_ttdh($n)
{
    switch ($n) {
        case '0':
            $tt = "Đơn hàng mới";
            break;
        case '1':
            $tt = "Đang xử lý";
            break;
        case '2':
            $tt = "Đang giao hàng";
            break;
        case '3':
            $tt = "Đã giao hàng";
            break;
        default:
            $tt = "Đơn hàng mới";
            break;
    }
    return $tt;
}
function loadall_thongke()
{
    $sql = "select danhmuc.id as madm, danhmuc.name as namedm, count(sanpham.id) as countsp, min(sanpham.pricekhuyenmai) as minprice, max(sanpham.pricekhuyenmai) as maxprice, avg(sanpham.pricekhuyenmai) as avgprice";
    $sql .= " from sanpham left join danhmuc on danhmuc.id=sanpham.iddm";
    $sql .= " group by danhmuc.id order by danhmuc.id desc";
    $listtk = pdo_query($sql);
    return $listtk;
}
function update_cart($id, $tt1)
{
    $sql = "update bill set bill_status='" . $tt1 . "' where id=" . $id;
    pdo_execute($sql);
}

function getCartUserID($userID)
{
    $sql = "SELECT * FROM cart WHERE user_id = '$userID' LIMIT 1";
    return pdo_query_one($sql);
}

function getCartID($userID)
{
    $cart = getCartUserID($userID);
    if (empty($cart)) {
        $sql = "INSERT INTO cart(user_id) VALUES ('$userID')";
        return pdo_execute_return_lastInsertId($sql);
    }
}

function insertCart($cartID, $idpro, $name, $image, $giakhuyenmai, $soluong, $thanhtien)
{
    $sql = "INSERT INTO cart_detail(cart_id,idpro,name,image,price,soluong,thanhtien) VALUES('$cartID','$idpro','$name','$image','$giakhuyenmai','$soluong','$thanhtien')";
    return pdo_execute($sql);
}


function update_cart_quantity($id, $soluong)
{
    $sql = "UPDATE cart_detail SET soluong = '$soluong' WHERE idpro = '$id'";
    pdo_execute($sql);
}

function update_soluong($cartID, $idpro, $soluong)
{
    $sql = "UPDATE cart_detail SET soluong = '$soluong' WHERE cart_id = '$cartID' AND idpro = '$idpro'";
    pdo_execute($sql);
}

function del_cart($id)
{
    $sql = "DELETE FROM cart_detail WHERE idpro = '$id'";
    pdo_execute($sql);
}
