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

    if(isset($_POST['Request_Management_button'])){
        $friends_data = search_user_id($_POST['input_friends_id'], $user_id);
        $smarty -> assign("friends_data", $friends_data);
        var_dump($friends_data);
//        header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'/Friends_search.php');
    }

    if(isset($_POST['request_button'])){  //友達申請ボタンが押されたときの処理
        $requested_user_id = $_POST['requested_user_id'];
        insert_friends_request($LoginUserId, $requested_user_id);
        insert_flg('friends_info', 'friends_request_flg', 1);
        header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'/request_completion.php');
    }

    $smarty -> display("friends_search.tpl");