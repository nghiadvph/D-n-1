<?php
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/dangky.php";
include "../model/binhluan.php";
include "../model/danhmuctintuc.php";
include "../model/tintuc.php";
include "../model/cart.php";
include "header.php";
//controller danhmuc
if (isset($_GET['act'])) {
   $act = ($_GET['act']);
   switch ($act) {
      case 'adddm':
         //kiểm tra xem người dùng có ấn vào add ko
         if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
            $tenloai = $_POST['tenloai'];
            insert_danhmuc($tenloai);
            $thongbao = "Thêm thành công";
         }
         include "danhmuc/add.php";
         break;
      case 'listdm':
         $dsdanhmuc = listall_danhmuc();
         include "danhmuc/listdm.php";
         break;
      case 'xoadm':
         if (isset($_GET['id']) && ($_GET['id'] > 0)) {
            delete_danhmuc($_GET['id']);
         }
         $dsdanhmuc = listall_danhmuc();
         include "danhmuc/listdm.php";
         break;
      case 'suadm':
         if (isset($_GET['id']) && ($_GET['id'] > 0)) {
            $dm = suadm_danhmuc($_GET['id']);
         }
         include "danhmuc/update.php";
         break;
      case 'updatedm':
         if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
            $tenloai = $_POST['tenloai'];
            $id = $_POST['id'];
            update_danhmuc($id, $tenloai);
            $thongbao = "Cập nhật thành công";
         }
         $dsdanhmuc = listall_danhmuc();
         include "danhmuc/listdm.php";
         break;

      //controller sản phẩm
      case 'addsp':
         //kiểm tra xem người dùng có ấn vào add ko
         if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
            $tensanpham = $_POST['tensanpham'];
            $iddm = $_POST['iddm'];
            $giacu = $_POST['giacu'];
            $giakhuyenmai = $_POST['giakhuyenmai'];

            //    $dir="img/";
            // //lấy basename lúc upload
            // $img = basename($_FILES['image']['name']);
            //  //nối đường dẫn lưu trữ
            // $target_file=$dir . $img;

            $target_dir = "../upload/";
            $hinhsp = basename($_FILES['hinhsanpham']['name']);
            $target_file = $target_dir . $hinhsp;
            move_uploaded_file($_FILES["hinhsanpham"]["tmp_name"], $target_file);
            $motasanpham = $_POST['motasanpham'];
            if ($tensanpham == "") {
               $thongbao1 = "Bạn chưa nhập tên";
            } else if ($giacu == "") {
               $thongbao2 = "Bạn chưa nhập giá cũ";
            } else if ($giakhuyenmai == "") {
               $thongbao3 = "Bạn chưa nhập giá khuyến mại";
            } else if ($hinhsp == "") {
               $thongbao4 = "Bạn chưa chọn hình sp";
            } else if ($motasanpham == "") {
               $thongbao5 = "Bạn chưa nhập mô tả";
            } else {
               insert_sanpham($tensanpham, $giacu, $giakhuyenmai, $hinhsp, $motasanpham, $iddm);
               $thongbao = "Thêm thành công";
            }
            // echo '<script>alert("Thêm thành công")</script>';
         }
         $dsdanhmuc = listall_danhmuc();
         include "sanpham/add.php";
         break;
      case 'listsp':
         if (isset($_POST['ok']) && ($_POST['ok'])) {
            $kyw = $_POST['kyw'];
            $iddm = $_POST['iddm'];
         } else {
            $kyw = '';
            $iddm = 0;
         }
         $dsdanhmuc = listall_danhmuc();
         $dssanpham = listall_sanpham($kyw, $iddm);
         include "sanpham/listdm.php";
         break;
      case 'xoasp':
         if (isset($_GET['id']) && ($_GET['id'] > 0)) {
            delete_sanpham($_GET['id']);
         }
         $dssanpham = listall_sanpham('', 0);
         header('Location: index.php?act=listsp');
         break;
      case 'suasp':
         if (isset($_GET['id']) && ($_GET['id'] > 0)) {
            $sanpham = loadone_sanpham($_GET['id']);
         }
         $dsdanhmuc = listall_danhmuc();
         include "sanpham/update.php";
         break;
      case 'suabill':
         if (isset($_GET['id']) && ($_GET['id'] > 0)) {
            $suabill = loadone_bill1($_GET['id']);
         }
         $listbill = loadall_bill1();
         include "bill/update.php";
         break;
      case 'updatesp':
         if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
            $id = $_POST['id'];
            $tensanpham = $_POST['tensanpham'];
            $iddm = $_POST['iddm'];
            $giacu = $_POST['giacu'];
            $giakhuyenmai = $_POST['giakhuyenmai'];
            $motasanpham = $_POST['motasanpham'];
            $hinh = $_FILES['hinh']['name'];
            $target_dir = "../upload/";
            $target_file = $target_dir . basename($_FILES['hinh']['name']);
            if (move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file)) {
            } else {
            }
            update_sanpham($id, $iddm, $tensanpham, $hinh, $giacu, $giakhuyenmai, $motasanpham);
            $thongbao = "Cập nhật thành công";
            echo '<script>alert("Cập nhật thành công")</script>';
         }
         $dsdanhmuc = listall_danhmuc();
         $dssanpham = listall_sanpham('', 0);
         include "sanpham/listdm.php";
         break;
         case 'updatedonhang':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
               $id = $_POST['id'];
               $tt1=$_POST['ttdh'];
               echo $tt1;
               update_cart($id,$tt1);
               $thongbao = "Cập nhật thành công";
            echo '<script>alert("Cập nhật thành công")</script>';
            }
            $listbill = loadall_bill1();
            include "bill/listbill.php";
            break;
            case 'chitiet':
               if (isset ($_GET['idbill']) && ($_GET['idbill'])) {
                   $idbill = $_GET['idbill'];
                   $onebill = loadall_cart1($idbill);
                   // extract($onebill);
                   include "bill/chitietdonhang.php";
               } 
               break;
      case 'dskh':
         $dstaikhoan = listall_taikhoan();
         include "taikhoan/list.php";
         break;
      case 'dsbl':
         $dsbinhluan = binhluan_select_all(0);
         include "binhluan/list.php";
         break;
      case 'xoabl':
         if (isset($_GET['id']) && ($_GET['id'] > 0)) {
            delete_binhluan($_GET['id']);
         }
         $dsbinhluan = binhluan_select_all(0);
         include "binhluan/list.php";
         break;
      case 'xoakh':
         if (isset($_GET['id']) && ($_GET['id'] > 0)) {
            delete_khachhang($_GET['id']);
         }
         $dstaikhoan = listall_taikhoan();
         include "taikhoan/list.php";
         break;
      case 'dsdh':
         if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
            $kyw = $_POST['kyw'];
         } else {
            $kyw = "";
         }
         $listbill = loadall_bill1($kyw, 0);
         include "bill/listbill.php";
         break;
      case 'tk':
         $listtk = loadall_thongke();
         include "thongke/listthongke.php";
         break;
      case 'bieudo':
         $listtk = loadall_thongke();
         include "thongke/bieudo.php";
         break;
      case 'dmtintuc':
         if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
            $tentintuc = $_POST['tentintuc'];
            insert_danhmuctintuc($tentintuc);
            $thongbao = "Đã thêm danh mục tin tức thành công";
         }
         include "danhmuctintuc/danhmuctintuc.php";
         break;
      case 'listtintuc':
         $alltintuc = listall_danhmuctintuc();
         include "danhmuctintuc/dstintuc.php";
         break;
      case 'xoatt':
         if (isset($_GET['id_danhmuc']) && ($_GET['id_danhmuc'] > 0)) {

            delete_danhmuctintuc($_GET['id_danhmuc']);
         }
         $alltintuc = listall_danhmuctintuc();
         include "danhmuctintuc/dstintuc.php";
         break;
      case 'suatt':
         if (isset($_GET['id_danhmuc']) && ($_GET['id_danhmuc'] > 0)) {
            $dm = suadm_danhmuctintuc($_GET['id_danhmuc']);
         }
         include "danhmuctintuc/suatintuc.php";
         break;
      case 'updatett':
         if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
            $tentintuc = $_POST['tentintuc'];
            $id_danhmuc = $_POST['id_danhmuc'];
            update_danhmuctintuc($id_danhmuc, $tentintuc);
            $thongbao = "Cập nhật thành công";
         }
         $alltintuc = listall_danhmuctintuc();
         include "danhmuctintuc/dstintuc.php";
         break;
      case 'tt':
         //kiểm tra xem người dùng có ấn vào add ko
         if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
            $noidung = $_POST['noidung'];
            $tieude = $_POST['tieude'];
            $idtt = $_POST['idtt'];
            $target_dir = "../upload/";
            $hinhtintuc = basename($_FILES['hinhtintuc']['name']);
            $target_file = $target_dir . $hinhtintuc;
            move_uploaded_file($_FILES["hinhtintuc"]["tmp_name"], $target_file);
            insert_tintuc($tieude, $noidung, $hinhtintuc, $idtt);
            $thongbao = "Thêm thành công";
         }
         $alltintuc = listall_danhmuctintuc();
         include "tintuc/tintuc.php";
         break;
      case 'tintuc':
         if (isset($_POST['ok']) && ($_POST['ok'])) {
            $kyw = $_POST['kyw'];
            $idtt = $_POST['idtt'];
         } else {
            $kyw = '';
            $idtt = 0;
         }
         $dsdmtt = listall_tintuc($kyw, $idtt);
         $alltintuc = listall_danhmuctintuc();
         include 'tintuc/listtintuc.php';
         break;
      case 'xoadmtt':
         if (isset($_GET['id']) && ($_GET['id'] > 0)) {
            echo '<script>alert("Xác nhận xóa")</script>';
            delete_tintuc($_GET['id']);
         }
         $dsdmtt = listall_tintuc('', 0);
         include 'tintuc/listtintuc.php';
         break;
      case 'suadmtt':
         if (isset($_GET['id']) && ($_GET['id'] > 0)) {
            $onetintuc = loadone_tintuc($_GET['id']);
         }
         $alltintuc = listall_danhmuctintuc();
         include "tintuc/updatett.php";
         break;
      case 'updatetintuc':
         if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
            $id = $_POST['id'];
            $tieude = $_POST['tieude'];
            $idtt = $_POST['idtt'];
            $noidung = $_POST['noidung'];
            $hinhtintuc = $_FILES['hinhtintuc']['name'];
            $target_dir = "../upload/";
            $target_file = $target_dir . basename($_FILES['hinhtintuc']['name']);
            if (move_uploaded_file($_FILES['hinhtintuc']['tmp_name'], $target_file)) {
            } else {
            }
            update_tintuc($id, $idtt, $tieude, $noidung, $hinhtintuc);
            $thongbao = "Cập nhật thành công";
         }
         $alltintuc = listall_danhmuctintuc();
         $dsdmtt = listall_tintuc('', 0);
         include "tintuc/listtintuc.php";
         break;
      default:
         include "home.php";
         break;
   }
} else {
   include "home.php";
}
include "footer.php";
?>