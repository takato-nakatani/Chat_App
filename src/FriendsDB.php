<?php
    function insert_friends_data($login_user_id, $friends_user_id){   //誰かと誰かが友達になった際に友達のデータを挿入
        try{
            $db = GetDb();
            $statement = 'INSERT INTO friends_info(login_user_id, friends_user_id) VALUES(?, ?)';
            $db -> beginTransaction();
            $ins = $db -> prepare($statement);
            $ins -> bindValue('1', $login_user_id, PDO::PARAM_INT);
            $ins -> bindvalue('2', $friends_user_id, PDO::PARAM_INT);
            $ins -> execute();
            $db -> commit();
        }catch(PDOException $e){
            $db -> rollback();
            die("INSERTエラー：{$e -> getMessage()}");
        }
    }

    //friends_infoにすでに友達のデータが入っていたら、取り出す
    function select_friends_info($login_user_id, $friends_user_id)
    {        //友達検索のID認証
        try {
            $db = GetDb();
            $statement = 'SELECT id FROM friends_info WHERE login_user_id = ? AND friends_user_id = ?';
            $sel = $db->prepare($statement);
            $sel->bindValue(1, $login_user_id, PDO::PARAM_INT);
            $sel->bindValue(2, $friends_user_id, PDO::PARAM_INT);
            $sel->execute();
            $ResultSet = $sel->fetchAll(PDO::FETCH_ASSOC);
            if (!(empty($ResultSet))) {
                return $ResultSet;
            }
            return array(array());
        } catch (PDOException $e) {
            die("SELECTエラー：{$e -> getMessage()}");
        }
    }