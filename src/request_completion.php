<?php
//    <!--　友達申請の完了画面　-->
    session_start();
    require(dirname(__FILE__).'/libs/Smarty.class.php');

    $smarty = new Smarty();
    $smarty -> template_dir = dirname(__FILE__).'/Chat_Tmp/';
    $smarty -> compile_dir = dirname(__FILE__).'/Chat_Tmp_c/';

    if(isset($_POST['backtomypage'])){
        $_SESSION['contents'] = NULL;
        header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'Timeline.php');
    }
    $smarty -> display("Request_Completion.tpl");