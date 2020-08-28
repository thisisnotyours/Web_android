<?php

$file= $_FILES['img'];

// 받은 파일 1개의 '정보'는 파일명, 확장자, 사이즈, 임시파일 저장경로 등 여러정보가 있기에
// $file 변수는 배열임.

$srcFilenName= $file['name'];  //업로드 된 파일의 원본파일명.확장자 [pig.png]
$fileSize= $file['size'];      //업로드 된 파일의 데이터 사이즈 : byte수
$fileType= $file['type'];      //업로드 된 파일의 MIME타입("image/png") 문자열 리턴 
$tmpFileName= $file['tmp_name'];  //업로드 된 파일이 임시로 저장된 곳에 경로 및 파일명

//임시파일로 저장된 업로드된 파일 데이터는 프로그램이 종료되면 
//소멸되므로 서버에 영구적으로 저장하기 위해서 본인이 원하는 HDD(html폴더)하드위치로 이동

//이동시킬 목적지 경로
//같은이름이 있으면 덮어쓰기 됨
//그래서 보통 업로드된 날짜를 파일명에 사용함
$fileName= date('Ymdhis') . $srcFilenName;    //"202006133125pig.png"
$dstName= './uploads/' . $filenName;   

$result= move_uploaded_file($tmpFileName, $dstName);
if($result){
    echo "uploaded success";
}else{
    echo "uploaded fail";
}

echo "<br>";
echo "$srcFilenName<br>";
echo "$fileSize<br>";
echo "$fileType<br>";
echo "$tempFileName<br>";
echo "$dstName<br>";

?>
