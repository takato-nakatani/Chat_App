<?php
    session_start();
    require_once './DB_Operation/UserDB.php';
    require_once './DB_Operation/RequestsDB.php';
    require_once './DB_Operation/FriendsDB.php';
    require(dirname(__FILE__).'/libs/Smarty.class.php');

    $smarty = new Smarty();
    $smarty -> template_dir = dirname(__FILE__).'/Chat_Tmp/';
    $smarty -> compile_dir = dirname(__FILE__).'/Chat_Tmp_c/';


    //ここから下メソッド化できそう
    $LoginUserId = $_SESSION['id'];         //ユーザのid
    $LoginUserData = array();
    $LoginUserData = Select_LogedIn_User_Data($LoginUserId);        //ユーザidからログインしているユーザの名前を取得
    $user_id = $LoginUserData['id'];
    $user_name = $LoginUserData['account_id'];
    $smarty -> assign("name" ,$user_name);
    $smarty -> assign('login_user', $user_id);
    $cnt = 0;
    $smarty -> assign('cnt', $cnt);

    $friend_name = $_SESSION['friend_name'];
    $chat_id = $_SESSION['chat_id'];
    //チャット相手のデータ取得
    $friend_info = select_friends_info("*","id = {$chat_id}");
    $friend_account_data = Select_LogedIn_User_Data($friend_info["friends_user_id"]);
    $smarty -> assign('friend_account_data', $friend_account_data);


    //sender_id = 自分、friends_id = 相手のpair_idと、sender_id = 相手、friends_id = 自分のpair_idを配列に格納
    $arr_pair_id = array();
    $arr_pair_id[] = $chat_id;
    //sender_id = 相手、friends_id = 自分のpair_idを取得し、配列の後ろに格納
    $arr_pair_id[] = select_friends_info("id","login_user_id = {$friend_info["friends_user_id"]} AND friends_user_id = {$friend_info["login_user_id"]}")['id'];
    //ログインユーザと、チャット友達のチャット情報をchat_infoテーブルから取得
    $chat_data = select_chat_data($arr_pair_id);
    $smarty -> assign('chat_data', $chat_data);

    //送信ボタンが押されたときにチャットの内容を取得し、chat_infoテーブルに挿入
    if(isset($_POST["chat_send_button"])){
        if(mb_strlen($_POST['chat_input']) > 300){
        }else{
            $Postcontents = e($_POST['chat_input']);
            insert_chat_data($chat_id, $user_id, $friend_info['friends_user_id'], $Postcontents);
            header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'Chat_Room.php');
        }
    }

    for ($i = 0; $i < count($chat_data); $i++){
        if(isset($_POST["delete_button{$i}"])){   //どのボタンが押されたか
            $content_id = $_POST["friends_pair_id{$i}"];  //押されたボタンと投稿文のidを紐づけたhiddenから投稿文のidを取得
            delete_chat($content_id);   //投稿文を削除する関数
            header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'Chat_Room.php');
        }
    }
    $smarty -> display("Chat_Room.tpl");