<?php
function insert_sanpham($tensanpham,$giacu,$giakhuyenmai,$hinhsp,$motasanpham,$iddm){
    $sql = "INSERT INTO sanpham(name,pricecu,pricekhuyenmai,image,mota,iddm) VALUES('$tensanpham','$giacu','$giakhuyenmai','$hinhsp','$motasanpham','$iddm')";
    pdo_execute($sql);
}
function insert_sanphamabc($tensanpham,$giacu,$giakhuyenmai,$hinhsp,$motasanpham,$iddm){
    $sql = "INSERT INTO sanpham(name,pricecu,pricekhuyenmai,image,mota,iddm) VALUES('$tensanpham','$giacu','$giakhuyenmai','$hinhsp','$motasanpham','$iddm')";
    pdo_execute($sql);
}
function delete_sanpham($id){
    $sql= "delete from sanpham where id=".$id;
    pdo_execute($sql);
}
function listall_sanpham_home(){
    $sql= "SELECT * FROM sanpham where 1 order by id desc limit 0,9";
    $dssanpham= pdo_query($sql);
    return $dssanpham;
}
function listall_sanpham_home1(){
    $sql= "SELECT * FROM sanpham where 1 order by id desc limit 0,9";
    $dssanpham= pdo_query($sql);
    return $dssanpham;
}
function listall_sanpham_top10(){
    $sql= "SELECT * FROM sanpham where 1 order by luotxem desc limit 0,10";
    $dssanpham= pdo_query($sql);
    return $dssanpham;
}
function listall_allsanpham_top10(){
    $sql= "SELECT * FROM sanpham where 1 order by luotxem desc limit 0,30";
    $dssanpham= pdo_query($sql);
    return $dssanpham;
}
function listall_allsanpham_top6(){
    $sql= "SELECT * FROM sanpham where 1 order by luotxem desc limit 0,6";
    $dssanpham= pdo_query($sql);
    return $dssanpham;
}
function listall_sanpham($kyw="",$iddm=0){
    $sql = "SELECT sp.*, dm.name AS category_name 
            FROM sanpham sp 
            JOIN danhmuc dm ON sp.iddm = dm.id 
            WHERE 1";
    if($kyw!=''){
        $sql.=" and sp.name like '%".$kyw."%'";
    }
    if($iddm>0){
        $sql.=" and iddm = '".$iddm."'";
    }
    $sql.=" order by id desc";
    $dssanpham= pdo_query($sql);
    return $dssanpham;
}
function loadone_sanpham($id){
    $sql= "select * from sanpham where id=".$id;
    $sp=pdo_query_one($sql);
    return $sp;
}
function load_tensanpham($iddm){
    if($iddm>0){
        $sql= "select * from danhmuc where id=".$iddm;
        $dm=pdo_query_one($sql);
        extract($dm);
        return $name;
    }else{
        return "";
    }
   
}
function load_sanpham_cungloai($id,$iddm){
    $sql= "select * from sanpham where iddm=".$iddm." AND id <>".$id;
    $dssanpham= pdo_query($sql);
    return $dssanpham;
}
function update_sanpham($id,$iddm,$tensanpham,$hinh,$giacu,$giakhuyenmai,$motasanpham){
    if($hinh!='')
    $sql = "update sanpham set iddm='".$iddm."', name='".$tensanpham."', image='".$hinh."', pricecu='".$giacu."', pricekhuyenmai='".$giakhuyenmai."', mota='".$motasanpham."' where id=".$id;
    else
    $sql = "update sanpham set iddm='".$iddm."', name='".$tensanpham."', pricecu='".$giacu."', pricekhuyenmai='".$giakhuyenmai."', mota='".$motasanpham."' where id=".$id;
    pdo_execute($sql);
}
?>