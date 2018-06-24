<?php
    //----------　ログイン画面　----------

    session_start();
    require_once './DB_Operation/DB_Manager.php';
    require_once 'Encode.php';
    require_once './DB_Operation/UserDB.php';
    require(dirname(__FILE__).'/libs/Smarty.class.php');

    $smarty = new Smarty();
    $smarty -> template_dir = dirname(__FILE__).'/Chat_Tmp/';
    $smarty -> compile_dir = dirname(__FILE__).'/Chat_Tmp_c/';

    if(isset($_POST['Loginbutton'])){

        if(isset($_POST['Loginname']) && isset($_POST['Loginpass'])){

            if(!(empty($_POST['Loginname']) || empty($_POST['Loginpass']))){

                $LoginName = $_POST['Loginname'];
                $LoginPass = $_POST['Loginpass'];
                if(!preg_match('/^[0-9a-zA-Z]{2,20}$/', $LoginName)) {
                    $error_msg_preg_match = "ユーザ名は半角英数字２字以上２０字以下で入力してください。";
                    $smarty -> assign('error_msg_preg_match', $error_msg_preg_match);
                }else if(!preg_match('/^[0-9a-zA-Z]{8,30}$/', $LoginPass)){
                    $error_msg_preg_match = "パスワードは半角英数字８字以上３０字以下で入力してください。";
                    $smarty -> assign('error_msg_preg_match', $error_msg_preg_match);
                }else {
                    $decision = Login_Certification($LoginName, $LoginPass);  //ログインの認証

                    if ($decision) {
                        header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'Timeline.php');
                    } else {
                        $input_error_msg = 'ユーザ名またはパスワードが間違っています。';
                        $smarty -> assign('input_error_msg', $input_error_msg);
                    }
                }
            }else if(empty($_POST['Loginname']) && empty($_POST['Loginpass'])){
                $error_msg = 'ユーザ名とパスワードを入力してください。';
                $smarty -> assign('error_msg', $error_msg);
            }else if(empty($_POST['Loginname'])){
                $error_msg = 'ユーザ名を入力してください。';
                $smarty -> assign('error_msg', $error_msg);
            }else{
                $error_msg = 'パスワードを入力してください。';
                $smarty -> assign('error_msg', $error_msg);
            }
        }
    }
    $smarty -> display("Login.tpl");