<?php

    header('Content-Type:application/json; charset=utf-8');

    $conn= mysqli_connect('localhost','suhyun2963','ksh296300!','suhyun2963');
    mysqli_query($conn, "set names utf8");

    $sql= "SELECT * FROM NyamNyamBoard";
    $result= mysqli_query($conn, $sql);

    $row_num= mysqli_num_rows($result);

    $rows= array();
    for($i=0; $i<$row_num; $i++){
        $row= mysqli_fetch_array($result, MYSQLI_ASSOC);       //DB에 저장된 연관배열..
        $rows[$i]= $row;
    }

    echo json_encode($rows);
    mysqli_close($conn);


?>