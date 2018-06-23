<?php
    session_start();
    require_once 'UserDB.php';
    require_once 'RequestsDB.php';
    require_once 'FriendsDB.php';
    require_once 'Encode.php';
    require(dirname(__FILE__).'/libs/Smarty.class.php');

    $smarty = new Smarty();
    $smarty -> template_dir = dirname(__FILE__).'/KeizibanTmp/';
    $smarty -> compile_dir = dirname(__FILE__).'/KeizibanTmp_c/';


    //ここから下メソッド化できそう
    $LoginUserId = $_SESSION['id'];         //ユーザのid
    $LoginUserData = array();
    $LoginUserData = Select_LogedIn_User_Data($LoginUserId);        //ユーザidからログインしているユーザの名前を取得
    $user_id = $LoginUserData['id'];
    $user_name = $LoginUserData['account_id'];
    $smarty -> assign("name" ,$user_name);
    $cnt = 0;
    $smarty -> assign('cnt', $cnt);

    $friends_list = select_friends_list($user_id);
    $smarty -> assign("friends_list" , $friends_list);

    for ($i = 0; $i < count($friends_list); $i++) {
        if (isset($_POST["chat_button{$i}"])){
            $_SESSION['chat_id'] = $_POST["friend_pair_id{$i}"];
            $_SESSION['friend_name'] = $_POST["friend_name{$i}"];
            header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'Chat_Room.php');
        }
    }

    $smarty -> display("Chat_List.tpl");