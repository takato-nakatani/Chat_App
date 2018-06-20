<?php
/**
 * Created by PhpStorm.
 * User: TAKATO
 * Date: 2018/06/20
 * Time: 19:09
 */

class DB_Connection
{
    function GetDb(){
        try{
            $dsn = 'mysql:dbname=chat_db;host=db;charset=utf8';
            $usr = 'chat_db_user';
            $passwd = 'passwd';

            $db = new PDO($dsn, $usr, $passwd);
            $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    //接続オプション⇒ERRMODE_EXCEPTION：例外を発生⇒try～catchで処理。
            return $db;

        }catch(PDOException $e){

            die("接続エラー：{$e -> getMessage()}");

        }
    }
}