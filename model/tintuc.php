<?php
function insert_tintuc($tieude,$noidung,$hinhtintuc,$idtt){
    $sql = "INSERT INTO tintuc(tieude,noidung,image,id_danhmuc) VALUES('$tieude','$noidung','$hinhtintuc','$idtt')";
    pdo_execute($sql);
}
function delete_tintuc($id){
    $sql= "delete from tintuc where id=".$id;
    pdo_execute($sql);
}
function listall_tintuc_home(){
    $sql= "SELECT * FROM tintuc where 1 order by id desc limit 0,9";
    $dssanpham= pdo_query($sql);
    return $dssanpham;
}
// function listall_sanpham_top10(){
//     $sql= "SELECT * FROM sanpham where 1 order by luotxem desc limit 0,10";
//     $dssanpham= pdo_query($sql);
//     return $dssanpham;
// }
function listall_tintuc($kyw="",$idtt=0){
    $sql= "SELECT * FROM tintuc where 1";
    if($kyw!=''){
        $sql.=" and tieude like '%".$kyw."%'";
    }
    if($idtt>0){
        $sql.=" and idtt = '".$idtt."'";
    }
    $sql.=" order by id desc";
    $dsdmtt= pdo_query($sql);
    return $dsdmtt;
}
function loadone_tintuc($id){
    $sql= "select * from tintuc where id=".$id;
    $tintuc=pdo_query_one($sql);
    return $tintuc;
}
function load_tintuc($idtt){
    if($idtt>0){
        $sql= "select * from tintuc where id=".$idtt;
        $dm=pdo_query_one($sql);
        extract($dm);
        return $tieude;
    }else{
        return "";
    }
}
function load_tintuc_cungloai($id,$idtt){
    $sql= "select * from tintuc where idtt=".$id." AND id <>".$id;
    $dssanpham= pdo_query($sql);
    return $dssanpham;
}
function update_tintuc($id,$idtt,$tieude,$noidung,$hinhtintuc){
    if($hinhtintuc!='')
    $sql = "update tintuc set id_danhmuc='".$idtt."', tieude='".$tieude."', noidung='".$noidung."', image='".$hinhtintuc."' where id=".$id;
    else
    $sql = "update tintuc set id_danhmuc='".$idtt."', tieude='".$tieude."', noidung='".$noidung."' where id=".$id;
    pdo_execute($sql);
}
?>