<?php
    //----------　投稿文管理に関する外部ファイル　----------

    require_once 'DbManager3.php';
    require_once 'Encode.php';


    function insert_contribution($contents, $user_id){   //投稿文の投稿時に利用
        try{

            $db = GetDb();
            $statement = 'INSERT INTO timeline_info(contents, user_id, time) VALUES(?, ?, ?)';
            $datetime = new DateTime();
            $db -> beginTransaction();
            $time = $datetime -> format('Y年m月d日 H:i:s');
            $ins = $db -> prepare($statement);
            $ins -> bindValue('1', $contents);
            $ins -> bindvalue('2', $user_id);
            $ins -> bindvalue('3', $time);
            $ins -> execute();
            $db -> commit();
        }catch(PDOException $e){
            $db -> rollback();
            die("INSERTエラー：{$e -> getMessage()}");
        }
    }

    function Update_Contribution($contents_id, $contents){  //編集ボタンの際に利用
        try{
            $db = GetDb();
            $statement = 'UPDATE timeline_info SET contents = ? WHERE id = ? ';
            $db -> beginTransaction();
            $upd = $db -> prepare($statement);
            $upd -> bindvalue('1', $contents);
            $upd -> bindvalue('2', $contents_id);
            $upd -> execute();
            $db -> commit();
        }catch(PDOException $e){
            $db -> rollback();
            die("UPDATEエラー：{$e -> getMessage()}");
        }
    }

    function Delete_Contribution($contents_id){  //削除ボタンの際に利用
        try{
            $db = GetDb();
            $statement = 'DELETE FROM timeline_info WHERE id = ? ';
            $db -> beginTransaction();
            $del = $db -> prepare($statement);
            $del -> bindValue('1', $contents_id);
            $del -> execute();
            $db -> commit();
        }catch(PDOException $e){
            $db -> rollback();
            die("DELETEエラー：{$e -> getMessage()}");
        }
    }

function Select_contribution($user_id){  //自分以外の投稿文を取得
    try{
        $db = GetDb();
        $statement = 'SELECT timeline_info.id, contents, user_id, time, friends_user_id FROM timeline_info INNER JOIN friends_info ON user_id = friends_user_id AND ? = login_user_id;';
        $sel = $db -> prepare($statement);
        $sel -> bindValue(1 , $user_id, PDO::PARAM_INT);
        $sel -> execute();
        $fetchAll = $sel -> fetchAll(PDO::FETCH_ASSOC);
        if(!empty($fetchAll)){
            return $fetchAll;
        }
        return null;
    }catch(PDOException $e){
        die("エラーメッセージ：{$e -> getMessage()}");
    }
}


    function editbutton($contents_id){  //マイページで編集ボタンが押された際に実行される
        $_SESSION['contents'] = $contents_id;
        header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'My_Contribution.php');
    }

    function Select_contents($where_cols, $where_value){  //投稿文の情報から投稿文を取得
        try{
            $db = GetDb();
            $statement = 'SELECT * FROM timeline_info WHERE '.$where_cols.' = ?;';
            $sel = $db -> prepare($statement);
//            $sel -> bindValue(1 , $where_cols, PDO::PARAM_STR);
            $sel -> bindValue(1 , $where_value, PDO::PARAM_INT);
            $sel -> execute();

            $ResultSet = $sel -> fetchAll(PDO::FETCH_ASSOC);
            return $ResultSet;


        }catch(PDOException $e){
            die("エラー：{$e -> getMessage()}");
        }
    }
