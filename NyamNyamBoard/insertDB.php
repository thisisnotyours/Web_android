<?php

    header("Content-Type:text/plain; charset=utf-8");

    $title= $_POST['title'];
    $msg= $_POST['msg'];
    $email= $_POST['email'];

    $srcName= $_FILES['img']['name'];
    $fileSize= $_FILES['img']['size'];
    $tmpName= $_FILES['img']['tmp_name'];
    
    if($srcName){
        $dstName= "Uploads/" . date('YmsHis') . $srcName;
        move_uploaded_file($tmpName, $dstName);
        
    }    
   
    $now= date('Y-m-d A H:i:s');

    //DB market 데이블에 데이터 저장
    $conn= mysqli_connect('localhost','suhyun2963','ksh296300!','suhyun2963');
    mysqli_query($conn, "set names utf8");

    $sql= "INSERT INTO NyamNyamBoard(title, msg, file, date, email) VALUES('$title','$msg','$dstName','$now','$email')";
    $result= mysqli_query($conn, $sql);

    if($result) echo "Posting successful!";
    else echo "Uploading failed. Try again :(";

    mysqli_close($conn);

?>