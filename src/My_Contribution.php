<?php
    //----------　自分の投稿文のページ　----------
    session_start();
    require_once 'UserDB.php';
    require_once 'PostDB.php';
    require_once 'Encode.php';
    require(dirname(__FILE__).'/libs/Smarty.class.php');
    $smarty = new Smarty();
    $smarty -> template_dir = dirname(__FILE__).'/KeizibanTmp/';
    $smarty -> compile_dir = dirname(__FILE__).'/KeizibanTmp_c/';


    $LoginUserId = $_SESSION['id'];         //ユーザのid
    $LoginUserData = array();
    $LoginUserData = Select_LogedIn_User_Data($LoginUserId);        //ユーザidからログインしているユーザの名前を取得
    $user_id = $LoginUserData['id'];
    $user_name = $LoginUserData['account_id'];
    $cnt = 1;  //ボタンの個別番号
    $smarty -> assign('cnt', $cnt);
    $smarty -> assign('login_user_id', $LoginUserId);

    $smarty -> assign("name" ,$user_name);
    $my_contribution = Select_contents("user_id", $user_id);
    $smarty -> assign("my_contribution", $my_contribution);

    //編集ボタンを押したとき
    for($i = 1; $i <= count($my_contribution) + 1; $i++){
        if(isset($_POST["editbutton{$i}"])){
            $before_edit = $_POST["contents{$i}"];
            $smarty -> assign('before_edit', $before_edit);
            $_SESSION['contents_id'] = $_POST["contents_id{$i}"];
        }
    }


    if(isset($_POST['editcompletebutton'])) {
        if(!(empty($_POST['contribution']))){
            $after_edit = $_POST['contribution'];
            if(mb_strlen($after_edit) > 100){
                print('100字以内で入力してください。');
            }else{
                    $contents_id = $_SESSION["contents_id"];
                    Update_Contribution($contents_id, $after_edit);
                    $_SESSION['contents_id'] = null;
            }
            header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'My_Contribution.php');
        }
    }

    if(isset($_POST['Logoutbutton'])){
        session_destroy();
        header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'Login.php');
    }

    $smarty -> display("My_Contribution.tpl");
