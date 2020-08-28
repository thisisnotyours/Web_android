<?php

    header('Content-Type:allpication/json; charset=utf-8');

    //@Field로 보내진 데이터를 $_POST배열에 전달됨
    $name= $_POST['name'];
    $msg= $_POST['msg'];

    //echo할 데이터 연관배열로
    $arr= array();
    $arr['name']= $name;
    $arr['msg']= $msg;

    echo json_encode($arr); //연관배열 -> json 문자열로

?>