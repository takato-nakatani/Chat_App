<?php
    //----------　掲示板のホーム画面(投稿したり、みんなの投稿を見たりすることができるページ)　----------



    session_start();
    require_once 'UserManager.php';
    require_once 'PostManager.php';
    require(dirname(__FILE__).'/libs/Smarty.class.php');


    $smarty = new Smarty();
    $smarty -> template_dir = dirname(__FILE__).'/KeizibanTmp/';
    $smarty -> compile_dir = dirname(__FILE__).'/KeizibanTmp_c/';

    $LoginUserId = $_SESSION['id'];
    $LoginUserData = array();
    $LoginUserData = Select_LogedIn_User_Data($LoginUserId);
    $user_id = $LoginUserData['id'];
    $user_name = $LoginUserData['name'];

    $smarty -> assign("name" ,$user_name);
    $smarty -> display("Keiziban3.tpl");



    if(isset($_POST['contributionbutton'])){
        if(isset($_POST['contribution'])){
            if(!(empty($_POST['contribution']))){

                $PostContribution = $_POST['contribution'];
                if(mb_strlen($PostContribution) > 100){
                    print('100字以内で入力してください。');
                }else{
                    insert_contribution($PostContribution, $user_id);
                }


            }else{
                echo("投稿文を入力してください。");
                echo nl2br("\n\n\n");
            }
        }
    }

    if(isset($_POST['Logoutbutton'])){
        session_destroy();
        header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'/Login.php');
    }


    Display_Contribution();

