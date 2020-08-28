<?php

    header('Content-Type:application/json; charset=utf-8');

    $name= $_GET['name'];
    $msg= $_GET['msg'];

    //연관배열 [인덱스가 글씨로 되어있는 배열-> 키값으로]
    $arr= array();
    $arr['name']= $name;   //방번호가 글씨(키값)로 되어있음
    $arr['msg']= $msg;

    //연관배열을 json 문자열로 변환
    echo json_encode($arr);


?>