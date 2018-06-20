<?php
    //----------　マイページ　----------


    session_start();
    require_once 'UserManager.php';
    require_once 'PostManager.php';
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


    if(isset($_POST['Logoutbutton'])){  //ログアウトボタンが押されたときの処理
        session_destroy();      //保持していたユーザidを破棄
        header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'/Login.php');
    }

    if(isset($_POST['homebutton'])){   //ホームボタンが押されたときの処理
        header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'/Keiziban3.php');
    }

//    $fetchAll = Select_Inner_Join($LoginUserId);  // 内部結合した結果セットを取得する関数。
    $fetchAll = Select_contribution();
    $cnt = 1;  //ボタンの個別番号
    $smarty -> assign('cnt', $cnt);
    $smarty -> assign('login_user_id', $LoginUserId);
    $smarty -> assign('fetchAll', $fetchAll);


    for ($i = 1; $i < count($fetchAll[0]); $i++){    //投稿文の数だけfor文でループ
        if(isset($_POST["editbutton{$i}"])){   //どのボタンが押されたか
            $contents_id = $_POST["contents_id{$i}"];  //押されたボタンのhiddenから投稿文のidを取得
            editbutton($contents_id);   //投稿文のidをセッションで保持して編集画面へ移動する関数
        }
    }


    for ($i = 1; $i < count($fetchAll[0]); $i++){
        if(isset($_POST["deletebutton{$i}"])){   //どのボタンが押されたか
            $contents_id = $_POST["contents_id{$i}"];  //押されたボタンと投稿文のidを紐づけたhiddenから投稿文のidを取得
            Delete_Contribution($contents_id);   //投稿文を削除する関数
            header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'/MyContribution.php');
        }
    }

    if(isset($_POST['contributionbutton'])){
        if(isset($_POST['contribution'])){
            if(!(empty($_POST['contribution']))){
                $PostContribution = $_POST['contribution'];
                if(mb_strlen($PostContribution) > 100){
                    print('100字以内で入力してください。');
                }else{
                    insert_contribution($PostContribution, $user_id);
                    header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'/MyContribution.php');
                }
            }else{
                echo("投稿文を入力してください。");
                echo nl2br("\n\n\n");
            }
        }
    }




    $smarty -> display("MyPage.tpl");