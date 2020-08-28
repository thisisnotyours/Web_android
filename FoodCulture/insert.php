<?php

    header('Content-Type:text/plain; charset=utf-8');

    $title= $_POST['title'];
    $sub= $_POST['sub'];
    $source= $_POST['source'];
    $msg= $_POST['msg'];

    //메세지에 특수문자가 있어서 잘못될 수 있으므로
    $source= addslashes($source);
    $msg= addslashes($msg);

    
    $srcName= $_FILES['img']['name'];
    $fileSize= $_FILES['img']['size'];
    $tmpName= $_FILES['img']['tmp_name'];

    $dstName= "Uploads/".date('YmsHis').$srcName;
    move_uploaded_file($tmpName, $dstName);


    echo "$title : ";


    $conn= mysqli_connect("localhost","suhyun2963","ksh296300!","suhyun2963");
    mysqli_query($conn, "set names utf-8");

    $sql= "INSERT INTO FoodCulture(title, sub, file, source, msg)VALUES('$title','$sub','$dstName','$source','$msg')";
    $result= mysqli_query($conn, $sql);

    if($result) echo "Posting success!";
    else echo "Uploading fail :(";

    mysqli_close($conn);

?>