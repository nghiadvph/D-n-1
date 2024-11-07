<?php
function listall_taikhoan(){
    $sql= "select * from user order by id desc";
    $dstaikhoan= pdo_query($sql);
    return $dstaikhoan;
}
function insert_taikhoan($user,$pass,$email){
    $sql = "INSERT INTO user(user,pass,email) VALUES('$user','$pass','$email')";
    pdo_execute($sql);
}
function checkuser($user,$pass){
    $sql= "select * from user where user='".$user."' AND pass='".$pass."'";
    $sp=pdo_query_one($sql);
    return $sp;
}
function checkemail($email){
    $sql= "select * from user where email='".$email."'";
    $sp=pdo_query_one($sql);
    return $sp;
}
function get_taikhoan($n)
{
    switch ($n) {
        case '0':
            $tt = "Khách hàng";
            break;
        case '1':
            $tt = "Admin";
            break;
        default:
            $tt = "Admin";
            break;
    }
    return $tt;
}
function update_taikhoan($id,$user,$pass,$email,$address,$tel){
    $sql = "update user set user='".$user."', pass='".$pass."',email='".$email."', address='".$address."', tel='".$tel."' where id=".$id;
    pdo_execute($sql);
}
function update_pass($id,$pass1){
    $sql = "update user set pass='".$pass1."' where id=".$id;
    pdo_execute($sql);
}

function checkP($pass) {
    $sql = "SELECT * FROM user WHERE pass = '$pass'";
    return pdo_query_one($sql);
}

function delete_khachhang($id){
    $sql= "delete from user where id=".$id;
    pdo_execute($sql);
}
?>