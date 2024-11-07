<?php
   session_start();
   include "../../model/pdo.php";
   include "../../model/binhluan.php";
   $idpro=$_REQUEST['idpro'];
   $dsbl=binhluan_select_all($idpro);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .binhluan{
            width: 100%;
            min-height:200px ;
            background-color: #FFF;
            border: 1px solid #CCC;
        }
        .binhluan table{
            margin-left: 30px;
            margin-top: 20px;
        }
        .binhluan table td:nth-child(1){
            width: 50%;
        }
        .binhluan table td:nth-child(2){
            width: 25%;
        }
        .binhluan table td:nth-child(3){
            width: 25%;
        }
        .binh{
            width: 100%;
            height: 50px;
            text-align: center;
        }
        .binh input:nth-child(2){
            padding: 7px 50px;
            margin-top: 10px;
            border-radius: 3px;
            border: 0.5px solid #CCC;
        }
        .binh input:nth-child(3){
            padding: 7px 5px;
            border-radius: 3px;
            border: 0.5px solid #CCC;
            background-color: wheat;
            color: tomato;
        }
        .binh input:nth-child(3):hover{
            background-color: violet;
            color: white;
        }
    </style>
</head>
<body>
        <section class="form3 row binhluan">
            <table>
                <?php
                 foreach ($dsbl as $ds) {
                    extract($ds);
                      echo '<tr><td>'.$noidung.'</td>';
                      echo '<td>'.$iduser.'</td>';
                      echo '<td>'.$ngaybl.'</td></tr>';
                    }
                ?>
            </table>
        </section>
        <section class="binh">
            <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
                <input type="hidden" name="idpro" value="<?=$idpro?>">
                <input type="text" name="noidung">
                <input type="submit" name="msg" value="Gửi bình luận">
            </form>
        </section>
        <?php
        if(isset($_POST['msg'])&&($_POST['msg'])){
            $noidung=$_POST['noidung'];
            $idpro=$_POST['idpro'];
            $iduser=$_SESSION['user']['id'];   
            $ngaybl=date("h:i:sa d/m/Y");
        binhluan($idpro,$iduser,$noidung,$ngaybl);
        header("Location:".$_SERVER['HTTP_REFERER']);
    }   
        ?>
    </body>
</html>