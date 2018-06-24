<?php
    //----------　ユーザ管理に関する外部ファイル　----------


    require_once 'DB_Manager.php';

    function Insert_User($user_name, $user_id, $user_pass){      //ユーザの登録
            $connect = GetDb();
            $statement = 'INSERT INTO account_info(account_id, password, name) VALUES(?, ?, ?)';
            $connect -> beginTransaction();
            $ins = $connect -> prepare($statement);
            $ins -> bindValue('1', $user_id);
            $ins -> bindValue('2', $user_pass);
            $ins -> bindValue('3', $user_name);
            $ins -> execute();
            $connect -> commit();
    }


    function Duplication_Check($id, $pass){          //ユーザ情報の重複がないかどうか確認
            $db = GetDb();
            $statement = 'SELECT * FROM account_info WHERE account_id = ? AND password = ?';
            $sel = $db -> prepare($statement);
            $sel -> bindValue(1 , $id);
            $sel -> bindValue(2 , $pass);
            $sel -> execute();
            $ResultSet = $sel -> fetchAll(PDO::FETCH_ASSOC);
            if(!(empty($ResultSet))){
                foreach($ResultSet as $data){
                    if($data['account_id'] === $id && $data['password'] === $pass){
                        echo('このユーザ名は使用できません。');
                        return false;
                    }else{
                        return true;
                    }
                }
            }else{
                return true;
            }
    }

    function Login_Certification($id, $pass){        //ログイン認証
        $db = GetDb();
        $statement = 'SELECT * FROM account_info WHERE account_id = ? AND password = ?';
        $sel = $db -> prepare($statement);
        $sel -> bindValue(1 , $id);
        $sel -> bindValue(2 , $pass);
        $sel -> execute();

        $ResultSet = $sel -> fetchAll(PDO::FETCH_ASSOC);
        if(!(empty($ResultSet))){
            foreach($ResultSet as $data){

                if($data['account_id'] === $id && $data['password'] === $pass){
                    $_SESSION['id'] = $data['id'];
                    return true;
                }else{
                    return false;
                }
            }
        }
            return false;
    }


    function Select_User_Data($user_id){       //ユーザidからユーザの情報を取得
            $db = GetDb();
            $statement = 'SELECT * FROM account_info WHERE id = ?';
            $sel = $db -> prepare($statement);
            $sel -> bindValue(1 , $user_id);
            $sel -> execute();
            $ResultSet = $sel -> fetchAll(PDO::FETCH_ASSOC);
            $user_data = array();
            foreach($ResultSet as $data){
                $user_data = $data;
                }
            return $user_data;
    }
