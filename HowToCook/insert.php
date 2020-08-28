<?php

    header('Content-Type:text/plain; charset=utf-8');

    $srcName= $_FILES['img']['name'];
    $fileSize= $_FILES['img']['size'];
    $tmpName= $_FILES['img']['tmp_name'];

    $dstName= "Uploads/".date('YmsHis').$srcName;
    move_uploaded_file($tmpName, $dstName);

    $cat= $_POST['cat'];
    $title= $_POST['title'];
    $sub= $_POST['sub'];
    $ing= $_POST['ing'];
    $step= $_POST['step'];

    
    $ing= addslashes($ing);
    $step= addslashes($step);

    echo "$cat \n";

    $conn= mysqli_connect("localhost","suhyun2963","ksh296300!","suhyun2963");
    mysqli_query($conn, "set names utf8");

    $sql= "INSERT INTO HowToCook(file, cat, title, sub, ing, step)VALUES('$dstName','$cat','$title','$sub','$ing','$step')";
    $result= mysqli_query($conn, $sql);

    if($result) echo "Posting success!";
    else echo "Uploading fail :(((";

    mysqli_close($conn);


?>