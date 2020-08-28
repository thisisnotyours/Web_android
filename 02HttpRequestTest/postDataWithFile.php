<?php

    header('Content-Type:text/html; charset=utf-8');  //한글깨짐 방지

    $name= $_POST['name'];
    $message= $_POST['msg'];

    $file= $_FILES['img'];    //file을 받는게 아니라  업로드된 file의 '정보'를 가진 배열
    $srcName= $file['name'];
    $tmpName= $file['tmp_name'];   //임시저장소
    $fileSize= $file['size'];

    //업로드된 파일이 최종 저장될 파일 위치와 파일명
    $fileName= date('Ymdhis') . $srcName;   // .연산자 -> 문자열로 변환
    $dstName= "./uploads/" . $fileName;


    if( move_uploaded_file($tmpName, $dstName) ){    //$tmpName에 있는 파일을 $dstName 로 옮기기
        echo "upload success";
    }else{
        echo "upload fail";
    }


    //값들이 잘 되어있는지 확인
    echo "<br><br>";
    echo "$name <br>";
    echo "$message <br>";
    echo "$dstName <br>";   //목적지 주소
    echo "$fileSize <br>";

    //게시글이 저장되는 날짜
    $now= date('Y-m-d h:i');    //ex; 2020-06-17 AM 09:20

    //php에서는 '',"" 둘다 문자열인데 "큰따옴표" 안에서는 $변수명을 알아들을 수 있음
   
    //SQL - structured, 구조화 되어있음.
    //MYSQL DB에 저장하기 [board 테이블에 저장]     ---> name, message, file경로, date(now- 현재날짜,시간)
    //저장할 데이터 :  $name, $message, $dstName, $now [no는 Auto Increment값이라 DB에 저장안함]   
    //DB저장 명령하기
    // 1. MySQL DB에 접속하기   ($conn-> 연결시켜주는 connector 참조변수)
    $conn= mysqli_connect("localhost","suhyun2963","ksh296300!","suhyun2963");   //DB주소(localhost- 본인컴퓨터의 특수도메인주소), DB접속아이디, DB접속패스워드, DB파일명 

    // 2. 한글깨짐 방지(MySQL의 기본 문자인코딩 방식이 utf-8 이 아님 -> utf-8로 바꿔주기)
    mysqli_query($conn, "set names utf8");

    // $message 변수안에 특수문자 ('작은따옴표')같은것이 있으면 문자열종료로 보고 잘못처리함- ex; I'm Robin
    // 특수문자 앞에 자동으로 역슬래시를 표시해주는 메소드가 존재함
    $message= addslashes($message);

    // 3. 저장할 데이터를 SQL언어를 이용하여 DB에 저장
    $sql="INSERT INTO board(name,msg,file,date) VALUES('$name','$message','$dstName','$now')";
    $result= mysqli_query($conn, $sql);
    if($result){
        echo "insert success";
    }else{
        echo "insert fail";
    }

    // 4. DB연결 종료
    mysqli_close($conn);


?>