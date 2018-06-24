<?php
    session_start();
    require_once 'UserDB.php';
    require_once 'RequestsDB.php';
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
    $cnt = 0;
    $searched_user_data = search_user_id($_POST['input_friends_id'], $user_id);
    $user_requests = select_user_request($user_id);

    //検索ボタンが押されたときの処理
    if(isset($_POST['search_button'])){
        $cnt++;
        if($searched_user_data != null){
            foreach ($searched_user_data as $request_data){
                $requested_info = select_request_info($request_data['id'], $user_id);   //自分が検索対象のユーザにリクエストされていたら、そのリクエストデータを取得。
                if($requested_info['friends_request_flg'] != 1) {                     //自分が検索対象のユーザにリクエストをされているかどうか。
                    foreach ($searched_user_data as $requested_data){
                        $request_info = select_request_info($user_id, $requested_data['id']);    //自分が検索対象のユーザにリクエストを送っていれば、そのリクエストデータを取得
                        if($request_info['friends_request_flg'] != 1){                        //自分が検索対象のユーザにリクエストを送っているかどうか
                            var_dump($searched_user_data);
                            $smarty -> assign("searched_user_data", $searched_user_data[0]);
                            $smarty -> assign("request_info", $requested_info);
                            $smarty -> assign("requested_info", $request_info);
                            $smarty -> assign("button_pushed", isset($_POST['search_button']));
                        }
                    }
                }
            }
        }
    }


    if(isset($_POST['request_button'])){  //友達申請ボタンが押されたときの処理
        $requested_user_account_id = $_POST['requested_user_id'];
        insert_friends_request($LoginUserId, $requested_user_account_id, 1);
        header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'Request_Completion.php');
    }

    if(isset($_POST['Logoutbutton'])){  //ログアウトボタンが押されたときの処理
        session_destroy();      //保持していたユーザidを破棄
        header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'Login.php');
    }

    $smarty -> assign('cnt', $cnt);
    Delete_depulication('request_info', 'user_request, user_requested');
    $smarty -> display("Friends_Search.tpl");