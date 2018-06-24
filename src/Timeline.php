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
    $LoginUserData = Select_LogedIn_User_Data($LoginUserId);        //ユーザidからログインしているユーザの名前を取得
    $user_id = $LoginUserData['id'];
    $user_name = $LoginUserData['account_id'];

    $smarty -> assign("name" ,$user_name);

    $friends_contribution = Select_contribution($user_id);

    $cnt = 1;  //ボタンの個別番号
    $smarty -> assign('cnt', $cnt);
    $smarty -> assign('login_user_id', $LoginUserId);
    $smarty -> assign('friends_contribution', $friends_contribution);

    if($friends_contribution != null){
        for ($i = 1; $i < count($friends_contribution[0]); $i++){    //投稿文の数だけfor文でループ
            if(isset($_POST["editbutton{$i}"])){   //どのボタンが押されたか
                $contents_id = $_POST["contents_id{$i}"];  //押されたボタンのhiddenから投稿文のidを取得
                editbutton($contents_id);   //投稿文のidをセッションで保持して編集画面へ移動する関数
            }
        }

        for ($i = 1; $i < count($friends_contribution[0]); $i++){
            if(isset($_POST["deletebutton{$i}"])){   //どのボタンが押されたか
                $contents_id = $_POST["contents_id{$i}"];  //押されたボタンと投稿文のidを紐づけたhiddenから投稿文のidを取得
                Delete_Contribution($contents_id);   //投稿文を削除する関数
                header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'Timeline.php');
            }
        }
    }

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




    $smarty -> display("Timeline.tpl");