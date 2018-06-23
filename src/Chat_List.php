<?php
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

    //検索ボタンが押されたときの処理
    if(isset($_POST['search_button'])){
        $searched_user_data = search_user_id($_POST['input_friends_id'], $user_id);
        $request_info = select_request_info($searched_user_data[0]['user_request'], $searched_user_data[0]['user_requested']);
        $requested_info = select_request_info($searched_user_data[0]['user_requested'], $searched_user_data[0]['user_request']);
        $smarty -> assign("searched_user_data", $searched_user_data);
        $smarty -> assign("request_info", $request_info);
        $smarty -> assign("requested_info", $request_info);
        $smarty -> assign("button_pushed", isset($_POST['search_button']));
        $cnt++;
    }

    if(isset($_POST['request_button'])){  //友達申請ボタンが押されたときの処理
        $requested_user_account_id = $_POST['requested_user_id'];
        insert_friends_request($LoginUserId, $requested_user_account_id, 1);
        header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'request_completion.php');
    }




    $smarty -> assign('cnt', $cnt);
    Delete_depulication('request_info', 'user_request, user_requested');
    $smarty -> display("friends_search.tpl");