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
                    print("ユーザ名は半角英数字２字以上２０字以下で入力してください。");
                }else if(!preg_match('/^[0-9a-zA-Z]{8,30}$/', $user_pass)){
                    print("パスワードは半角英数字８字以上３０字以下で入力してください。");
                }else{

                    $decision = Duplication_Check($user_id, $user_pass);

                    if($decision){

                        $db = GetDB();
                        Insert_User($user_name, $user_id, $user_pass);
                        header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'Registration_Completion.php');
                    }

                }

            }else if(empty($_POST['userid']) && empty($_POST['userpass'])){
                echo('ユーザ名とパスワードを入力してください。');

            }else if(empty($_POST['userid'])){
                echo('ユーザ名を入力してください。');
            }else{
                echo('パスワードを入力してください。');
            }
        }
    }

    $smarty -> display("Registration.tpl");