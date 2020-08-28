<?php

    header('Content-Type:text/plain; charset=utf-8');

    $name= $_POST['name'];
    $title= $_POST['title'];
    $msg= $_POST['msg'];
    $price= $_POST['price'];

    //echo "$name";

    $srcName= $_FILES['img']['name'];
    $fileSize= $_FILES['img']['size'];
    $tmpName= $_FILES['img']['tmp_name'];
    
    $dstName= "Uploads/".date('YmdHis').$srcName;
    move_uploaded_file($tmpName, $dstName);


    $conn= mysqli_connect('localhost','suhyun2963','ksh296300!','suhyun2963');
    mysqli_query($conn, "set names utf8");

    $sql= "INSERT * INTO BoardPractice(name, title, msg, price, file) VALUES('$name','$title','$msg','$price','$dstName')";
    $result= mysqli_query($conn, $sql);

    if($result) echo "uploading success";
    else echo "uploading failed";

    mysqli_close($conn);






?>