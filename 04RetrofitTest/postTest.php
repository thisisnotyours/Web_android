<?php

    header('Content-Type:allpication/json; charset=utf-8');

    //@Body로 보내진 json 문자열 데이터는 @_POST라는 배열변수에 곧바로 들어오지 않음 
    //$name= $_POST['name'];

    //JSON문자열로 넘어온 데이터들을 연관배열인 $_POST에 대입시키키
    $data= file_get_contents('php://input');    // file_get_contents(); 파일을 읽어와 -php문서의 stream 같은것임?
    $_POST= json_decode($data, true);    //json_decode: json을 연관배열로 만들기- 연관 Associate (true:연관배열로 만들지 여부)

    $name= $_POST['name'];
    $msg= $_POST['msg'];

    //echo할 데이터 연관배열로
    $arr= array();
    $arr['name']= $name;
    $arr['msg']= $msg;

    echo json_encode($arr); //연관배열 -> json 문자열로

?>