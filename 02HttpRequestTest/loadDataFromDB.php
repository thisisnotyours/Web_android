<?php

header('Content-Type:text/html; charset=utf-8');   //한글깨짐방지

//MySQL DB에 접속하기
$conn= mysqli_connect("localhost","suhyun2963","ksh296300!","suhyun2963");

//한글깨짐방지
mysqli_query($conn, "set names utf8");

//board 테이블에서 데이터들을 모두 읽어오는 쿼리문 (DB 명령문- query 문법)
$sql= "SELECT * FROM board";    //board 안에 있는 데이터 다 가져오기
$result= mysqli_query($conn, $sql);
//$reuslt는 쿼리의 결과표 객체

//결과표($result)에 있는 총 레코드(Row) 수
$row_num= mysqli_num_rows($result);

//여러줄의 데이터가 있을 수 있으므로
for($i=0; $i<$row_num; $i++){
    //한줄(row : record- 데이터를 표현하는 단위)을 가져오기
    $row= mysqli_fetch_array($result, MYSQLI_ASSOC);   //한줄의 데이터들을 배열로 리턴  
    //MYSQLI_NUM : 인덱스배열  (0,1,2...)
    //MYSQLI_ASSOC : 연관배열 ("aa","bb","cc"...) 
    //배열의 방 구별 이름이 DB테이블의 컬룸(칸)이름과 같게 만들어짐.
    echo $row['no'] . "<br>";
    echo "<h4>" . $row['name'] . "</h4>";
    echo $row['msg'] . "<br>";
    echo "<img src='" . $row['file'] . "'> <br>";
    echo $row['date'] . "<br>";
    echo "=====================<br>";
}

mysqli_close($conn);

?>