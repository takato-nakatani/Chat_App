<?php
    //----------　掲示板のホーム画面(投稿したり、みんなの投稿を見たりすることができるページ)　----------



    session_start();
    require_once './DB_Operation/UserDB.php';
    require_once './DB_Operation/PostDB.php';
    require(dirname(__FILE__).'/libs/Smarty.class.php');


    $smarty = new Smarty();
    $smarty -> template_dir = dirname(__FILE__).'/Chat_Tmp/';
    $smarty -> compile_dir = dirname(__FILE__).'/Chat_Tmp_c/';

    $LoginUserId = $_SESSION['id'];
    $LoginUserData = array();
    $LoginUserData = Select_LogedIn_User_Data($LoginUserId);
    $user_id = $LoginUserData['id'];
    $user_name = $LoginUserData['account_id'];

    $smarty -> assign("name" ,$user_name);
    $smarty -> display("My_Page.tpl");

    if(isset($_POST['Logoutbutton'])){
        session_destroy();
        header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'Login.php');
    }


