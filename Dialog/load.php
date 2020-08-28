<?php

    header('Content-Type:text/plain; charset=utf-8');

    //$date= $_GET['date'];

    $conn= mysqli_connect('localhost','suhyun2963','ksh296300!','suhyun2963');
    mysqli_query($conn, "set names utf8");

    $sql= "SELECT * FROM Dialog WHERE date='$date'";    //DB에 있는 date콜럼의 데이터만 가져와
    $result= mysqli_query($conn, $sql);                //$conn(닷홈사이트)와 $sql(DB)를 연결하여 query문으로 가져온 결과

    $row_num= mysqli_num_rows($result);         //$row_num -DB콜럼의 row의 개수= $result 결과에있는 총 레코드 수

    $rows= array();                             //여러줄의 데이터가 있을 수 있으므로
    for($i=0; $i<$row_num; $i++){               //한줄(row : record- 데이터를 표현하는 단위)을 가져오기
        $row= mysqli_fetch_array($result, MYSQLI_ASSOC); //한줄의 데이터들을 배열로 리턴
        $rows[$i]= $row;                                 //MYSQLI_NUM : 인덱스배열  (0,1,2...)
                                                         //MYSQLI_ASSOC : 연관배열 ("aa","bb","cc"...) 
    }

    echo json_encode($rows);
    mysqli_close($conn);

?>