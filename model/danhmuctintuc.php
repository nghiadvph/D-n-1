<?php
function insert_danhmuctintuc($tentintuc){
    $sql = "INSERT INTO danhmuctintuc(ten_danhmuc) VALUES('$tentintuc')";
    pdo_execute($sql);
}
function delete_danhmuctintuc($id_danhmuc){
    $sql= "delete from danhmuctintuc where id_danhmuc=".$id_danhmuc;
    pdo_execute($sql);
}
function listall_danhmuctintuc(){
    $sql= "SELECT * FROM danhmuctintuc order by id_danhmuc desc";
    $dstintuc= pdo_query($sql);
    return $dstintuc;
}
function suadm_danhmuctintuc($id_danhmuc){
    $sql= "select * from danhmuctintuc where id_danhmuc=".$id_danhmuc;
    $dm=pdo_query_one($sql);
    return $dm;
}
function update_danhmuctintuc($id_danhmuc,$tentintuc){
    $sql = "update danhmuctintuc set ten_danhmuc='".$tentintuc."' where id_danhmuc=".$id_danhmuc;
    pdo_execute($sql);
}
?>