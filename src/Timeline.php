<?php
    //----------　マイページ　----------


    session_start();
    require_once './DB_Operation/UserDB.php';
    require_once './DB_Operation/PostDB.php';
    require_once 'Encode.php';
    require(dirname(__FILE__).'/libs/Smarty.class.php');
    $smarty = new Smarty();
    $smarty -> template_dir = dirname(__FILE__).'/Chat_Tmp/';
    $smarty -> compile_dir = dirname(__FILE__).'/Chat_Tmp_c/';


    $LoginUserId = $_SESSION['id'];         //ユーザのid
    $LoginUserData = array();
    $LoginUserData = Select_User_Data($LoginUserId);        //ユーザidからログインしているユーザの名前を取得
    $user_id = $LoginUserData['id'];
    $user_name = $LoginUserData['account_id'];

    $smarty -> assign("name" ,$user_name);

    $friends_contribution = Select_contribution($user_id);
    $friends_data = Select_User_Data($friends_contribution[0]['friends_user_id']);
    $smarty -> assign('friends_data', $friends_data);

    $cnt = 1;  //ボタンの個別番号
    $smarty -> assign('cnt', $cnt);
    $smarty -> assign('login_user_id', $LoginUserId);
    $smarty -> assign('friends_contribution', $friends_contribution);

    if(isset($_POST['contributionbutton'])){
        if(isset($_POST['contribution'])){
            if(!(empty($_POST['contribution']))){
                if(mb_strlen($_POST['contribution']) > 100){
                    print('100字以内で入力してください。');
                }else{
                    $PostContribution = e($_POST['contribution']);
                    insert_contribution($PostContribution, $user_id);
                    header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'Timeline.php');
                }
            }else{
                echo("投稿文を入力してください。");
                echo nl2br("\n\n\n");
            }
        }
    }


   if(isset($_POST['Logoutbutton'])){  //ログアウトボタンが押されたときの処理
        session_destroy();      //保持していたユーザidを破棄
        header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'Login.php');
   }




    $smarty -> display("Timeline.tpl");