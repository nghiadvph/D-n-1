<?php
function insert_danhmuc($tenloai){
    $sql = "INSERT INTO danhmuc(name) VALUES('$tenloai')";
    pdo_execute($sql);
}
function delete_danhmuc($id){
    $sql= "delete from danhmuc where id=".$id;
    pdo_execute($sql);
}
function listall_danhmuc(){
    $sql= "SELECT * FROM danhmuc order by id desc";
    $dsdanhmuc= pdo_query($sql);
    return $dsdanhmuc;
}
function suadm_danhmuc($id){
    $sql= "select * from danhmuc where id=".$id;
    $dm=pdo_query_one($sql);
    return $dm;
}
function update_danhmuc($id,$tenloai){
    $sql = "update danhmuc set name='".$tenloai."' where id=".$id;
    pdo_execute($sql);
}
?>