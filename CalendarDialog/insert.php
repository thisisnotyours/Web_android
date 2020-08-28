<?php

    header('Content-Type:text/plain; charset=utf-8');

    $name= $_POST['name'];
    $date= $_POST['date'];
    $title= $_POST['title'];
    $msg= $_POST['msg'];

    echo $date;

    $srcName= $_FILES['img']['name'];   //원본이름
    $fileSize= $_FILES['img']['size'];
    $tmpName= $_FILES['img']['tmp_name'];

    $dstName= "Uploads/" .date('YmsHis') . $srcName;
    move_uploaded_file($tmpName, $dstName);
   


    $conn= mysqli_connect("localhost","suhyun2963","ksh296300!","suhyun2963");  //DB서버 접속
    
    mysqli_query($conn, "set names utf8");    //한글깨짐 방지

    $sql= "INSERT INTO CalendarDialog(name, date, title, msg, file) VALUES('$name','$date','$title','$msg','$dstName')";
    $result= mysqli_query($conn, $sql);

    if($result) echo "Posting successed!";
    else echo "Uploading failed.";

    mysqli_close($conn);




?>
