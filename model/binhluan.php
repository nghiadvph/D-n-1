<?php
function binhluan($idpro,$iduser,$noidung,$ngaybl){
    $sql = "INSERT INTO binhluan(idpro,iduser,noidung,ngaybl) VALUES('$idpro','$iduser','$noidung','$ngaybl')";
    pdo_execute($sql);
}
function binhluan_select_all($idpro){
    $sql= "select * from binhluan where 1";
    if($idpro>0) $sql.=" AND idpro= '".$idpro."'";
     $sql.=" order by id desc";
    $listbl= pdo_query($sql);
    return $listbl;
}
function delete_binhluan($id){
    $sql= "delete from binhluan where id=".$id;
    pdo_execute($sql);
}
?>