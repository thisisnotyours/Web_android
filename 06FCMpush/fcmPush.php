<?php

    header('Content-Type:text/html; charset=utf-8');
    echo "FCM push서버에 메세지를 전송합니다.";
    
    //FCM 서버에 보낼 데이터
    //1. 메세지를 받을 디바이스의 고유 토큰값 
    //2. 보낼 데이터 -원래 이 값들은 DB에 있어야함

    $tokens= array('c_9IxuZMQriXsAHefAWZho:APA91bEUiMEhATMkhUZN3EdwWEBcXoE67gfJfqLb2cQLFqpOxfTkqh6ga1NI_pOVyYAUyvn6AHwJFS-xrtB0LLTm7GUgZwr-QD7lPkyT2pIvRQ5zQYPo3SegE70mRLrSUWR5AhzcdoOR');

    //보낼 메세지
    $name= $_POST['name'];
    $msg= $_POST['msg'];

    $data= array("name"=>$name, "msg"=>$msg);

    //FCM 서버에 보낼 데이터 2종류를 다시 하나의 연관배열로
    $postData= array(
        'registration_ids'=> $tokens, 
        'data'=>$data
    );
    
    //FCM서버는 본인에게 보낼 데이터를 json으로 보내도록 되어있음.
    //위에서 만든 연관배열을 -> json 으로 변경
    $postDataJson= json_encode($postData);

    //위 데이터를 FCM에 보내려면 
    //FCM서버에 접속하는 서버 key 가 필요함
    //서버키를 Body에 보내는게 아니라 Header 정보로 보냄
    //FCM서버에 요청할때 헤더정보 설정- 배열로
    //1. 웹서버키 : FCM에 접속할 수 있는 권한 키 (프로젝트 콘솔에서 확인)
    //2. 내가 보내는 데이터가 json형식이라고 표시해야함
    $serverKey= 'AAAAC-JEx0k:APA91bFTVGOM7YFLSMep94CIfU1r605L2RMRe1EBU1nggapESob3Uu5Cn5ZJN1eUJz-l68IeSqg-qt9LBHOk47Yc6e3u1IxNy2sh7NhF-2M0GqW6xSSZPpaBGAKMwqfhcngICXsFbv0J';
    $headers= array(
        'Authorization:key=' . $serverKey,
        'Content-Type:application/json'
    );

    //curl을 통해 전송작업   --> push서버와 연결

    //CURL 초기화작업
    $ch= curl_init();

    //옵션들 설정
    //1) 요청 URL
    curl_setopt($ch, CURLOPT_URL, "https://fcm.googleapis.com/fcm/send");   //정해져있는 푸시서버 주소

    //2) 요청 결과 돌려받겠다는 설정
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //3) 위에서 설정했던 Header정보 설정
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    //4) POST메소드로 보낼 json 데이터 설정
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postDataJson);

    //실행
    $result= curl_exec($ch); echo "aaa". $result;
    if($result === false){
        echo "실패 : ". curl_error($ch);
    }

    //close
    curl_close($ch);

?>