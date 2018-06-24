<?php
    session_start();
    require_once './DB_Operation/UserDB.php';
    require_once './DB_Operation/RequestsDB.php';
    require_once './DB_Operation/FriendsDB.php';
    require_once 'Encode.php';
    require(dirname(__FILE__).'/libs/Smarty.class.php');

    $smarty = new Smarty();
    $smarty -> template_dir = dirname(__FILE__).'/Chat_Tmp/';
    $smarty -> compile_dir = dirname(__FILE__).'/Chat_Tmp_c/';

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

    //友達の名前が押されたときに実行
    for ($i = 0; $i < count($friends_list); $i++) {
        if (isset($_POST["chat_button{$i}"])){
            $_SESSION['chat_id'] = $_POST["friend_pair_id{$i}"];
            $_SESSION['friend_name'] = $_POST["friend_name{$i}"];
            header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'Chat_Room.php');
        }
    }
    $smarty -> display("Chat_List.tpl");