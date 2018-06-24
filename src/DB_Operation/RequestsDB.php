
<?php
    //友達管理のためのDB操作を行うファイル
    require_once 'DB_Manager.php';
    require_once 'Encode.php';


    function insert_flg($table, $flg, $value){   //誰かが友達申請した場合に使用
        $db = GetDb();
        $statement = 'INSERT INTO '.$table.'('.$flg.')' .'VALUES('.$value.')';
        $db -> beginTransaction();
        $ins = $db -> prepare($statement);
        $ins -> execute();
        $db -> commit();
    }

    function Update_flg($flg_name, $value, $user_request, $user_requested){
        $db = GetDb();
        $statement = 'UPDATE request_info SET '.$flg_name.' = ? WHERE user_request = ? AND user_requested = ?';
        $db -> beginTransaction();
        $upd = $db -> prepare($statement);
        $upd -> bindvalue('1', $value, PDO::PARAM_INT);
        $upd -> bindvalue('2', $user_request,PDO::PARAM_INT);
        $upd -> bindvalue('3', $user_requested,PDO::PARAM_INT);
        $upd -> execute();
        $db -> commit();
    }

    //申請を取り消した際にそのレコードを削除
    function Delete_request($request_user_id, $requested_user_id){
        $db = GetDb();
        $statement = 'DELETE FROM request_info WHERE user_request = ? AND user_requested = ?;';
        $upd = $db -> prepare($statement);
        $upd -> bindvalue('1', $request_user_id, PDO::PARAM_INT);
        $upd -> bindvalue('2', $requested_user_id,PDO::PARAM_INT);
        $upd -> execute();
    }

    function Delete_depulication($table, $cols){  //重複データを削除
        $db = GetDb();
        $statement = 'DELETE FROM '.$table.' WHERE id Not In( SELECT * FROM ( SELECT Min(id) FROM '.$table.' GROUP BY '.$cols.' ) b );';
        $upd = $db -> prepare($statement);
        $upd -> execute();
    }

    function insert_friends_request($request_user_id, $requested_user_id, $request_flg){   //誰かが友達申請した場合に使用
        $db = GetDb();
        $statement = 'INSERT INTO request_info(user_request, user_requested, friends_request_flg) VALUES(?, ?, ?)';
        $db -> beginTransaction();
        $ins = $db -> prepare($statement);
        $ins -> bindValue('1', $request_user_id, PDO::PARAM_INT);
        $ins -> bindvalue('2', $requested_user_id, PDO::PARAM_INT);
        $ins -> bindvalue('3', $request_flg, PDO::PARAM_INT);
        $ins -> execute();
        $db -> commit();
    }

    //ユーザの情報からrequest_infoのデータをとってくる
    function select_request_info($my_id, $account_id){
        $db = GetDb();
        $statement = 'SELECT * FROM request_info WHERE user_request = ? AND user_requested = ? ';
        $sel = $db->prepare($statement);
        $sel->bindValue(1, $my_id);
        $sel->bindValue(2, $account_id);
        $sel->execute();
        $ResultSet = $sel->fetchAll(PDO::FETCH_ASSOC);
        if (!(empty($ResultSet))) {
            return $ResultSet;
        }
        return null;
    }

    function search_user_id($account_id, $my_id){
            $db = GetDb();
            $statement = 'SELECT account_info.id, account_id, name, user_request, user_requested FROM account_info LEFT OUTER JOIN request_info ON account_info.id = user_request 
                          OR account_info.id = user_requested WHERE account_id = ?';
            $sel = $db->prepare($statement);
            $sel->bindValue(1, $account_id);
            $sel->execute();
            $ResultSet = $sel->fetchAll(PDO::FETCH_ASSOC);
            if (!(empty($ResultSet))) {
                $arr_result = array();
                foreach ($ResultSet as $data) {
                    if ($data['account_id'] === $account_id && $data['id'] !== $my_id) {
                        $arr_result[] = $data;
                    }
                }
                return $arr_result;
            }
            return null;
    }

    //友達申請を表すフラグ'friends_request_flg'が1で'friends_accept_flg'と'friends_flg'がnullつまり申請が来ているが、まだ友達になっていない場合に申請者のIDを取得
    function select_request_user_info($user_type, $where, $user_id)
    {        //友達検索のID認証
        try {
            $db = GetDb();
            $statement = 'SELECT account_info.id, name FROM account_info INNER JOIN request_info ON account_info.id = '.$user_type.' 
                            WHERE '.$where.' = ? AND friends_request_flg = 1 AND friends_flg IS NULL';
            $sel = $db->prepare($statement);
            $sel->bindValue(1, $user_id, PDO::PARAM_INT);
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

    function select_user_request($my_id)
    {
        $db = GetDb();
        $statement = 'SELECT * FROM request_info WHERE user_request = ? OR user_requested = ? ';
        $sel = $db->prepare($statement);
        $sel->bindValue(1, $my_id);
        $sel->bindValue(2, $my_id);
        $sel->execute();
        $ResultSet = $sel->fetchAll(PDO::FETCH_ASSOC);
        if (!(empty($ResultSet))) {
            return $ResultSet;
        }
        return null;
    }



