<?php

header('Content-Type:application/json; charset=utf-8');

$conn= mysqli_connect('localhost','suhyun2963','ksh296300!','suhyun2963');
mysqli_query($conn, "set names utf8");

$sql= "SELECT * FROM market";
$result= mysqli_query($conn, $sql);

//결과표($result)의 총 레코드 수
$row_num= mysqli_num_rows($result);

//여러줄을 읽어야 하므로 각 줄($row 배열)요소를 가질 인덱스 배열 준비
$rows= array();
for($i=0; $i<$row_num; $i++){
    $row= mysqli_fetch_array($result, MYSQLI_ASSOC);
    $rows[$i]= $row;
    
}


//2차원 배열 --> json array로 변환
echo json_encode($rows);

mysqli_close($conn);

?>