
<?php
    //友達管理のためのDB操作を行うファイル
    //----------　投稿文管理に関する外部ファイル　----------
    require_once 'DbManager3.php';
    require_once 'Encode.php';


    function insert_flg($table, $flg, $value){   //誰かが友達申請した場合に使用
        try{
            $db = GetDb();
            $statement = 'INSERT INTO '.$table.'('.$flg.')' .'VALUES('.$value.')';
            $db -> beginTransaction();
            $ins = $db -> prepare($statement);
            $ins -> execute();
            $db -> commit();
        }catch(PDOException $e){
            $db -> rollback();
            die("INSERTエラー：{$e -> getMessage()}");
        }
    }

    function insert_friends_request($request_user_id, $requested_user_id){   //誰かが友達申請した場合に使用
            try{
                $db = GetDb();
                $statement = 'INSERT INTO friends_info(user_request, user_requested) VALUES(?, ?)';
                $db -> beginTransaction();
                $ins = $db -> prepare($statement);
                $ins -> bindValue('1', $request_user_id);
                $ins -> bindvalue('2', $requested_user_id);
                $ins -> execute();
                $db -> commit();
            }catch(PDOException $e){
                $db -> rollback();
                die("INSERTエラー：{$e -> getMessage()}");
            }
        }

    function search_user_id($account_id, $my_account_id)
    {        //友達検索のID認証
        try {
            $db = GetDb();
            $statement = 'SELECT * FROM account_info WHERE account_id = ?';
            $sel = $db->prepare($statement);
            $sel->bindValue(1, $account_id);
            $sel->execute();
            $ResultSet = $sel->fetchAll(PDO::FETCH_ASSOC);
            if (!(empty($ResultSet))) {
                foreach ($ResultSet as $data) {
                    if ($data['account_id'] === $account_id && $data['account_id'] !== $my_account_id ) {
                        return $data;
                    } else {
                        return null;
                    }
                }

            } else {
                return false;
            }
        } catch (PDOException $e) {
            die("SELECTエラー：{$e -> getMessage()}");
        }


        function Delete_Contribution($contents_id)
        {  //削除ボタンの際に利用
            try {
                $db = GetDb();
                $statement = 'DELETE FROM timeline_info WHERE id = ? ';
                $db->beginTransaction();
                $del = $db->prepare($statement);
                $del->bindValue('1', $contents_id);
                $del->execute();
                $db->commit();
            } catch (PDOException $e) {
                $db->rollback();
                die("DELETEエラー：{$e -> getMessage()}");
            }
        }


    }