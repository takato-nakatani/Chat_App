<?php
    //----------　DB接続の外部ファイル　----------

    function GetDb(){
        try{
            $dsn = 'mysql:dbname=chat_db;host=db;charset=utf8';
            $usr = 'chat_db_user';
            $passwd = 'passwd';

            //データベースへの接続を確立
            $db = new PDO($dsn, $usr, $passwd);  //データベースへの接続
            $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    //接続オプション⇒ERRMODE_EXCEPTION：例外を発生⇒try～catchで処理。
            return $db;

        }catch(PDOException $e){

            die("接続エラー：{$e -> getMessage()}");

        }
    }