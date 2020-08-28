<?php

    header('Content-Type:text/plain; charset=utf-8');

    $date= $_POST['date'];
    $title= $_POST['title'];
    $msg= $_POST['msg'];

    //html 에서 php 로 언어가 변환하여 DB로 저장이 될 때 전달이 잘 되었는지 확인하는 것
    //ex; html관리자페이지에서 값을 전달할때 suhyun2963.dothome.co.kr/Dialog/admin.html -> suhyun2963.dothome.co.kr/Dialog/insert.php 로 페이지 변환
    echo $date;
    echo $title;
    echo $msg;

    
    $srcName= $_FILES['img']['name'];
    $fileSize= $_FILES['img']['size'];
    $tmpName= $_FILES['img']['tmp_name'];

    $dstName= "Uploads/" .date('YmsHis') . $srcName;
    move_uploaded_file($tmpName, $dstName);




    //DB 서버에 접속
    $conn= mysqli_connect('localhost','suhyun2963','ksh296300!','suhyun2963');
    mysqli_query($conn, "set names utf8");

    $sql= "INSERT INTO Dialog(date, title, msg, file) VALUES('$date','$title','$msg','$dstName')";
    $result= mysqli_query($conn, $sql);    

    if($result) echo "Posting succeed!";
    else echo "Posting failed";

    mysqli_close($conn);

?>