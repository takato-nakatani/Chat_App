<?php
    function insert_friends_data($login_user_id, $friends_user_id){   //誰かと誰かが友達になった際に友達のデータを挿入
        $db = GetDb();
        $statement = 'INSERT INTO friends_info(login_user_id, friends_user_id) VALUES(?, ?);';
        $db -> beginTransaction();
        $ins = $db -> prepare($statement);
        $ins -> bindValue('1', $login_user_id, PDO::PARAM_INT);
        $ins -> bindvalue('2', $friends_user_id, PDO::PARAM_INT);
        $ins -> execute();
        $db -> commit();
    }

    //friends_infoにすでに友達のデータが入っていたら、取り出す
    function select_friends_info($cols, $where){
        $db = GetDb();
        $statement = 'SELECT '.$cols.' FROM friends_info WHERE '.$where.';';
        $sel = $db->prepare($statement);
        $sel->execute();
        $ResultSet = $sel->fetchAll(PDO::FETCH_ASSOC);
        if (!(empty($ResultSet))) {
            foreach ($ResultSet as $data) {
                return $data;
            }
        }
        return array(array());
    }

    //ログインしているユーザの友達のリストと、その友達の情報を取得
    function select_friends_list($login_user_id){
        $db = GetDb();
        $statement = 'SELECT friends_info.id, login_user_id, friends_user_id, name FROM friends_info INNER JOIN account_info ON friends_user_id = account_info.id WHERE login_user_id = ?;';
        $sel = $db->prepare($statement);
        $sel->bindValue(1, $login_user_id, PDO::PARAM_INT);
        $sel->execute();
        $ResultSet = $sel->fetchAll(PDO::FETCH_ASSOC);
        if (!(empty($ResultSet))) {
            return $ResultSet;
        }
        return array(array());
    }

    function insert_chat_data($pair_id, $sender_id, $receiver_id, $contents){
        $db = GetDb();
        $statement = 'INSERT INTO chat_info(pair_id, sender_id, receiver_id, contents, time) VALUES(?, ?, ?, ?, ?);';
        $datetime = new DateTime();
        $db -> beginTransaction();
        $time = $datetime -> format('Y年m月d日 H:i:s');
        $ins = $db -> prepare($statement);
        $ins -> bindValue('1', $pair_id, PDO::PARAM_INT);
        $ins -> bindvalue('2', $sender_id, PDO::PARAM_INT);
        $ins -> bindValue('3', $receiver_id, PDO::PARAM_INT);
        $ins -> bindvalue('4', $contents, PDO::PARAM_STR);
        $ins -> bindvalue('5', $time, PDO::PARAM_STR);
        $ins -> execute();
        $db -> commit();
    }

    function select_chat_data($arr_pair_id){
        $db = GetDb();
        $statement = 'SELECT chat_info.*, name FROM chat_info INNER JOIN account_info ON receiver_id = account_info.id WHERE pair_id = ? OR pair_id = ? ORDER BY time;';
        $db -> beginTransaction();
        $sel = $db -> prepare($statement);
        $sel -> bindValue('1', $arr_pair_id[0], PDO::PARAM_INT);
        $sel -> bindValue('2', $arr_pair_id[1], PDO::PARAM_INT);
        $sel->execute();
        $ResultSet = $sel->fetchAll(PDO::FETCH_ASSOC);
        if (!(empty($ResultSet))) {
            return $ResultSet;
        }
        return array(array());
    }

    function delete_chat($content_id){
        $db = GetDb();
        $statement = 'DELETE FROM chat_info WHERE id = ?;';
        $upd = $db -> prepare($statement);
        $upd -> bindvalue('1', $content_id, PDO::PARAM_INT);
        $upd -> execute();
    }