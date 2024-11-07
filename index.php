<?php
session_start();
include "./model/dangky.php";
include "./model/pdo.php";
include "./model/sanpham.php";
include "./model/danhmuc.php";
include "./model/cart.php";
include "./view/header.php";
include "./global.php";
if (!isset($_SESSION['mycart'])) {

    $_SESSION['mycart'] = [];
}
$dstop6 = listall_allsanpham_top6();
$allsp = listall_allsanpham_top10();
$spnew = listall_sanpham_home1();
// $tintucnew = listall_tintuc_home();
$dsdm = listall_danhmuc();
$dstop10 = listall_sanpham_top10();
if (isset($_GET['act']) && ($_GET['act']) != '') {
    $act = ($_GET['act']);
    switch ($act) {
        case 'dangky':
            if (isset($_POST['submit']) && ($_POST['submit'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                if ($user == "") {
                    $thongbaouser = "Bạn chưa nhập tên";
                } else if ($pass == "") {
                    $thongbaopass = "Bạn chưa nhập pass";
                } else if ($email == "") {
                    $thongbaoemail = "Bạn chưa nhập email";
                } else {
                    insert_taikhoan($user, $pass, $email);
                    $thongbao = "Đã đăng ký thành công. Vui lòng đăng nhập để thực hiện chức năng";
                }
            }
            include "view/taikhoan.php/dangky.php";
            break;
        case 'edit_taikhoan':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $id = $_POST['id'];
                update_taikhoan($id, $user, $pass, $email, $address, $tel);
                $_SESSION['user'] = checkuser($user, $pass);
                header('Location: index.php?act=edit_taikhoan');
            }
            include "view/taikhoan.php/edit_taikhoan.php";
            break;
        case 'dangnhap':
            if (isset($_POST['nhap']) && ($_POST['nhap'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $checkuser = checkuser($user, $pass);
                if (is_array($checkuser)) {
                    $_SESSION['user'] = $checkuser;
                    header('Location:index.php');
                    exit();
                } else {
                    $thongbao = "Tài khoản không tồn tại. Vui lòng đăng nhập lại!";
                }
            }
            include "view/taikhoan.php/dangky.php";
            break;

        case 'quenmk':
            if (isset($_POST['quenmk']) && ($_POST['quenmk'])) {
                $email = $_POST['email'];
                $checkemail = checkemail($email);
                if (is_array($checkemail)) {
                    $thongbao = "Mật khẩu là " . $checkemail['pass'];
                } else {
                    $thongbao = "Không tìm thấy email";
                }
            }
            include "view/taikhoan.php/quenmk.php";
            break;
        case 'dangnhap1':
            if (isset($_POST['nhapdang']) && ($_POST['nhapdang'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $checkuser = checkuser($user, $pass);
                if (is_array($checkuser)) {
                    $_SESSION['user'] = $checkuser;
                    header("Location:index.php?act=bill");
                    exit();
                } else {
                    $thongbao = "Tài khoản không tồn tại. Vui lòng đăng nhập lại!";
                }
            }
            include "view/dangnhap.php";
            break;
        case 'thoat':
            session_unset();
            header('Location: index.php');
            break;
        case 'doimatkhau':
            if (isset($_POST['doimatkhau']) && ($_POST['doimatkhau'])) {
                $id = $_POST['id'];
                $pass = $_POST['pass'];
                $pass1 = $_POST['pass1'];
                $pass2 = $_POST['pass2'];
                // var_dump($pass3);
                //    var_dump($_POST);
                //    die();
                $checkP = $_SESSION['user']['pass'];
                // var_dump($checkP);
                // die();
                if ($pass !== $checkP) {
                    echo '<script>alert("Xác nhận mk cũ không đúng")</script>';
                } else if ($pass1 !== $pass2) {
                    echo '<script>alert("Xác nhận mk mới không khớp")</script>';
                } else if ($pass1 == "") {
                    echo '<script>alert("Bạn chưa nhập mật khẩu mới")</script>';
                } else {
                    update_pass($id, $pass1);
                    echo '<script>alert("Thay đổi mật khẩu thành công")</script>';
                    // header ('Location: index.php');
                }
                //    $_SESSION['user'] = checkuser($id,$pass);
            }
            include "view/taikhoan.php/doimatkhau.php";
            break;
        case 'sanphamct':
            if (isset($_GET['iddm']) && ($_GET['iddm'])) {
                $id = $_GET['iddm'];
                $onesp = loadone_sanpham($id);
                extract($onesp);
                $sanpham_cungloai = load_sanpham_cungloai($id, $iddm);
                include "view/sanphamct.php";
            } else {
                include "view/home.php";
            }
            break;
        case 'sanpham':
            if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            if (isset($_GET['iddm']) && ($_GET['iddm'])) {
                $iddm = $_GET['iddm'];
            } else {
                $iddm = 0;
            }
            $dssp = listall_sanpham($kyw, $iddm);
            $tendm = load_tensanpham($iddm);
            include "view/sanpham.php";
            break;
        // case 'addtocart':
        //     if (isset ($_POST['addtocart']) && ($_POST['addtocart'])) {
        //         $id = $_POST['id'];
        //         $hinh = $_POST['img'];
        //         $name = $_POST['name'];
        //         $pricekhuyenmai = $_POST['pricekhuyenmai'];
        //         $soluong = $_POST['soluong'];
        //         $thanhtien = $pricekhuyenmai * $soluong;
        //         $spadd = [$id, $hinh, $name, $pricekhuyenmai, $soluong, $thanhtien];
        //         array_push($_SESSION['mycart'], $spadd);
        //     }
        //     include "view/cart/viewcart.php";
        //     break;
        case 'addtocartme':
            if (isset($_POST['muangay']) && ($_POST['muangay'])) {
                $id = $_POST['id'];
                $hinh = $_POST['img'];
                $name = $_POST['name'];
                $pricekhuyenmai = $_POST['pricekhuyenmai'];
                $soluong = $_POST['soluong'];
                $thanhtien = $pricekhuyenmai * $soluong;
                $userID = $_SESSION['user']['id'];
                    $cart = getCartUserID($userID);

                    if (empty($cart)) {
                        $cartID = getCartID($_SESSION['user']['id']);
                    } else {
                        $cartID = $cart['id'];
                    }

                    if (!isset($_SESSION['mycart'][$id])) {
                        insertCart($cartID, $id, $hinh, $name, $pricekhuyenmai, $soluong, $thanhtien);
                        $data = [
                            'cart_id' => $cartID,
                            'id' => $id,
                            'hinh' => $hinh,
                            'name' => $name,
                            'pricekhuyenmai' => $pricekhuyenmai,
                            'soluong' => $soluong,
                            'thanhtien' => $thanhtien
                        ];
                        $_SESSION['mycart'][$id] = $data;
                    }
                include "view/cart/bill.php";
            }
            if (isset($_SESSION['user'])) {
                if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
                    $id = $_POST['id'];
                    $hinh = $_POST['img'];
                    $name = $_POST['name'];
                    $pricekhuyenmai = $_POST['pricekhuyenmai'];
                    $soluong = $_POST['soluong'];
                    $thanhtien = $pricekhuyenmai * $soluong;
                    $userID = $_SESSION['user']['id'];
                    $cart = getCartUserID($userID);

                    if (empty($cart)) {
                        $cartID = getCartID($_SESSION['user']['id']);
                    } else {
                        $cartID = $cart['id'];
                    }

                    if (!isset($_SESSION['mycart'][$id])) {
                        insertCart($cartID, $id, $hinh, $name, $pricekhuyenmai, $soluong, $thanhtien);
                        $data = [
                            'cart_id' => $cartID,
                            'id' => $id,
                            'hinh' => $hinh,
                            'name' => $name,
                            'pricekhuyenmai' => $pricekhuyenmai,
                            'soluong' => $soluong,
                            'thanhtien' => $thanhtien
                        ];
                        $_SESSION['mycart'][$id] = $data;
                    } else {
                        $soLuong = 0;
                        $updateSoLuong = $_SESSION['mycart'][$id]['soluong'] += $soluong;
                        update_soluong($cartID, $id, $updateSoLuong);
                    }

                    header("Location: index.php?act=viewcart");
                }
            } else {
                echo '<script>alert("Vui lòng đăng nhập để đặt hàng")</script>';
                echo '<script>window.location.href="index.php?act=dangnhap"</script>';
            }
            break;
        case 'inc':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $productID = loadone_sanpham($id);
                if (!empty($_SESSION['mycart'])) {
                    foreach ($_SESSION['mycart'] as $key => $value) {
                        echo '<pre>';
                        print_r($key);
                        print_r($value);
                        if ($value['id'] == $productID['id']) {
                            $soLuong = $value['soluong'] + 1;
                            update_cart_quantity($productID['id'], $soLuong);
                            $_SESSION['mycart'][$key]['soluong'] = $soLuong;
                            header("Location: index.php?act=viewcart");
                        }
                    }
                }
            }
            break;
        case 'des':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $productID = loadone_sanpham($id);
                if (!empty($_SESSION['mycart'])) {
                    foreach ($_SESSION['mycart'] as $key => $value) {

                        if ($value['id'] == $productID['id']) {
                            if(($value['soluong'] <2) && ($value['id'] == $productID['id'])){
                                $soLuong = $value['soluong'] = 1;
                                var_dump($value['soluong']);
                                update_cart_quantity($productID['id'], $soLuong);
                                $_SESSION['mycart'][$key]['soluong'] = $soLuong;
                                header("Location: index.php?act=viewcart");
                            }else{
                                $soLuong = $value['soluong'] - 1;
                                update_cart_quantity($productID['id'], $soLuong);
                                $_SESSION['mycart'][$key]['soluong'] = $soLuong;
                                header("Location: index.php?act=viewcart");
                            }
                        }
                    }
                }
            }
            break;
        case 'del':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                del_cart($id);
                if (isset($_SESSION['mycart'][$id])) {
                    unset($_SESSION['mycart'][$id]);
                }
            } else {
                $_SESSION['mycart'] = [];
            }
            header('Location: index.php?act=viewcart');
            break;
        case 'delete':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_bill($_GET['id']);
             }
             header('Location: index.php?act=mybill1');
             break;
        case 'delcart1':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_bill($_GET['id']);
             } else {
                $_SESSION['mycart'] = [];
            }
            header('Location: index.php?act=mybill1');
            break;
            case 'delcart':
                if (isset ($_GET['idcart'])) {
                    array_splice($_SESSION['mycart'], $_GET['idcart'], 1);
                } else {
                    $_SESSION['mycart'] = [];
                }
                header('Location: index.php?act=viewcart');
                break;
        case 'chitiet':
            if (isset($_GET['idbill']) && ($_GET['idbill'])) {
                $idbill = $_GET['idbill'];
                $onebill = loadall_cart1($idbill);
                // extract($onebill);
                include "view/cart/chitietdonhang.php";
            } else {
                include "view/home.php";
            }
            break;
        case 'billcomform':
            if (isset($_POST['dongy']) && ($_POST['dongy'])) {
                if (isset($_SESSION['user']))
                    $iduser = $_SESSION['user']['id'];
                else
                    $id = 0;
                $name = $_POST['name'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['sodienthoai'];
                $pttt = $_POST['pttt'];
                $ngaydathang = date("h:i:sa d/m/Y");
                $tongdonhang = tongdonhang();
                $idbill = insert_bill1($iduser, $name, $email, $address, $tel, $pttt, $ngaydathang, $tongdonhang);
                foreach ($_SESSION['mycart'] as $cart) {
                    insert_cart1($_SESSION['user']['id'], $cart['id'], $cart['name'], $cart['hinh'], $cart['pricekhuyenmai'], $cart['soluong'], $cart['thanhtien'], $idbill);
                $_SESSION['mycart'] = [];
                }
                $_SESSION['cart'] = [];
                // if (isset($idbill)) {
                //     $bill = loadone_bill1($idbill);
                //     $cartbill = loadall_cart1($idbill);
                // } else {
                //     echo '<script>alert("Lỗi")</script>';
                // }

            }
            include "view/cart/billcomform.php";
            break;
        // case 'sanpham1':
        //     include "view/sanpham1.php";
        //     break;
        case 'bill':
            include "view/cart/bill.php";
            break;
        case 'viewcart':
            include "view/cart/viewcart.php";
            break;
        case 'cart-inc':
            if (isset($_GET['productid'])) {
                $id = $_GET['productid'];
                $productID = loadone_sanpham($id);
                if (isset($_SESSION['mycart'])) {
                    $cart = $_SESSION['mycart'];
                    foreach ($_SESSION['mycart'] as &$item) {
                        if ($item[0] == $productID) {
                            $cart[$item][4] += 1;
                        }
                    }
                }
            }
            include "view/cart/viewcart.php";
            break;
        case "Sanpham":
            if (isset($_POST['kyw']) && ($_POST['kyw'])) {
                $kyw = $_POST['kyw'];
                $iddm = $_POST['iddm'];
            } else {
                $kyw = '';
                $iddm = 0;
            }
            $dsdm = listall_danhmuc();
            $dssanpham = listall_sanpham($kyw, $iddm);
            include "view/sanpham1.php";
            break;
        // case 'mybill':
        //     $listbill = loadall_bill($_SESSION['user']['id']);
        //     include "view/cart/mybill.php";
        //     break;
        case 'mybill1':
            $listbill = loadall_bill1($_SESSION['user']['id']);
            include "view/cart/mybill.php";
            break;
        case "Liên hệ":
            include "view/lienhe.php";
            break;
        case "Tin tức":
            include "view/tintuc.php";
            break;
        default:
            include "./view/home.php";
            break;
    }
} else {
    include "./view/home.php";
}
include "./view/footer.php";
