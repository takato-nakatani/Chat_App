<?php
    //----------　ログイン画面　----------

    session_start();
    require_once 'DbManager3.php';
    require_once 'Encode.php';
    require_once 'UserDB.php';
    require(dirname(__FILE__).'/libs/Smarty.class.php');

    $smarty = new Smarty();
    $smarty -> template_dir = dirname(__FILE__).'/KeizibanTmp/';
    $smarty -> compile_dir = dirname(__FILE__).'/KeizibanTmp_c/';

    if(isset($_POST['Loginbutton'])){

        if(isset($_POST['Loginname']) && isset($_POST['Loginpass'])){

            if(!(empty($_POST['Loginname']) || empty($_POST['Loginpass']))){

                $LoginName = $_POST['Loginname'];
                $LoginPass = $_POST['Loginpass'];
                if(!preg_match('/^[0-9a-zA-Z]{2,20}$/', $LoginName)) {
                    print("ユーザ名は半角英数字２字以上２０字以下で入力してください。");
                }else if(!preg_match('/^[0-9a-zA-Z]{8,30}$/', $LoginPass)){
                    print("パスワードは半角英数字８字以上３０字以下で入力してください。");
                }else {
                    $decision = Login_Certification($LoginName, $LoginPass);  //ログインの認証

                    if ($decision) {
                        header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'My_Page.php');
                    } else {
                        echo('ユーザ名またはパスワードが間違っています。');
                    }
                }
            }else if(empty($_POST['Loginname']) && empty($_POST['Loginpass'])){
                echo('ユーザ名とパスワードを入力してください。');
            }else if(empty($_POST['Loginname'])){
                echo('ユーザ名を入力してください。');
            }else{
                echo('パスワードを入力してください。');
            }
        }
    }
    $smarty -> display("Login.tpl");