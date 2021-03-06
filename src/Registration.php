<?php
    //----------　新規登録画面　----------

    require_once './DB_Operation/DB_Manager.php';
    require_once 'Encode.php';
    require_once './DB_Operation/UserDB.php';
    require(dirname(__FILE__).'/libs/Smarty.class.php');

    $smarty = new Smarty();
    $smarty -> template_dir = dirname(__FILE__).'/Chat_Tmp/';
    $smarty -> compile_dir = dirname(__FILE__).'/Chat_Tmp_c/';

    if(isset($_POST['Registrationbutton'])){
        if(isset($_POST['userid']) && isset($_POST['userpass'])){
            if(!(empty($_POST['userid']) || empty($_POST['userpass']))){

                $user_name = $_POST['username'];
                $user_id = $_POST['userid'];
                $user_pass = $_POST['userpass'];

                if(!preg_match('/^[0-9a-zA-Z]{2,20}$/', $user_id)) {
                    $error_msg_preg_match = "ユーザ名は半角英数字２字以上２０字以下で入力してください。";
                    $smarty -> assign('error_msg_preg_match', $error_msg_preg_match);
                }else if(!preg_match('/^[0-9a-zA-Z]{8,30}$/', $user_pass)){
                    $error_msg_preg_match = "パスワードは半角英数字８字以上３０字以下で入力してください。";
                    $smarty -> assign('error_msg_preg_match', $error_msg_preg_match);
                }else{
                    $decision = Duplication_Check($user_id, $user_pass);
                    if($decision){
                        $db = GetDB();
                        Insert_User($user_name, $user_id, $user_pass);
                        header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'Registration_Completion.php');
                    }

                }

            }else if(empty($_POST['userid']) && empty($_POST['userpass'])){
                $error_msg = 'ユーザ名とパスワードを入力してください。';
                $smarty -> assign('error_msg', $error_msg);
            }else if(empty($_POST['userid'])){
                $error_msg = 'ユーザ名を入力してください。';
                $smarty -> assign('error_msg', $error_msg);
            }else{
                $error_msg = 'パスワードを入力してください。';
                $smarty -> assign('error_msg', $error_msg);
            }
        }
    }


    $smarty -> display("Registration.tpl");