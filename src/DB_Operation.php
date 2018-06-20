<?php
/**
 * Created by PhpStorm.
 * User: TAKATO
 * Date: 2018/06/20
 * Time: 19:00
 */

require('DB_Connection.php');

class DB_Operation
{
    function __construct()
    {
        $db = GetDb();
    }



    function select($cols, $table, $where)
    {
        $statement = 'SELECT ' . $cols . ' FROM ' . $table . ' WHERE ' . $where;
        $sel = $this -> $db ->prepare($statement);
        $sel->execute();

        $ResultSet = $sel->fetchAll(PDO::FETCH_ASSOC);
        if (!(empty($ResultSet))) {
            foreach ($ResultSet as $data) {

//                if ($data['name'] === $name && $data['password'] === $pass) {
//                    $_SESSION['id'] = $data['id'];
//                    return true;
//                } else {
//                    return false;
//                }
            }
        }
    }
}