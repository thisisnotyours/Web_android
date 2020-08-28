<?php

    header('Content-Type:text/plain; charset=utf-8');

    $name= $_POST['name'];
    $title= $_POST['title'];
    $msg= $_POST['msg'];
    $price= $_POST['price'];
    
    $srcName= $_FILES['img']['name'];   //multiPartBody 만들때 식별자..
    $fileSize= $_FILES['img']['size'];
    $tmpName= $_FILES['img']['tmp_name'];

    //echo "$name \n";
    // echo "$title \n";
    // echo "$msg \n";
    // echo "$price \n";
    // echo "$srcName \n";
    // echo "$fileSize \n";
    // echo "$tmpName \n";


    //임시저장소에 있는 업로드된 파일을 영구저장소로 이동
    $dstName= "uploads/" . date('YmdHis') . $srcName;     //uploads 라는 폴더가 또 있을 수 있으니..   //$dstName -저장위치
    move_uploaded_file($tmpName, $dstName);    //$tmpName을 $dstName으로 이동

    $fav= 0;  //'좋아요' 여부- true/ false 가 안됨- 대신에 1, 0 으로 저장 (tinyInt)
    $now= date('Y-m-d A H:i:s');



    //DB market 테이블에 데이터 저장
    $conn= mysqli_connect('localhost','suhyun2963','ksh296300!','suhyun2963');  //DB서버주소, ID, PW, DB명
    mysqli_query($conn, "set names utf8");  //한글깨짐 방지

    //원하는 Query 문 작성 [ 주의 : tinyint(1)는 Value 입력시에 ''가 없어야 함 ]
    $sql= "INSERT INTO market(name, title, msg, price, file, fav, date) VALUES('$name','$title','$msg','$price','$dstName',$fav,'$now')";
    $result= mysqli_query($conn, $sql);

    if($result) echo "게시글이 업로드 되었습니다.";
    else echo "업로드에 실패했습니다. 다시 시도해주세요";

    mysqli_close($conn);

?>