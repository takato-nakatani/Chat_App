<?php
    session_start();
    require_once 'UserManager.php';
    require_once 'FriendsManager.php';
    require(dirname(__FILE__).'/libs/Smarty.class.php');

    $smarty = new Smarty();
    $smarty -> template_dir = dirname(__FILE__).'/KeizibanTmp/';
    $smarty -> compile_dir = dirname(__FILE__).'/KeizibanTmp_c/';


    $LoginUserId = $_SESSION['id'];         //ユーザのid
    $LoginUserData = array();
    $LoginUserData = Select_LogedIn_User_Data($LoginUserId);        //ユーザidからログインしているユーザの名前を取得
    $user_id = $LoginUserData['id'];
    $user_name = $LoginUserData['account_id'];
    $smarty -> assign("name" ,$user_name);
    $cnt = 1;
    $smarty -> assign('cnt', $cnt);

    //自分が申請している情報を取得
    $arr_requests = select_request_user_info('user_requested', 'user_request', $user_id);
    $smarty -> assign("arr_request", $arr_requests);

    //自分が申請されているデータを取得
    $arr_requested = select_request_user_info('user_request','user_requested', $user_id);
    $smarty -> assign("arr_requested", $arr_requested);

    var_dump($arr_requested);
    var_dump($arr_requests);

    //自分が申請されているときに"承認"や"拒否"のボタンを押したとき
    for ($i = 1; $i < count($arr_requested[0]); $i++){
        if(isset($_POST["Request_Accept_button{$i}"])){
            $requester_id = $_POST["requester_id{$i}"];   //リクエスト
            Update_flg('friends_flg', 1, $LoginUserId, $requester_id);
        } else if (isset($_POST["Request_Refuse_button{$i}"])) {
            $requester_id = $_POST["requester_id{$i}"];
            Delete_request($requester_id, $user_id);
//            insert_flg('request_info', 'friends_accept_flg', $accept_flg);
        }
    }

    //自分が申請したリクエストを取り消すとき
    for ($i = 1; $i < count($arr_requests[0]); $i++){
        if(isset($_POST["Request_cancel_button{$i}"])){
            $requested_user_id = $_POST["requested_user_id{$i}"];
            Delete_request($user_id, $requested_user_id);
            header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'/Request_Management.php');
        }
    }



    $smarty -> display("Request_Management.tpl");